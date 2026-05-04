@extends('front.main')

@section('content')
    <section id="blogs"
        class="w-full relative overflow-hidden md:min-h-[calc(100dvh-128px)] min-h-[calc(100dvh-80px)] flex items-center bg-blend-overlay md:px-12 sm:px-6 px-4 h-[70vh]"
        style="background: #212121 url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=80') center / cover no-repeat;">
        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto w-full flex items-center h-full">

            <div class="text-white max-w-2xl flex flex-col gap-5">

                <h1 class="font-extrabold uppercase leading-tight 
                lg:text-6xl md:text-5xl text-3xl">
                    Insights & Stories from our Blog
                </h1>

                <p class="text-gray-300 text-base md:text-lg leading-relaxed">
                    Explore the latest trends in digital marketing, technology updates,
                    and strategies to grow your business online with powerful insights.
                </p>

                <div class="flex gap-4 mt-2">
                    <a href="#latest"
                        class="bg-[#00d9ff] text-[#010521] font-bold uppercase md:px-4  px-3 lg:px-6 md:text-base text-sm py-3 rounded-sm
                    hover:bg-white transition-all">
                        Read Blogs
                    </a>

                    <a href="#contact"
                        class="border border-white text-white font-bold uppercase md:px-4 px-3 lg:px-6 md:text-base text-sm py-3 rounded-sm
                    hover:bg-white hover:text-black transition-all">
                        Let's Connect
                    </a>
                </div>

            </div>

        </div>
    </section>

    {{-- ! section --}}
    <section class="w-full bg-[#FAFAFA] py-12 md:py-16 lg:py-20 px-4 sm:px-6 md:px-12">

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

            {{-- LEFT: BLOG GRID --}}
            <div class="lg:col-span-8 flex flex-col">

                <h2 class="text-3xl md:text-4xl font-bold text-(--color-secondary) mb-8">
                    Latest Insights
                </h2>

                <!-- Filters -->
                <div class="flex flex-wrap gap-3 mb-8">

                    <button
                        class="filter-btn active px-4 py-2 rounded-full border text-sm font-medium bg-(--color-secondary) text-white"
                        data-category="all">
                        All
                    </button>

                    <button class="filter-btn px-4 py-2 rounded-full border text-sm font-medium" data-category="marketing">
                        Marketing
                    </button>

                    <button class="filter-btn px-4 py-2 rounded-full border text-sm font-medium" data-category="ai">
                        AI
                    </button>

                    <button class="filter-btn px-4 py-2 rounded-full border text-sm font-medium" data-category="tech">
                        Technology
                    </button>

                </div>

                <!-- BLOG GRID -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-7 w-full">

                    <!-- Blog Card -->
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-xl  transition-transform duration-500 ease-out transform-gpu">

                        <div class="overflow-hidden">
                            <img src="https://picsum.photos/seed/blog1/600/400"
                                class="h-48 w-full object-cover"
                                loading="lazy" decoding="async">
                        </div>

                        <div class="p-6">

                            <div
                                class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">

                                <span>Apr 20, 2026</span>

                                <div class="flex items-center gap-2 normal-case tracking-normal">

                                    <div class="w-6 h-6 rounded-full bg-gray-300"></div>

                                    <span class="text-gray-500 font-medium">
                                        John Doe
                                    </span>

                                </div>

                            </div>

                            <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                                Digital Marketing Trends
                            </h3>

                            <p class="text-sm text-gray-500 leading-relaxed">
                                Explore modern strategies that are reshaping the digital landscape.
                            </p>

                            <a href="{{ route('blog.detail') }}"
                                class="inline-block mt-4 text-sm font-bold text-(--color-primary) hover:text-(--color-secondary) transition">
                                Read More →
                            </a>

                        </div>
                    </div>

                    <!-- Blog Card 2 -->
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-xl  transition-transform duration-500 ease-out transform-gpu">

                        <div class="overflow-hidden">
                            <img src="https://picsum.photos/seed/blog2/600/400"
                                class="h-48 w-full object-cover"
                                loading="lazy" decoding="async">
                        </div>

                        <div class="p-6">

                            <div
                                class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">

                                <span>Apr 18, 2026</span>

                                <div class="flex items-center gap-2 normal-case tracking-normal">

                                    <div class="w-6 h-6 rounded-full bg-gray-300"></div>

                                    <span class="text-gray-500 font-medium">
                                        John Doe
                                    </span>

                                </div>

                            </div>

                            <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                                AI & Future of Business
                            </h3>

                            <p class="text-sm text-gray-500 leading-relaxed">
                                Artificial intelligence is transforming industries at lightning speed.
                            </p>

                            <a href="{{ route('blog.detail') }}"
                                class="inline-block mt-4 text-sm font-bold text-(--color-primary) hover:text-(--color-secondary) transition">
                                Read More →
                            </a>

                        </div>
                    </div>

                    <!-- Blog Card 3 -->
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-xl  transition-transform duration-500 ease-out transform-gpu">

                        <div class="overflow-hidden">
                            <img src="https://picsum.photos/seed/blog3/600/400"
                                class="h-48 w-full object-cover"
                                loading="lazy" decoding="async">
                        </div>

                        <div class="p-6">

                            <div
                                class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">
                                <span>Apr 17, 2026</span>

                                <div class="flex items-center gap-2 normal-case tracking-normal">
                                    <div class="w-6 h-6 rounded-full bg-gray-300"></div>
                                    <span class="text-gray-500 font-medium">Sarah Khan</span>
                                </div>
                            </div>

                            <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                                Modern Web Design Trends
                            </h3>

                            <p class="text-sm text-gray-500">
                                Explore the latest UI/UX trends shaping modern websites.
                            </p>

                            <a href="{{ route('blog.detail') }}"
                                class="inline-block mt-4 text-sm font-bold text-(--color-primary)">
                                Read More →
                            </a>

                        </div>
                    </div>

                    <!-- Blog Card 4 -->
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-xl  transition-transform duration-500 ease-out transform-gpu">

                        <div class="overflow-hidden">
                            <img src="https://picsum.photos/seed/blog4/600/400"
                                class="h-48 w-full object-cover"
                                loading="lazy" decoding="async">
                        </div>

                        <div class="p-6">

                            <div
                                class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">
                                <span>Apr 16, 2026</span>

                                <div class="flex items-center gap-2 normal-case tracking-normal">
                                    <div class="w-6 h-6 rounded-full bg-gray-300"></div>
                                    <span class="text-gray-500 font-medium">Ali Ahmed</span>
                                </div>
                            </div>

                            <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                                Data Driven Marketing
                            </h3>

                            <p class="text-sm text-gray-500">
                                How data analytics is transforming marketing strategies.
                            </p>

                            <a href="{{ route('blog.detail') }}"
                                class="inline-block mt-4 text-sm font-bold text-(--color-primary)">
                                Read More →
                            </a>

                        </div>
                    </div>

                    <!-- Blog Card 5 -->
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-xl  transition-transform duration-500 ease-out transform-gpu">

                        <div class="overflow-hidden">
                            <img src="https://picsum.photos/seed/blog5/600/400"
                                class="h-48 w-full object-cover"
                                loading="lazy" decoding="async">
                        </div>

                        <div class="p-6">

                            <div
                                class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">
                                <span>Apr 15, 2026</span>

                                <div class="flex items-center gap-2 normal-case tracking-normal">
                                    <div class="w-6 h-6 rounded-full bg-gray-300"></div>
                                    <span class="text-gray-500 font-medium">Usman Tariq</span>
                                </div>
                            </div>

                            <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                                SEO in 2026 Explained
                            </h3>

                            <p class="text-sm text-gray-500">
                                Learn how SEO strategies are evolving with AI search.
                            </p>

                            <a href="{{ route('blog.detail') }}"
                                class="inline-block mt-4 text-sm font-bold text-(--color-primary)">
                                Read More →
                            </a>

                        </div>
                    </div>

                    <!-- Blog Card 6 -->
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-xl  transition-transform duration-500 ease-out transform-gpu">

                        <div class="overflow-hidden">
                            <img src="https://picsum.photos/seed/blog6/600/400"
                                class="h-48 w-full object-cover"
                                loading="lazy" decoding="async">
                        </div>

                        <div class="p-6">

                            <div
                                class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">
                                <span>Apr 14, 2026</span>

                                <div class="flex items-center gap-2 normal-case tracking-normal">
                                    <div class="w-6 h-6 rounded-full bg-gray-300"></div>
                                    <span class="text-gray-500 font-medium">Hassan Raza</span>
                                </div>
                            </div>

                            <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                                AI in Digital Transformation
                            </h3>

                            <p class="text-sm text-gray-500">
                                How AI is reshaping business automation and workflows.
                            </p>

                            <a href="{{ route('blog.detail') }}"
                                class="inline-block mt-4 text-sm font-bold text-(--color-primary)">
                                Read More →
                            </a>

                        </div>
                    </div>

                    <!-- Blog Card 7 -->
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-xl  transition-transform duration-500 ease-out transform-gpu">

                        <div class="overflow-hidden">
                            <img src="https://picsum.photos/seed/blog7/600/400"
                                class="h-48 w-full object-cover"
                                loading="lazy" decoding="async">
                        </div>

                        <div class="p-6">

                            <div
                                class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">
                                <span>Apr 13, 2026</span>

                                <div class="flex items-center gap-2 normal-case tracking-normal">
                                    <div class="w-6 h-6 rounded-full bg-gray-300"></div>
                                    <span class="text-gray-500 font-medium">Bilal Khan</span>
                                </div>
                            </div>

                            <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                                Future of Remote Work
                            </h3>

                            <p class="text-sm text-gray-500">
                                Exploring how remote work is shaping global companies.
                            </p>

                            <a href="{{ route('blog.detail') }}"
                                class="inline-block mt-4 text-sm font-bold text-(--color-primary)">
                                Read More →
                            </a>

                        </div>
                    </div>

                    <!-- Blog Card 8 -->
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-xl  transition-transform duration-500 ease-out transform-gpu">

                        <div class="overflow-hidden">
                            <img src="https://picsum.photos/seed/blog8/600/400"
                                class="h-48 w-full object-cover"
                                loading="lazy" decoding="async">
                        </div>

                        <div class="p-6">

                            <div
                                class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">
                                <span>Apr 12, 2026</span>

                                <div class="flex items-center gap-2 normal-case tracking-normal">
                                    <div class="w-6 h-6 rounded-full bg-gray-300"></div>
                                    <span class="text-gray-500 font-medium">Ayesha Malik</span>
                                </div>
                            </div>

                            <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                                Startup Growth Strategies
                            </h3>

                            <p class="text-sm text-gray-500">
                                Key strategies to scale your startup effectively.
                            </p>

                            <a href="{{ route('blog.detail') }}"
                                class="inline-block mt-4 text-sm font-bold text-(--color-primary)">
                                Read More →
                            </a>

                        </div>
                    </div>


                </div>

            </div>

            {{-- RIGHT: SIDEBAR --}}
            <div class="lg:col-span-4">

                <div class="space-y-8 lg:sticky lg:top-24">

                    <!-- Recent Posts -->
                    <div class="bg-white rounded-3xl shadow-xl p-6">

                        <h3 class="text-xl font-bold text-(--color-secondary) mb-5">
                            Recent Posts
                        </h3>

                        <div class="space-y-5">

                            <div class="flex gap-4">
                                <div class="w-14 h-14 rounded-xl bg-gray-200"></div>
                                <div>
                                    <p class="text-sm font-semibold text-(--color-secondary)">
                                        SEO Strategies 2026
                                    </p>
                                    <p class="text-xs text-gray-400">Apr 22</p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-14 h-14 rounded-xl bg-gray-200"></div>
                                <div>
                                    <p class="text-sm font-semibold text-(--color-secondary)">
                                        Web Development Trends
                                    </p>
                                    <p class="text-xs text-gray-400">Apr 21</p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-14 h-14 rounded-xl bg-gray-200"></div>
                                <div>
                                    <p class="text-sm font-semibold text-(--color-secondary)">
                                        AI in Digital Marketing
                                    </p>
                                    <p class="text-xs text-gray-400">Apr 20</p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-14 h-14 rounded-xl bg-gray-200"></div>
                                <div>
                                    <p class="text-sm font-semibold text-(--color-secondary)">
                                        Future of Web Design
                                    </p>
                                    <p class="text-xs text-gray-400">Apr 18</p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-14 h-14 rounded-xl bg-gray-200"></div>
                                <div>
                                    <p class="text-sm font-semibold text-(--color-secondary)">
                                        Startup Growth Hacks
                                    </p>
                                    <p class="text-xs text-gray-400">Apr 16</p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-14 h-14 rounded-xl bg-gray-200"></div>
                                <div>
                                    <p class="text-sm font-semibold text-(--color-secondary)">
                                        UX/UI Design Principles
                                    </p>
                                    <p class="text-xs text-gray-400">Apr 15</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-3xl shadow-xl p-6">

                        <h3 class="text-xl font-bold text-(--color-secondary) mb-5">
                            Categories
                        </h3>

                        <div class="flex flex-wrap gap-2">

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
                        hover:bg-(--color-secondary) hover:text-white transition">
                                Marketing
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
                        hover:bg-(--color-secondary) hover:text-white transition">
                                Technology
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
                        hover:bg-(--color-secondary) hover:text-white transition">
                                AI
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
                        hover:bg-(--color-secondary) hover:text-white transition">
                                Business
                            </span>
                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                Digital Marketing
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                SEO
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                Social Media
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                Artificial Intelligence
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                Web Development
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                UI/UX Design
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                Startups
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                E-Commerce
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                Branding
                            </span>

                            <span
                                class="px-4 py-2 text-sm rounded-full border text-(--color-secondary)
hover:bg-(--color-secondary) hover:text-white transition">
                                Technology
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
