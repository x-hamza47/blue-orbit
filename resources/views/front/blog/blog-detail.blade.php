@extends('front.main')

@section('content')
    <section class="w-full bg-[#FAFAFA] py-8 md:py-10 md:px-12 sm:px-6 px-4">

        <div class="flex gap-2 ">

            {{-- LEFT: TABLE OF CONTENT --}}
            <aside class="w-[25%] hidden lg:block">
                <div class="sticky top-32 bg-white rounded-3xl shadow-xl p-6">

                    <h3 class="text-lg font-bold text-(--color-secondary) mb-4 border-b pb-3">
                        What You'll Learn
                    </h3>

                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>
                            <a href="#intro"
                                class="block py-2 border-b border-gray-100 hover:text-(--color-primary) transition leading-snug">
                                Lead Generation in 2026: From Manual Tactics to AI-Driven Systems
                            </a>
                        </li>

                        <li>
                            <a href="#trend"
                                class="block py-2 border-b border-gray-100 hover:text-(--color-primary) transition leading-snug">
                                AI-Powered Lead Generation: How Businesses Identify Customers Earlier
                            </a>
                        </li>

                        <li>
                            <a href="#strategy"
                                class="block py-2 border-b border-gray-100 hover:text-(--color-primary) transition leading-snug">
                                From Traditional Funnels to Adaptive Marketing Systems
                            </a>
                        </li>

                        <li>
                            <a href="#ai"
                                class="block py-2 border-b border-gray-100 hover:text-(--color-primary) transition leading-snug">
                                How Artificial Intelligence is Transforming Lead Qualification
                            </a>
                        </li>

                        <li>
                            <a href="#conclusion" class="block py-2 hover:text-(--color-primary) transition leading-snug">
                                The Future of AI-Driven Growth Strategies
                            </a>
                        </li>
                    </ul>

                </div>
            </aside>

            {{-- CENTER: BLOG CONTENT --}}
            <article class="flex-1">

                {{-- HERO SECTION --}}
                <div class="bg-white rounded-3xl overflow-hidden shadow-xl">

                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c"
                        class="w-full h-[380px] object-cover">

                    <div class="p-8">

                        {{-- TITLE --}}
                        <h1 class="text-3xl md:text-4xl font-bold text-(--color-secondary)">
                            Digital Marketing in 2026: Complete Guide
                        </h1>

                        {{-- META INFO (AUTHOR + DATE + READ TIME) --}}
                        <div class="flex flex-wrap items-center gap-6 text-sm text-gray-500 mt-4">

                            {{-- Author --}}
                            <div class="flex items-center gap-2">
                                <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-300">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Author"
                                        class="w-full h-full object-cover">
                                </div>
                                <span class="font-medium">By Hamza Aamir</span>
                            </div>

                            {{-- Date --}}
                            <div class="flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                <span>Apr 28, 2026</span>
                            </div>

                            {{-- Read Time --}}
                            <div class="flex items-center gap-2">
                                <i data-lucide="clock" class="w-4 h-4"></i>
                                <span>6 min read</span>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- BLOG BODY --}}
                <div class="bg-white rounded-3xl shadow-xl mt-8 p-10 space-y-12 leading-relaxed text-gray-600">

                    <section id="intro">
                        <h2 class="text-2xl font-bold text-(--color-secondary) mb-3">
                            Lead Generation in 2026: From Manual Tactics to AI-Driven Systems
                        </h2>

                        <p>
                            Digital marketing is evolving faster than ever with AI, automation, and data-driven strategies.
                            What once required large teams and manual execution can now be optimized using intelligent
                            systems
                            that analyze user behavior in real time.
                        </p>

                        <p class="mt-4">
                            In 2026, businesses are no longer competing on content alone — they are competing on speed,
                            personalization, and the ability to predict customer intent before it fully forms.
                        </p>
                    </section>

                    <section id="trend">
                        <h2 class="text-2xl font-bold text-(--color-secondary) mb-3">
                            AI-Powered Lead Generation: How Businesses Identify Customers Earlier
                        </h2>

                        <p>
                            Personalization and AI-powered campaigns are leading the industry transformation.
                            Brands are shifting from broad targeting to micro-segmentation, where each user experiences
                            a tailored journey based on behavior, interest, and engagement patterns.
                        </p>

                        <p class="mt-4">
                            Short-form content, predictive analytics, and automated ad optimization are becoming standard
                            tools
                            for modern marketing teams aiming to stay competitive.
                        </p>
                    </section>

                    <section id="strategy">
                        <h2 class="text-2xl font-bold text-(--color-secondary) mb-3">
                            From Traditional Funnels to Adaptive Marketing Systems
                        </h2>

                        <p>
                            Modern marketing focuses heavily on customer journey optimization and conversion tracking.
                            Instead of relying on single campaigns, businesses now design entire ecosystems that guide users
                            from awareness to conversion seamlessly.
                        </p>

                        <p class="mt-4">
                            Successful strategies include A/B testing at scale, multi-channel attribution, and real-time
                            performance optimization powered by AI systems.
                        </p>
                    </section>

                    <section id="ai">
                        <h2 class="text-2xl font-bold text-(--color-secondary) mb-3">
                            How Artificial Intelligence is Transforming Lead Qualification
                        </h2>

                        <p>
                            AI is reshaping content creation, SEO, ads, and customer engagement systems.
                            It enables marketers to generate insights that were previously impossible to detect manually.
                        </p>

                        <p class="mt-4">
                            From chatbots handling customer queries to predictive models forecasting buyer intent,
                            AI is becoming the backbone of modern digital marketing infrastructure.
                        </p>
                    </section>

                    <section id="conclusion">
                        <h2 class="text-2xl font-bold text-(--color-secondary) mb-3">
                            The Future of AI-Driven Growth Strategies
                        </h2>

                        <p>
                            Businesses that adopt AI-driven marketing will dominate the future market.
                            The shift is no longer optional — it is a requirement for survival in an increasingly
                            competitive digital ecosystem.
                        </p>

                        <p class="mt-4">
                            The combination of automation, intelligence, and personalization defines the next era of growth,
                            and companies that adapt early will hold a significant advantage.
                        </p>
                    </section>
                    {{-- AUTHOR BOX --}}
                    {{-- AUTHOR SECTION --}}
                    <section class="mt-12 pt-8 border-t border-gray-200">

                        <div class="flex flex-col md:flex-row gap-6 items-start">

                            {{-- AUTHOR IMAGE --}}
                            <div class="w-20 h-20 rounded-full overflow-hidden shrink-0">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d"
                                    class="w-full h-full object-cover" alt="Hamza Aamir">
                            </div>

                            {{-- AUTHOR INFO --}}
                            <div class="flex-1">

                                <p class="text-base text-(--color-primary) font-semibold mb-1">
                                    Content Writer & Full Stack Developer
                                </p>

                                <h3 class="text-4xl font-bold text-(--color-secondary)">
                                    Hamza Aamir
                                </h3>

                                <p class="text-xs text-gray-400 mt-1 mb-4">
                                    Browse all articles (125)
                                </p>

                                <p class="text-base text-gray-600 leading-relaxed">
                                    Hamza Aamir is a full stack developer and content writer with expertise in web
                                    development, digital marketing,
                                    and modern UI/UX design systems. He specializes in building scalable web applications
                                    using technologies like
                                    Laravel, React, and modern frontend frameworks while also crafting SEO-optimized content
                                    for tech and marketing audiences.
                                </p>

                                <p class="text-base text-gray-600 leading-relaxed mt-4">
                                    With a strong passion for blending design and functionality, Hamza focuses on creating
                                    digital experiences that are
                                    both visually appealing and performance-driven. His work bridges the gap between
                                    technical development and strategic
                                    marketing, helping businesses grow through effective online presence and smart content
                                    strategies.
                                </p>

                            </div>

                        </div>

                    </section>
                </div>


            </article>


        </div>


    </section>

    <section class="w-full mt-14 bg-[#FAFAFA] py-8 md:py-10 md:px-12 sm:px-6 px-4">

        {{-- SECTION HEADING --}}
        <div class="mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-(--color-secondary)">
                Read Next
            </h2>

            <p class="text-gray-500 mt-2 text-sm">
                More insights you might find useful
            </p>
        </div>

        {{-- CARDS --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Card 1 --}}
            <div
                class="bg-white rounded-3xl overflow-hidden shadow-xl transition-transform duration-500 ease-out transform-gpu">

                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0" class="h-48 w-full object-cover"
                        loading="lazy" decoding="async">
                </div>

                <div class="p-6">

                    <div class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">

                        <span>Apr 25, 2026</span>

                        <div class="flex items-center gap-2 normal-case tracking-normal">

                            <div class="w-6 h-6 rounded-full bg-gray-300"></div>

                            <span class="text-gray-500 font-medium">
                                John Doe
                            </span>

                        </div>

                    </div>

                    <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                        AI Marketing Systems
                    </h3>

                    <p class="text-sm text-gray-500 leading-relaxed">
                        How artificial intelligence is reshaping modern marketing strategies.
                    </p>

                    <a href="{{ route('blog.detail') }}"
                        class="inline-block mt-4 text-sm font-bold text-(--color-primary) hover:text-(--color-secondary) transition">
                        Read More →
                    </a>

                </div>
            </div>

            {{-- Card 2 --}}
            <div
                class="bg-white rounded-3xl overflow-hidden shadow-xl transition-transform duration-500 ease-out transform-gpu">

                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" class="h-48 w-full object-cover"
                        loading="lazy" decoding="async">
                </div>

                <div class="p-6">

                    <div class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">

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

            {{-- Card 3 --}}
            <div
                class="bg-white rounded-3xl overflow-hidden shadow-xl transition-transform duration-500 ease-out transform-gpu">

                <div class="overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1508385082359-f38ae991e8f2"
                        class="h-48 w-full object-cover" loading="lazy" decoding="async">
                </div>

                <div class="p-6">

                    <div class="flex items-center justify-between text-xs uppercase tracking-widest text-gray-400 mb-2">

                        <span>Apr 21, 2026</span>

                        <div class="flex items-center gap-2 normal-case tracking-normal">

                            <div class="w-6 h-6 rounded-full bg-gray-300"></div>

                            <span class="text-gray-500 font-medium">
                                John Doe
                            </span>

                        </div>

                    </div>

                    <h3 class="text-lg font-bold text-(--color-secondary) mb-2">
                        Digital Growth Strategy
                    </h3>

                    <p class="text-sm text-gray-500 leading-relaxed">
                        Data-driven strategies that scale modern businesses efficiently.
                    </p>

                    <a href="{{ route('blog.detail') }}"
                        class="inline-block mt-4 text-sm font-bold text-(--color-primary) hover:text-(--color-secondary) transition">
                        Read More →
                    </a>

                </div>
            </div>

        </div>
    </section>
@endsection
