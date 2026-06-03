<section id="testimonials" class="w-full bg-white text-gray-900 overflow-hidden py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-4">
    <div class="mx-auto w-full max-w-480">

        {{-- Section Header --}}
        <div class="text-center relative md:mb-24 sm:mb-20 mb-16">
            <div class="relative z-10 flex items-center justify-center gap-2 mb-4">
                <span class="text-(--color-primary) font-bold tracking-widest text-sm uppercase">Client Results</span>
            </div>
            <h2 class="relative z-10 font-extrabold leading-[1.1] text-3xl md:text-4xl lg:text-5xl text-(--color-secondary)">
                What UAE Businesses Say About
                <span class="text-(--color-primary)">Blue Orbit</span>
            </h2>
            <p class="text-gray-500 max-w-xl mx-auto mt-4 text-base leading-relaxed">
                Don't take our word for it see what our clients across Dubai, Sharjah & Abu Dhabi have achieved.
            </p>
        </div>

        {{-- Swiper --}}
        <div class="swiper testimonialSwiper pb-16">
            <div class="swiper-wrapper pb-24!">

                @php
                    $testimonials = $data['testimonials'] ?? [
                        [
                            'quote'    => 'Blue Orbit transformed our digital presence. Within 6 months, our organic traffic tripled and we\'re now getting 40-50 qualified leads every month from Google alone. Worth every dirham.',
                            'name'     => 'Mohammed Al-Rashidi',
                            'role'     => 'Marketing Director',
                            'company'  => 'Al Badr Properties',
                            'location' => 'Dubai',
                            'photo'    => null,
                        ],
                        [
                            'quote'    => 'We tried two other agencies before Blue Orbit. The difference is night and day. They actually understand the UAE market - our Ramadan campaign generated more revenue than our entire previous year of ads.',
                            'name'     => 'Sarah Williams',
                            'role'     => 'General Manager',
                            'company'  => 'Nour Restaurant Group',
                            'location' => 'Sharjah',
                            'photo'    => null,
                        ],
                        [
                            'quote'    => 'Their SEO team got us to Page 1 for our most competitive keywords in 5 months. Our clinic now gets 3x more appointment requests from Google than from paid ads. Transparent, professional, and results-driven.',
                            'name'     => 'Dr. Daniel Mathew',
                            'role'     => 'Director',
                            'company'  => 'Elite Medical Centre',
                            'location' => 'Dubai',
                            'photo'    => null,
                        ],
                    ];
                @endphp

                @foreach ($testimonials as $testimonial)
                    <div class="swiper-slide h-auto">
                        <div class="bg-[#f8f9fb] border border-gray-300 px-5 md:px-7 lg:px-10 py-5 md:py-7 lg:py-10 rounded-[40px] h-full flex flex-col relative overflow-hidden group hover:border-(--color-primary)/40 hover:shadow-lg transition-all duration-500">

                            {{-- Stars --}}
                            <div class="flex items-center gap-1 sm:mb-6 mb-4">
                                <span class="text-yellow-400 sm:text-xl text-lg">★★★★★</span>
                                <span class="text-gray-400 ml-2 font-bold text-sm sm:text-base">5.0</span>
                            </div>

                            {{-- Quote --}}
                            <p class="text-gray-600 leading-relaxed sm:mb-8 mb-6 grow text-base">
                                "{{ $testimonial['quote'] }}"
                            </p>

                            {{-- Author --}}
                            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">

                                @if (!empty($testimonial['photo']))
                                    <img
                                        src="{{ asset($testimonial['photo']) }}"
                                        alt="{{ $testimonial['name'] }}"
                                        class="sm:w-14 sm:h-14 w-12 h-12 rounded-full object-cover border-2 border-(--color-primary) shrink-0">
                                @else
                                    <div class="sm:w-14 sm:h-14 w-12 h-12 rounded-full bg-(--color-primary)/10 border-2 border-(--color-primary) text-(--color-primary) font-bold text-sm flex items-center justify-center shrink-0">
                                        {{ strtoupper(substr($testimonial['name'], 0, 1)) }}{{ strtoupper(substr(strrchr($testimonial['name'], ' '), 1, 1)) }}
                                    </div>
                                @endif

                                <div>
                                    <h4 class="font-bold text-sm sm:text-base text-(--color-secondary)">{{ $testimonial['name'] }}</h4>
                                    <p class="text-gray-500 text-xs sm:text-sm">{{ $testimonial['role'] }}, {{ $testimonial['company'] }}, {{ $testimonial['location'] }}</p>
                                </div>

                            </div>

                            {{-- Decorative quote mark --}}
                            <span class="absolute sm:bottom-10 bottom-16 right-10 lg:text-9xl md:text-8xl sm:text-7xl text-5xl font-serif text-gray-100 select-none z-0">"</span>

                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>

        {{-- Social Proof Badges --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">

            {{-- Google --}}
            <div class="flex flex-col items-center gap-1.5 border border-gray-300 rounded-2xl p-5 text-center hover:border-(--color-primary)/40 hover:shadow-md transition-all duration-300">
                <span class="text-yellow-400 text-base">★★★★★</span>
                <p class="montserrat font-black text-lg text-(--color-secondary)">5.0</p>
                <p class="text-gray-500 text-xs font-medium">on Google</p>
                <p class="text-gray-400 text-xs">{{ $data['google_review_count'] ?? '200+' }} verified reviews</p>
            </div>

            {{-- Clutch --}}
            <div class="flex flex-col items-center gap-1.5 border border-gray-300 rounded-2xl p-5 text-center hover:border-(--color-primary)/40 hover:shadow-md transition-all duration-300">
                <span class="text-yellow-400 text-base">★★★★★</span>
                <p class="montserrat font-black text-lg text-(--color-secondary)">Top Agency</p>
                <p class="text-gray-500 text-xs font-medium">on Clutch</p>
                <p class="text-gray-400 text-xs">clutch.co/profile/blue-orbit</p>
            </div>

            {{-- Goodfirms --}}
            <div class="flex flex-col items-center gap-1.5 border border-gray-300 rounded-2xl p-5 text-center hover:border-(--color-primary)/40 hover:shadow-md transition-all duration-300">
                <span class="text-yellow-400 text-base">★★★★★</span>
                <p class="montserrat font-black text-lg text-(--color-secondary)">Top UAE Agency</p>
                <p class="text-gray-500 text-xs font-medium">on Goodfirms</p>
                <p class="text-gray-400 text-xs">goodfirms.co/blue-orbit</p>
            </div>

        </div>

    </div>
</section>