<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ViewController extends Controller
{
    public function index()
    {
        $services = Service::parents()->showOnHome()->active()->orderBy('home_order')->take(7)->get();

        return view('front.home.home', compact('services'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function digitalmarketing()
    {
        return view('digitalmarketing');
    }

    // public function blogs()
    // {
    //     return view('front.blog.blogs');
    // }
    // public function blogDetails()
    // {
    //     return view('front.blog.blog-detail');
    // }
    public function blogs(Request $request)
    {
        // All published services for the category sidebar filter
        $services = Service::withCount(['posts' => fn ($q) => $q->where('is_published', true)])
            ->having('posts_count', '>', 0)
            ->get();

        // Recent posts for the sidebar widget (5 latest)
        $recentPosts = Post::where('is_published', true)
            ->select('id', 'title', 'slug', 'thumbnail', 'created_at')
            ->latest()
            ->limit(5)
            ->get();

        // Main grid — filter by service if ?service=id is passed
        $posts = Post::where('is_published', true)
            ->with('service')
            ->when($request->filled('service'), fn ($q) => $q->where('service_id', $request->service))
            ->latest()
            ->paginate(9)
            ->withQueryString();   // keep ?service= in pagination links

        return view('front.blog.blogs', compact('posts', 'services', 'recentPosts'));
    }

    /**
     * Public blog detail page
     * Route: GET /blog/{slug}  →  name: blog.show
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->with(['service', 'author'])
            ->firstOrFail();

        $contentJson = is_array($post->content_json)
            ? $post->content_json
            : json_decode($post->content_json, true);

        $toc = collect($contentJson['blocks'] ?? [])
            ->filter(fn ($b) => $b['type'] === 'header')
            ->map(fn ($b) => [
                'level' => $b['data']['level'],
                'text' => strip_tags($b['data']['text']),
                'anchor' => Str::slug(strip_tags($b['data']['text'])),
            ])
            ->values();

        // Related posts — same service, exclude current
        $relatedPosts = Post::with(['author', 'service'])
            ->where('is_published', true)
            ->where('service_id', $post->service_id)
            ->where('id', '!=', $post->id)
            ->select('id', 'title', 'slug', 'thumbnail', 'excerpt', 'service_id', 'created_at')
            ->latest()
            ->limit(3)
            ->get();

        // Pad with latest posts if not enough
        if ($relatedPosts->count() < 3) {
            $existingIds = $relatedPosts->pluck('id')->push($post->id);
            $paddingPosts = Post::with(['author', 'service'])
                ->where('is_published', true)
                ->whereNotIn('id', $existingIds)
                ->select('id', 'title', 'slug', 'thumbnail', 'excerpt', 'service_id', 'created_at')
                ->latest()
                ->limit(3 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->merge($paddingPosts);
        }

        return view('front.blog.blog-detail', compact('post', 'contentJson', 'toc', 'relatedPosts'));
    }
}
