<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author = Author::latest()->get();

        return view('dashboard.users.list', compact('author'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:authors,slug',
            'designation' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:300',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $validated['is_active'] = true;

        if ($request->hasFile('image')) {
            $validated['image'] = $this->saveAvatar($request->file('image'));
        } else {
            unset($validated['image']);
        }

        Author::create($validated);

        return response()->json(['status' => true, 'message' => 'Author created successfully.'], 201);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:authors,slug,'.$author->id,
            'designation' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:300',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('image')) {
            if ($author->image && Storage::disk('public')->exists($author->image)) {
                Storage::disk('public')->delete($author->image);
            }
            $validated['image'] = $this->saveAvatar($request->file('image'));
        } else {
            unset($validated['image']);
        }

        $author->update($validated);

        return response()->json(['status' => true, 'message' => 'Author updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if ($author->image && Storage::disk('public')->exists($author->image)) {
            Storage::disk('public')->delete($author->image);
        }

        $author->delete();

        return response()->json([
            'status' => true,
            'message' => 'Author deleted successfully',
        ]);
    }

    private function saveAvatar(string $file): string
    {
        $filename = Str::uuid().'.webp';
        $directory = 'authors';
        $path = $directory.'/'.$filename;

        if (! Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory, 0755, true);
        }

        $webpImage = Image::read($file)
            ->cover(400, 400)
            ->toWebp(80)
            ->toFilePointer();

        Storage::disk('public')->put($path, $webpImage);

        return $path;
    }

    public function toggleStatus(Author $author)
    {
        $author->update(['is_active' => ! $author->is_active]);

        return response()->json([
            'status' => true,
            'message' => 'Status updated.',
        ]);
    }
}
