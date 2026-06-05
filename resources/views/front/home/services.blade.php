@php
    $services = [
        [
            'icon' => 'search',
            'color' => '#4373f6',
            'title' => 'Search Engine Optimisation',
            'stat' => '500+ keywords on Page 1',
            'desc' =>
                'Rank higher on Google for high-intent UAE searches. We\'ve placed 500+ keywords on Page 1 for clients across Dubai, Sharjah, and Abu Dhabi.',
            'slug' => 'seo',
        ],
        [
            'icon' => 'target',
            'color' => '#e84545',
            'title' => 'PPC & Google Ads',
            'stat' => 'Avg. 3.2x ROAS for UAE clients',
            'desc' =>
                'Results-driven ad campaigns with laser-targeted audiences. Every dirham tracked and optimised for maximum return.',
            'slug' => 'ppc-google-ads',
        ],
        [
            'icon' => 'smartphone',
            'color' => '#e040fb',
            'title' => 'Social Media Marketing',
            'stat' => 'Instagram · TikTok · LinkedIn · Snapchat',
            'desc' =>
                'Platform-native strategies that build UAE audiences, drive engagement, and convert followers into paying customers.',
            'slug' => 'social-media-marketing',
        ],
        [
            'icon' => 'pen-line',
            'color' => '#f5a623',
            'title' => 'Content Marketing',
            'stat' => 'Arabic & English SEO content',
            'desc' =>
                'SEO-rich Arabic & English content that ranks, educates, and converts. Blog posts, landing pages, whitepapers, and video scripts.',
            'slug' => 'content-marketing',
        ],
        [
            'icon' => 'monitor',
            'color' => '#00bcd4',
            'title' => 'Web Design & Development',
            'stat' => 'Mobile-first · Built to rank & convert',
            'desc' =>
                'Lightning-fast, mobile-first websites optimised for UAE buyers. Built on WordPress or custom — designed to rank and convert.',
            'slug' => 'web-design-development',
        ],
        [
            'icon' => 'bot',
            'color' => '#43a047',
            'title' => 'AI-Enhanced Marketing',
            'stat' => 'GEO · ChatGPT · Perplexity optimised',
            'desc' =>
                'AI-powered campaigns with automated targeting, content creation, and GEO optimisation for ChatGPT & Perplexity visibility.',
            'slug' => 'ai-enhanced-marketing',
        ],
        [
            'icon' => 'message-circle',
            'color' => '#25d366',
            'title' => 'WhatsApp Marketing',
            'stat' => '#1 channel for UAE B2B & B2C',
            'desc' =>
                'Broadcast promotions, automate responses, and nurture leads through WhatsApp Business — the #1 UAE engagement channel.',
            'slug' => 'whatsapp-marketing',
        ],
        [
            'icon' => 'users',
            'color' => '#ff6b6b',
            'title' => 'Influencer Marketing',
            'stat' => 'Nano to mega, UAE and GCC creators',
            'desc' =>
                'We connect your brand with the right creators across Instagram, TikTok, and YouTube. From nano-influencers with tight-knit communities to mega names with millions of followers, every campaign is matched to your goal, not just your budget.',
            'slug' => 'influencer-marketing',
        ],
        [
            'icon' => 'newspaper',
            'color' => '#7c6af7',
            'title' => 'PR & Media Relations',
            'stat' => 'Gulf News · Khaleej Times · 50+ outlets',
            'desc' =>
                'Get your brand featured where it matters. We place stories in top UAE and GCC publications, manage press releases, and build the kind of media presence that earns trust before a customer ever visits your website.',
            'slug' => 'pr-media-relations',
        ],
    ];
@endphp

