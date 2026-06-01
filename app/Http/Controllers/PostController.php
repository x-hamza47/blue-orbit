<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use App\Models\Service;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['tags', 'service'])
            ->latest()
            ->paginate(10);

        $totalPosts = Post::count();
        $publishedPosts = Post::where('is_published', true)->count();
        $draftPosts = Post::where('is_published', false)->count();

        return view('dashboard.blog.list', compact(
            'posts',
            'totalPosts',
            'publishedPosts',
            'draftPosts',
        ));
    }

    public function create()
    {
        $services = Service::all();
        $authors = Author::where('is_active', true)->get();

        return view('dashboard.blog.create-update', compact('services', 'authors'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content_json' => 'required|string',
            'thumbnail' => 'nullable|image|max:4096',
            'service_id' => 'required|exists:services,id',
            'slug' => 'nullable|string|unique:posts,slug' . (isset($post) ? ',' . $post->id : ''),
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $this->saveThumbnail($request->file('thumbnail'));
        }

        $finalJson = $this->promoteTempImages($request->content_json);

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'content_json' => $finalJson,
            'excerpt' => $request->excerpt,
            'author_id' => $request->author_id,
            'read_time' => $request->read_time,
            'thumbnail' => $thumbnailPath,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'is_published' => $request->boolean('is_published'),
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created.');
    }

    public function edit(Post $post)
    {
        $services = Service::all();
        $authors = Author::where('is_active', true)->get();

        return view('dashboard.blog.create-update', compact('post', 'services', 'authors'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content_json' => 'required|string',
            'thumbnail' => 'nullable|image|max:4096',
            'slug' => 'nullable|string|unique:posts,slug' . (isset($post) ? ',' . $post->id : ''),
        ]);

        $thumbnailPath = $post->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $thumbnailPath = $this->saveThumbnail($request->file('thumbnail'));
        }

        $finalJson = $this->promoteTempImages($request->content_json);
        $this->cleanupRemovedImages($post, $finalJson);
        $post->update([
            'title' => $request->title,
            'content_json' => $finalJson,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'author_id' => $request->author_id,
            'read_time' => $request->read_time,
            'thumbnail' => $thumbnailPath,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'is_published' => $request->boolean('is_published'),
            'service_id' => $request->service_id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        if ($post->thumbnail) {

            $thumbnailPath = str_replace('/storage/', '', parse_url($post->thumbnail, PHP_URL_PATH));

            if (Storage::disk('public')->exists($thumbnailPath)) {
                Storage::disk('public')->delete($thumbnailPath);
            }
        }

        $data = is_array($post->content_json)
            ? $post->content_json
            : json_decode($post->content_json, true);

        if (! empty($data['blocks'])) {
            foreach ($data['blocks'] as $block) {
                if ($block['type'] !== 'image') {
                    continue;
                }
                $url = $block['data']['file']['url'] ?? null;
                if (! $url) {
                    continue;
                }
                $path = 'posts/'.basename(parse_url($url, PHP_URL_PATH));
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Post deleted successfully.',
        ]);
    }

    private function saveThumbnail($file): string
    {
        $filename = Str::uuid().'.webp';
        $directory = 'thumbnails';
        $path = $directory.'/'.$filename;

        if (! Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory, 0755, true);
        }

        $webpImage = Image::read($file)
            ->cover(1200, 630)
            ->toWebp(80)
            ->toFilePointer();

        Storage::disk('public')->put($path, $webpImage);

        return $path;
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ]);

        $filename = Str::uuid().'.webp';
        $directory = 'posts/temp';
        $path = $directory.'/'.$filename;

        if (! Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory, 0755, true);
        }

        $webpImage = Image::read($request->file('image'))
            ->toWebp(75)
            ->toFilePointer();

        Storage::disk('public')->put($path, $webpImage);

        $url = Storage::disk('public')->url($path);

        TempImage::create([
            'session_id' => session()->getId(),
            'filename' => $filename,
            'path' => $path,
            'url' => $url,
        ]);

        return response()->json([
            'success' => 1,
            'file' => [
                'url' => $url,
                'filename' => $filename,
            ],
        ]);
    }

    public function deleteTempImage(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
        ]);

        $tempImage = TempImage::where('filename', $request->filename)
            ->where('session_id', session()->getId())
            ->first();

        if (! $tempImage) {
            return response()->json(['success' => false], 404);
        }
        if (Storage::disk('public')->exists($tempImage->path)) {
            Storage::disk('public')->delete($tempImage->path);
        }

        $tempImage->delete();

        return response()->json(['success' => true]);
    }

    private function promoteTempImages(string $contentJson): array
    {
        $data = json_decode($contentJson, true);

        if (empty($data['blocks'])) {
            return $data;
        }

        foreach ($data['blocks'] as &$block) {
            if ($block['type'] !== 'image') {
                continue;
            }

            $url = $block['data']['file']['url'] ?? null;
            if (! $url || ! str_contains($url, '/temp/')) {
                continue;
            }

            $filename = basename(parse_url($url, PHP_URL_PATH));
            $tempPath = 'posts/temp/'.$filename;
            $permPath = 'posts/'.$filename;

            // Move file from temp to permanent folder
            if (Storage::disk('public')->exists($tempPath)) {
                Storage::disk('public')->move($tempPath, $permPath);

                // Update URL in the JSON
                $block['data']['file']['url'] = Storage::disk('public')->url($permPath);
            }

            // Clean up temp_images record
            TempImage::where('filename', $filename)->delete();
        }

        return $data;
    }

    private function cleanupRemovedImages(Post $post, array $newData): void
    {
        $oldData = is_array($post->content_json)
            ? $post->content_json
            : json_decode($post->content_json, true);

        $oldImages = [];
        $newImages = [];

        // OLD IMAGES
        if (! empty($oldData['blocks'])) {

            foreach ($oldData['blocks'] as $block) {

                if ($block['type'] !== 'image') {
                    continue;
                }

                $url = $block['data']['file']['url'] ?? null;

                if ($url) {
                    $oldImages[] = basename(parse_url($url, PHP_URL_PATH));
                }
            }
        }

        // NEW IMAGES
        if (! empty($newData['blocks'])) {

            foreach ($newData['blocks'] as $block) {

                if ($block['type'] !== 'image') {
                    continue;
                }

                $url = $block['data']['file']['url'] ?? null;

                if ($url) {
                    $newImages[] = basename(parse_url($url, PHP_URL_PATH));
                }
            }
        }

        // REMOVED IMAGES
        $removedImages = array_diff($oldImages, $newImages);

        foreach ($removedImages as $filename) {

            $path = 'posts/'.$filename;

            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
    }
}
