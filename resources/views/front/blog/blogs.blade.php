@extends('front.main')

@section('schema')
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url('/blogs') }}",
      "url": "{{ url('/blogs') }}",
      "name": "Insights & Stories — Blue Orbit Digital Agency",
      "description": "Explore the latest trends in digital marketing, technology updates, and strategies to grow your business online.",
      "inLanguage": "en-US",
      "isPartOf": {
        "@@type": "WebSite",
        "name": "Blue Orbit Digital Agency",
        "url": "https://blueorbitdigitalagency.com"
      }
    }
  ]
}
</script>
@endsection

@section('content')

    {{-- ── HERO ──────────────────────────────────────────────────────── --}}
    <section
        class="w-full relative overflow-hidden md:min-h-[calc(100dvh-128px)] min-h-[calc(100dvh-80px)] flex items-center bg-blend-overlay md:px-12 sm:px-6 px-4 h-[70vh]"
        style="background: #212121 url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=80') center / cover no-repeat;">

        <div class="relative z-10 max-w-7xl mx-auto w-full flex items-center h-full">
            <div class="text-white max-w-2xl flex flex-col gap-5">

                <h1 class="font-extrabold uppercase leading-tight lg:text-6xl md:text-5xl text-3xl">
                    Insights & Stories from our Blog
                </h1>

                <p class="text-gray-300 text-base md:text-lg leading-relaxed">
                    Explore the latest trends in digital marketing, technology updates,
                    and strategies to grow your business online.
                </p>

                <div class="flex gap-4 mt-2">
                    <a href="#latest"
                        class="bg-[#00d9ff] text-[#010521] font-bold uppercase md:px-4 px-3 lg:px-6 md:text-base text-sm py-3 rounded-sm hover:bg-white transition-all">
                        Read Blogs
                    </a>
                    <a href="#contact"
                        class="border border-white text-white font-bold uppercase md:px-4 px-3 lg:px-6 md:text-base text-sm py-3 rounded-sm hover:bg-white hover:text-black transition-all">
                        Let's Connect
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- ── MAIN SECTION ─────────────────────────────────────────────── --}}
    <section id="latest" class="w-full bg-[#FAFAFA] py-12 md:py-16 lg:py-20 px-4 sm:px-6 md:px-12">

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

            {{-- ── LEFT: BLOG GRID ──────────────────────────────────── --}}
            <div class="lg:col-span-8 flex flex-col">

                <h2 class="text-3xl md:text-4xl font-bold text-(--color-secondary) mb-8">
                    Latest Insights
                </h2>

                {{-- Service / Category Filters --}}
                <div class="flex flex-wrap gap-3 mb-8">

                    <a href="{{ route('blog.index') }}"
                        class="filter-btn px-4 py-2 rounded-full border text-sm font-medium transition
                               {{ !request('service') ? 'bg-(--color-secondary) text-white border-(--color-secondary)' : 'text-(--color-secondary) hover:bg-(--color-secondary) hover:text-white' }}">
                        All
                    </a>

                    @foreach ($services as $service)
                        <a href="{{ route('blog.index', ['service' => $service->id]) }}"
                            class="filter-btn px-4 py-2 rounded-full border text-sm font-medium transition
                                   {{ request('service') == $service->id ? 'bg-(--color-secondary) text-white border-(--color-secondary)' : 'text-(--color-secondary) hover:bg-(--color-secondary) hover:text-white' }}">
                            {{ $service->title }}
                            <span class="text-xs opacity-60">({{ $service->posts_count }})</span>
                        </a>
                    @endforeach

                </div>

                {{-- Blog Grid --}}
                @if ($posts->isEmpty())
                    <div class="text-center py-20 text-gray-400">
                        <p class="text-lg font-medium">No posts found.</p>
                        <a href="{{ route('blog.index') }}" class="text-sm mt-2 inline-block text-(--color-primary)">Clear
                            filter</a>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-7 w-full">
                        @foreach ($posts as $post)
                            <article
                                class="bg-white rounded-3xl overflow-hidden shadow-xl transition-transform duration-300 hover:-translate-y-1">

                                {{-- Thumbnail --}}
                                <a href="{{ route('blog.show', $post->slug) }}" class="block overflow-hidden">
                                    @if ($post->thumbnail_url)
                                        <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}"
                                            class="h-48 w-full object-cover transition-transform duration-500 hover:scale-105"
                                            loading="lazy" decoding="async">
                                    @else
                                        <div
                                            class="h-48 w-full bg-linear-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                            <i data-lucide="image" class="w-10 h-10 text-gray-300"></i>
                                        </div>
                                    @endif
                                </a>

                                <div class="p-6">

                                    {{-- Meta row --}}
                                    <div
                                        class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-3">
                                        <time datetime="{{ $post->created_at->toDateString() }}">
                                            {{ $post->created_at->format('M d, Y') }}
                                        </time>
                                        @if ($post->author_name)
                                            <div class="flex items-center gap-2 normal-case tracking-normal">
                                                <div class="w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-[10px] font-bold text-white"
                                                    style="background: var(--color-primary)">
                                                    {{ strtoupper(substr($post->author_name, 0, 1)) }}
                                                </div>
                                                <span class="text-gray-500 font-medium">{{ $post->author_name }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Service badge --}}
                                    @if ($post->service)
                                        <span
                                            class="inline-block text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-full mb-2"
                                            style="background: color-mix(in srgb, var(--color-primary) 10%, transparent); color: var(--color-primary)">
                                            {{ $post->service->title }}
                                        </span>
                                    @endif

                                    {{-- Title --}}
                                    <h3 class="text-lg font-bold text-(--color-secondary) mb-2 line-clamp-2">
                                        <a href="{{ route('blog.show', $post->slug) }}"
                                            class="hover:text-(--color-primary) transition">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    {{-- Excerpt --}}
                                    @if ($post->excerpt)
                                        <p class="text-sm text-gray-500 leading-relaxed line-clamp-2">
                                            {{ $post->excerpt }}
                                        </p>
                                    @endif

                                    {{-- Footer row --}}
                                    <div class="flex items-center justify-between mt-4">
                                        <a href="{{ route('blog.show', $post->slug) }}"
                                            class="text-sm font-bold text-(--color-primary) hover:text-(--color-secondary) transition">
                                            Read More →
                                        </a>
                                        @if ($post->read_time)
                                            <span class="text-xs text-gray-400 flex items-center gap-1">
                                                <i data-lucide="clock" class="w-3 h-3"></i>
                                                {{ $post->read_time }} min read
                                            </span>
                                        @endif
                                    </div>

                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    @if ($posts->hasPages())
                        <div class="mt-10">
                            {{ $posts->links() }}
                        </div>
                    @endif
                @endif

            </div>

            {{-- ── RIGHT: SIDEBAR ───────────────────────────────────── --}}
            <div class="lg:col-span-4">
                <div class="space-y-8 lg:sticky lg:top-24">

                    {{-- Recent Posts --}}
                    <div class="bg-white rounded-3xl shadow-xl p-6">
                        <h3 class="text-xl font-bold text-(--color-secondary) mb-5">Recent Posts</h3>

                        <div class="space-y-4">
                            @foreach ($recentPosts as $recent)
                                <a href="{{ route('blog.show', $recent->slug) }}" class="flex gap-4 group">
                                    <div class="w-14 h-14 rounded-xl overflow-hidden shrink-0 bg-gray-100">
                                        @if ($recent->thumbnail_url)
                                            <img src="{{ $recent->thumbnail_url }}" alt="{{ $recent->title }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div class="w-full h-full bg-linear-to-br from-gray-100 to-gray-200"></div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="text-sm font-semibold text-(--color-secondary) group-hover:text-(--color-primary) transition line-clamp-2">
                                            {{ $recent->title }}
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $recent->created_at->format('M d') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Categories --}}
                    @if ($services->count())
                        <div class="bg-white rounded-3xl shadow-xl p-6">
                            <h3 class="text-xl font-bold text-(--color-secondary) mb-5">Categories</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($services as $service)
                                    <a href="{{ route('blog.index', ['service' => $service->id]) }}"
                                        class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
                                               hover:bg-(--color-secondary) hover:text-white transition
                                               {{ request('service') == $service->id ? 'bg-(--color-secondary) text-white' : '' }}">
                                        {{ $service->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </section>

@endsection
