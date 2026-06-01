@extends('front.main')
@include('front.blog.schema')
@section('title', ($post->meta_title ?? $post->title) . ' - Blue Orbit Digital Agency')
@section('meta_description', $post->meta_description ?? $post->excerpt)
@section('og_image', asset('storage/' . $post->thumbnail))
@section('og_type', 'article')
@section('content')

    <section class="w-full bg-[#FAFAFA] py-8 md:py-10 md:px-12 sm:px-6 px-4">

        <div class="max-w-7xl mx-auto flex gap-6">

            {{-- ── LEFT: TABLE OF CONTENTS  --}}
            @if ($toc->count())
                <aside class="w-[25%] hidden lg:block">
                    <div class="sticky top-32 bg-white rounded-3xl shadow-xl p-6">

                        <h3 class="text-lg font-bold text-(--color-secondary) mb-4 border-b pb-3">
                            What You'll Learn
                        </h3>

                        <ul class="space-y-1 text-sm text-gray-600" id="toc-list">
                            @foreach ($toc as $item)
                                <li style="padding-left: {{ ($item['level'] - 2) * 12 }}px">
                                    <a href="#{{ $item['anchor'] }}"
                                        class="toc-link block py-2 border-b border-gray-100 hover:text-(--color-primary) transition leading-snug"
                                        data-anchor="{{ $item['anchor'] }}">
                                        {{ $item['text'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </aside>
            @endif

            <article class="flex-1 min-w-0">

                {{-- Hero card --}}
                <div class="bg-white rounded-3xl overflow-hidden shadow-xl">

                    @if ($post->thumbnail_url)
                        <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}"
                            class="w-full max-h-[380px] object-cover">
                    @endif

                    <div class="p-8">
                        <h1 class="text-3xl md:text-4xl font-bold text-(--color-secondary)">
                            {{ $post->title }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-6 text-sm text-gray-500 mt-4">

                            {{-- Author --}}
                            @if ($post->author)
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 rounded-full overflow-hidden shrink-0">
                                        @if ($post->author->image)
                                            <img src="{{ asset('storage/' . $post->author->image) }}"
                                                alt="{{ $post->author->name }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center font-bold text-white text-base"
                                                style="background: var(--color-primary)">
                                                {{ strtoupper(substr($post->author->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </div>
                                    <span class="font-medium">By {{ $post->author->name }}</span>
                                </div>
                            @elseif ($post->author_name)
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 rounded-full overflow-hidden flex items-center justify-center font-bold text-white text-base shrink-0"
                                        style="background: var(--color-primary)">
                                        {{ strtoupper(substr($post->author_name, 0, 1)) }}
                                    </div>
                                    <span class="font-medium">By {{ $post->author_name }}</span>
                                </div>
                            @endif

                            <div class="flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                <time datetime="{{ $post->created_at->toDateString() }}">
                                    {{ $post->created_at->format('M d, Y') }}
                                </time>
                            </div>

                            @if ($post->read_time)
                                <div class="flex items-center gap-2">
                                    <i data-lucide="clock" class="w-4 h-4"></i>
                                    <span>{{ $post->read_time }} min read</span>
                                </div>
                            @endif

                        </div>

                        @if ($post->service)
                            <span
                                class="inline-block text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full my-4"
                                style="background: color-mix(in srgb, var(--color-primary) 12%, transparent); color: var(--color-primary)">
                                {{ $post->service->title }}
                            </span>
                        @endif
                    </div>
                </div>

                {{-- EditorJS rendered content --}}
                <div class="bg-white rounded-3xl shadow-xl mt-8 p-8 md:p-10">
                    <x-editorjs-renderer :blocks="$contentJson['blocks'] ?? []" />

                    {{-- ── AUTHOR BOX ── --}}
                    @if ($post->author)
                        <section class="mt-12 pt-8 border-t border-gray-200">
                            <div class="flex flex-col md:flex-row gap-6 items-start">

                                {{-- Author Image --}}
                                <div class="w-20 h-20 rounded-full overflow-hidden shrink-0">
                                    @if ($post->author->image)
                                        <img src="{{ asset('storage/' . $post->author->image) }}"
                                            class="w-full h-full object-cover"
                                            alt="{{ $post->author->name }}">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center font-bold text-white text-2xl"
                                            style="background: var(--color-primary)">
                                            {{ strtoupper(substr($post->author->name, 0, 1)) }}
                                        </div>
                                    @endif
                                </div>

                                {{-- Author Info --}}
                                <div class="flex-1">

                                    @if ($post->author->designation)
                                        <p class="text-base text-(--color-primary) font-semibold mb-1">
                                            {{ $post->author->designation }}
                                            @if ($post->author->company)
                                                @ {{ $post->author->company }}
                                            @endif
                                        </p>
                                    @endif

                                    <h3 class="text-4xl font-bold text-(--color-secondary)">
                                        {{ $post->author->name }}
                                    </h3>

                                    <p class="text-xs text-gray-400 mt-1 mb-4">
                                        Browse all articles ({{ $post->author->posts()->where('is_published', true)->count() }})
                                    </p>

                                    @if ($post->author->bio)
                                        <p class="text-base text-gray-600 leading-relaxed">
                                            {{ $post->author->bio }}
                                        </p>
                                    @endif

                                    {{-- Social Links --}}
                                    @if ($post->author->linkedin_url || $post->author->twitter_url)
                                        <div class="flex gap-4 mt-4">
                                            @if ($post->author->linkedin_url)
                                                <a href="{{ $post->author->linkedin_url }}" target="_blank"
                                                    class="text-sm font-bold text-(--color-primary) hover:text-(--color-secondary) transition flex items-center gap-1">
                                                    <i data-lucide="linkedin" class="w-4 h-4"></i> LinkedIn
                                                </a>
                                            @endif
                                            @if ($post->author->twitter_url)
                                                <a href="{{ $post->author->twitter_url }}" target="_blank"
                                                    class="text-sm font-bold text-(--color-primary) hover:text-(--color-secondary) transition flex items-center gap-1">
                                                    <i data-lucide="twitter" class="w-4 h-4"></i> Twitter
                                                </a>
                                            @endif
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </section>
                    @endif
                </div>

                {{-- Back link --}}
                <div class="mt-8">
                    <a href="{{ route('blog.index') }}"
                        class="inline-flex items-center gap-2 text-sm font-bold text-(--color-primary) hover:text-(--color-secondary) transition">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Back to Blog
                    </a>
                </div>

            </article>

        </div>

    </section>

    {{-- ── RELATED POSTS ──────────────────────────────────────────────── --}}
    @if ($relatedPosts->count())
        <section class="w-full mt-14 bg-[#FAFAFA] py-8 md:py-10 md:px-12 sm:px-6 px-4">

            <div class="max-w-7xl mx-auto">

                <div class="mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-(--color-secondary)">Read Next</h2>
                    <p class="text-gray-500 mt-2 text-sm">More insights you might find useful</p>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($relatedPosts as $related)
                        <article
                            class="bg-white rounded-3xl overflow-hidden shadow-xl transition-transform duration-300 hover:-translate-y-1">

                            <a href="{{ route('blog.show', $related->slug) }}" class="block overflow-hidden">
                                @if ($related->thumbnail_url)
                                    <img src="{{ $related->thumbnail_url }}" alt="{{ $related->title }}"
                                        class="h-48 w-full object-cover transition-transform duration-500 hover:scale-105"
                                        loading="lazy" decoding="async">
                                @else
                                    <div class="h-48 w-full bg-linear-to-br from-gray-100 to-gray-200"></div>
                                @endif
                            </a>

                            <div class="p-6">

                                <div
                                    class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">
                                    <time datetime="{{ $related->created_at->toDateString() }}">
                                        {{ $related->created_at->format('M d, Y') }}
                                    </time>

                                    {{-- Related post author --}}
                                    @if ($related->author)
                                        <div class="flex items-center gap-2 normal-case tracking-normal">
                                            <div class="w-6 h-6 rounded-full overflow-hidden shrink-0">
                                                @if ($related->author->image)
                                                    <img src="{{ asset('storage/' . $related->author->image) }}"
                                                        class="w-full h-full object-cover"
                                                        alt="{{ $related->author->name }}">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-[10px] font-bold text-white"
                                                        style="background: var(--color-primary)">
                                                        {{ strtoupper(substr($related->author->name, 0, 1)) }}
                                                    </div>
                                                @endif
                                            </div>
                                            <span class="text-gray-500 font-medium">{{ $related->author->name }}</span>
                                        </div>
                                    @elseif ($related->author_name)
                                        <div class="flex items-center gap-2 normal-case tracking-normal">
                                            <div class="w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold text-white"
                                                style="background: var(--color-primary)">
                                                {{ strtoupper(substr($related->author_name, 0, 1)) }}
                                            </div>
                                            <span class="text-gray-500 font-medium">{{ $related->author_name }}</span>
                                        </div>
                                    @endif
                                </div>

                                <h3 class="text-lg font-bold text-(--color-secondary) mb-2 line-clamp-2">
                                    <a href="{{ route('blog.show', $related->slug) }}"
                                        class="hover:text-(--color-primary) transition">
                                        {{ $related->title }}
                                    </a>
                                </h3>

                                @if ($related->excerpt)
                                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-2">
                                        {{ $related->excerpt }}
                                    </p>
                                @endif

                                <a href="{{ route('blog.show', $related->slug) }}"
                                    class="inline-block mt-4 text-sm font-bold text-(--color-primary) hover:text-(--color-secondary) transition">
                                    Read More →
                                </a>

                            </div>
                        </article>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

@endsection


@push('scripts')
    <script>
        (function() {
            const links = document.querySelectorAll('.toc-link');
            const anchors = [...links].map(l => document.getElementById(l.dataset.anchor));

            if (!links.length) return;

            const onScroll = () => {
                let current = null;
                anchors.forEach((el, i) => {
                    if (el && el.getBoundingClientRect().top <= 120) {
                        current = i;
                    }
                });
                links.forEach((l, i) => l.classList.toggle('active', i === current));
            };

            window.addEventListener('scroll', onScroll, {
                passive: true
            });
            onScroll();
        })();
    </script>
@endpush