<section id="services" class="w-full bg-[#F3F6FF] py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-4">
    <div class="mx-auto w-full max-w-7xl">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row justify-between sm:mb-16 mb-10 gap-8">
            <div class="relative">
                <span
                    class="absolute -top-8 left-0 text-6xl font-black text-gray-200 uppercase select-none -z-10 leading-none">
                    Services
                </span>
                <div class="flex items-center gap-2 mb-4">
                    <span class="font-bold tracking-wide sm:text-2xl text-xl" style="color: var(--color-secondary);">
                        What We Do
                    </span>
                </div>
                <h2 class="font-extrabold leading-[1.1] text-3xl md:text-4xl lg:text-5xl montserrat"
                    style="color: var(--color-secondary);">
                    Services That Drive<br>
                    <span style="color: var(--color-primary);">Real Business Growth</span>
                </h2>
            </div>
            <p class="text-gray-500 max-w-xs text-sm md:text-base leading-relaxed self-end">
                Every service is performance-led, data-backed, and built to grow your business in the UAE market.
            </p>
        </div>

        {{-- Cards Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($services as $svc)
                <a href="{{ route('service', $svc['slug']) }}"
                    class="group relative flex flex-col bg-white rounded-[28px] px-7 py-8 shadow-sm border border-gray-100
                          hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden">

                    {{-- Colored top border --}}
                    <div class="absolute top-0 left-0 right-0 h-[3px] rounded-t-[28px] transition-all duration-300 group-hover:h-[5px] bg-(--color-primary)"
                        {{-- style="background: {{ $svc['color'] }};" --}}></div>

                    {{-- Icon --}}
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 shadow-lg transition-transform duration-300 group-hover:scale-110 bg-(--color-primary)"
                        {{-- style="background: {{ $svc['color'] }}1a;" --}}>
                        <i data-lucide="{{ $svc['icon'] }}" class="w-7 h-7 text-white" {{-- style="color: {{ $svc['color'] }};" --}}></i>
                    </div>

                    {{-- Title --}}
                    <h3 class="text-xl font-extrabold mb-3 leading-snug montserrat transition-colors duration-300"
                        style="color: var(--color-secondary);">
                        {{ $svc['title'] }}
                    </h3>

                    {{-- Micro-stat pill --}}
                    <span
                        class="text-xs font-semibold px-3 py-1 rounded-full w-fit mb-4 tracking-wide bg-gray-900/10 text-(--color-primary)"
                        {{-- style="
                          color: {{ $svc['color'] }};
                           background: {{ $svc['color'] }}18;" --}}>
                        {{ $svc['stat'] }}
                    </span>

                    {{-- Description --}}
                    <p class="text-sm text-gray-400 leading-relaxed flex-1">
                        {{ $svc['desc'] }}
                    </p>

                    {{-- Learn More --}}
                    <div class="mt-6 flex items-center gap-1.5 text-sm font-bold transition-all duration-300 group-hover:gap-3 text-(--color-primary)"
                        {{-- style="color: {{ $svc['color'] }};" --}}>
                        Learn More
                        <i data-lucide="arrow-right"
                            class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"></i>
                    </div>
                </a>
            @endforeach

            {{-- CTA Card --}}
            <div class="relative flex flex-col justify-between rounded-[28px] px-7 py-8 overflow-hidden sm:col-span-2 lg:col-span-1"
                style="background: var(--color-primary);">

                {{-- Dot texture --}}
                <div class="absolute inset-0 opacity-[0.04]"
                    style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 22px 22px;">
                </div>

                {{-- Gold top border --}}
                <div class="absolute top-0 left-0 right-0 h-[3px] rounded-t-[28px]"
                    style="background: var(--color-gold);"></div>

                <div class="relative z-10">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6"
                        style="background: var(--color-gold)1a;">
                        <i data-lucide="lightbulb" class="w-7 h-7" style="color: var(--color-gold);"></i>
                    </div>

                    <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color: var(--color-gold);">
                        Not sure where to start?
                    </p>

                    <p class="text-white/70 text-sm leading-relaxed mb-8">
                        We'll analyse your digital presence and recommend the exact mix of services for the best ROI in
                        the UAE market. No jargon. No pushy sales.
                    </p>
                </div>

                <a href="#contact"
                    class="relative z-10 inline-flex items-center gap-2 font-bold text-sm px-5 py-3 rounded-xl
                          transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg w-fit"
                    style="background: var(--color-gold); color: var(--color-secondary);">
                    <i data-lucide="search" class="w-4 h-4"></i>
                    Free Strategy Session
                </a>
            </div>

        </div>
    </div>
</section>
