@php
    $industries = [
        ['icon' => 'building-2',    'label' => 'Real Estate',          'color' => '#4373f6', 'slug' => 'digital-marketing-real-estate-dubai'],
        ['icon' => 'hotel',         'label' => 'Hospitality & Hotels', 'color' => '#e84545', 'slug' => 'digital-marketing-hospitality-uae'],
        ['icon' => 'heart-pulse',   'label' => 'Healthcare & Clinics', 'color' => '#e040fb', 'slug' => 'digital-marketing-healthcare-uae'],
        ['icon' => 'shopping-cart', 'label' => 'E-Commerce',           'color' => '#f5a623', 'slug' => 'digital-marketing-ecommerce-uae'],
        ['icon' => 'utensils',      'label' => 'F&B & Restaurants',    'color' => '#ff7043', 'slug' => 'digital-marketing-restaurants-dubai'],
        ['icon' => 'scale',         'label' => 'Legal & Finance',      'color' => '#00bcd4', 'slug' => 'digital-marketing-legal-finance-uae'],
        ['icon' => 'rocket',        'label' => 'Free Zone Startups',   'color' => '#43a047', 'slug' => 'digital-marketing-freezone-startups-uae'],
        ['icon' => 'shirt',         'label' => 'Retail & Fashion',     'color' => '#ec4899', 'slug' => 'digital-marketing-retail-fashion-uae'],
    ];
@endphp

<section id="industries" class="w-full bg-[#F1F5F9] py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-4">
    <div class="mx-auto w-full max-w-7xl">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row justify-between sm:mb-16 mb-10 gap-8">
            <div class="relative">
                <span class="absolute -top-8 left-0 text-6xl font-black text-gray-200 uppercase select-none -z-10 leading-none">
                    Industries
                </span>
                <div class="mb-4">
                    <span class="font-bold tracking-wide sm:text-2xl text-xl" style="color: var(--color-secondary);">
                        Who We Work With
                    </span>
                </div>
                <h2 class="font-extrabold leading-[1.1] text-3xl md:text-4xl lg:text-5xl montserrat" style="color: var(--color-secondary);">
                    Deep Expertise Across<br>
                    <span style="color: var(--color-primary);">UAE's Key Sectors</span>
                </h2>
            </div>
            <p class="text-gray-500 max-w-xs text-sm md:text-base leading-relaxed self-end">
                We don't do generic. Every campaign is built around your industry's buyers, seasonality, and competitive landscape.
            </p>
        </div>

        {{-- Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
            @foreach ($industries as $industry)
                <a href="{{ url('/' . $industry['slug']) }}"
                   class="group flex items-center gap-4 bg-[#F8FAFF] border border-gray-100 rounded-3xl sm:p-6 p-5
                          hover:bg-white hover:border-transparent hover:shadow-[0_20px_40px_rgba(67,115,246,0.08)]
                          transition-all duration-500 relative overflow-hidden">

                    {{-- Left color bar --}}
                    <div class="absolute left-0 top-0 bottom-0 w-[3px] rounded-l-3xl transition-all duration-500 group-hover:w-[5px]"
                         style="background: {{ $industry['color'] }};"></div>

                    {{-- Icon --}}
                    <div class="sm:w-14 sm:h-14 w-12 h-12 shrink-0 bg-white sm:rounded-2xl rounded-xl flex items-center justify-center shadow-sm
                                group-hover:shadow-md transition-all duration-500"
                         style="group-hover:background: {{ $industry['color'] }}18;">
                        <i data-lucide="{{ $industry['icon'] }}"
                           class="sm:w-7 sm:h-7 w-6 h-6 transition-colors duration-500"
                           style="color: {{ $industry['color'] }};"></i>
                    </div>

                    {{-- Label --}}
                    <div class="flex-1 min-w-0">
                        <h3 class="font-extrabold text-sm sm:text-base leading-snug montserrat transition-colors duration-300"
                            style="color: var(--color-secondary);">
                            {{ $industry['label'] }}
                        </h3>
                        <span class="text-xs font-semibold opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center gap-1 mt-0.5"
                              style="color: {{ $industry['color'] }};">
                            Explore
                            <i data-lucide="arrow-right" class="w-3 h-3"></i>
                        </span>
                    </div>

                </a>
            @endforeach
        </div>

    </div>
</section>