<footer class="w-full bg-(--color-secondary) text-white pt-20 pb-10">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Main Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

            {{-- Column 1: Brand --}}
            <div class="space-y-5">

                {{-- Logo --}}
                <div class="flex gap-2">
                    <div class="logo w-20 h-20 shrink-0 rounded-md">
                        <img src="{{ asset('/images/logo.png') }}" alt="Blue Orbit Logo" class="w-full h-full">
                    </div>
                    <span class="text-2xl sm:text-3xl font-bold text-(--color-primary)">Blue Orbit Digital</span>
                </div>

                {{-- Tagline --}}
                <p class="text-gray-400 leading-relaxed text-sm">
                    UAE's performance-driven digital marketing agency. Growing businesses in Dubai, Sharjah, Abu Dhabi, and beyond.
                </p>

                {{-- Contact Details --}}
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-4 h-4 text-(--color-primary) mt-0.5 shrink-0"></i>
                        <a href="https://www.google.com/maps?q=Sharjah+Publishing+City+Free+Zone"
                            target="_blank" rel="noopener noreferrer"
                            class="hover:text-white transition">
                            Sharjah Publishing City Free Zone, UAE
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i data-lucide="phone" class="w-4 h-4 text-(--color-primary) shrink-0"></i>
                        <a href="tel:+971567716432" class="hover:text-white transition">+971 56 771 6432</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i data-lucide="mail" class="w-4 h-4 text-(--color-primary) shrink-0"></i>
                        <a href="mailto:grow@blueorbitdigitalagency.com" class="hover:text-white transition break-all">
                            grow@blueorbitdigitalagency.com
                        </a>
                    </li>
                </ul>

                {{-- Social Icons --}}
                <div class="flex items-center gap-3 pt-1">

                    {{-- Instagram --}}
                    <a href="https://www.instagram.com/blue.orbit.digital" target="_blank" rel="noopener noreferrer"
                        aria-label="Instagram"
                        class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-(--color-primary) transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="20" x="2" y="2" rx="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </a>

                    {{-- LinkedIn --}}
                    <a href="#" target="_blank" rel="noopener noreferrer"
                        aria-label="LinkedIn"
                        class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-(--color-primary) transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                            <rect width="4" height="12" x="2" y="9"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                    </a>

                    {{-- Facebook --}}
                    <a href="#" target="_blank" rel="noopener noreferrer"
                        aria-label="Facebook"
                        class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-(--color-primary) transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>

                    {{-- TikTok --}}
                    <a href="#" target="_blank" rel="noopener noreferrer"
                        aria-label="TikTok"
                        class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-(--color-primary) transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.75a4.85 4.85 0 0 1-1.01-.06z"/>
                        </svg>
                    </a>

                </div>

            </div>

            {{-- Column 2: Services --}}
            <div>
                <h4 class="text-base font-bold mb-6">Services</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    @foreach($nav as $service)
                        <li>
                            <a href="/services" class="hover:text-(--color-primary) transition flex items-center gap-2 group">
                                <span class="w-1 h-1 rounded-full bg-gray-600 group-hover:bg-(--color-primary) transition shrink-0"></span>
                                {{ $service }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3: Industries --}}
            <div>
                <h4 class="text-base font-bold mb-6">Industries</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    @foreach([
                        'Real Estate',
                        'Hospitality & Hotels',
                        'Healthcare & Clinics',
                        'E-Commerce',
                        'F&B & Restaurants',
                        'Legal & Finance',
                        'Free Zone Startups',
                        'Retail & Fashion',
                    ] as $industry)
                        <li>
                            <a href="/industries" class="hover:text-(--color-primary) transition flex items-center gap-2 group">
                                <span class="w-1 h-1 rounded-full bg-gray-600 group-hover:bg-(--color-primary) transition shrink-0"></span>
                                {{ $industry }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 4: Quick Links --}}
            <div>
                <h4 class="text-base font-bold mb-6">Quick Links</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    @foreach([
                        ['label' => 'Home',                 'href' => '/'],
                        ['label' => 'About Us',             'href' => '/about'],
                        ['label' => 'Case Studies',         'href' => '/case-studies'],
                        ['label' => 'Blog',                 'href' => '/blog'],
                        ['label' => 'Pricing',              'href' => '#pricing'],
                        ['label' => 'Free SEO Audit',       'href' => '#contact'],
                        ['label' => 'Our Process (LAUNCH)', 'href' => '/our-process'],
                        ['label' => 'Contact Us',           'href' => '#contact'],
                    ] as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="hover:text-(--color-primary) transition flex items-center gap-2 group">
                                <span class="w-1 h-1 rounded-full bg-gray-600 group-hover:bg-(--color-primary) transition shrink-0"></span>
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        {{-- Trust Signals --}}
        <div class="border-t border-white/10 pt-10 mb-10">
            <div class="flex flex-wrap items-center justify-center gap-6">

                {{-- Google Partner --}}
                <div class="flex items-center gap-2 bg-white/5 border border-white/10 rounded-xl px-4 py-2">
                    <i data-lucide="badge-check" class="w-4 h-4 text-(--color-primary)"></i>
                    <span class="text-xs font-semibold text-gray-300">Google Certified Agency</span>
                </div>

                {{-- Meta Partner --}}
                <div class="flex items-center gap-2 bg-white/5 border border-white/10 rounded-xl px-4 py-2">
                    <i data-lucide="badge-check" class="w-4 h-4 text-(--color-primary)"></i>
                    <span class="text-xs font-semibold text-gray-300">Meta Business Partner</span>
                </div>

                {{-- Clutch --}}
                <div class="flex items-center gap-2 bg-white/5 border border-white/10 rounded-xl px-4 py-2">
                    <span class="text-yellow-400 text-xs">★★★★★</span>
                    <span class="text-xs font-semibold text-gray-300">Top Agency on Clutch</span>
                </div>

                {{-- Goodfirms --}}
                <div class="flex items-center gap-2 bg-white/5 border border-white/10 rounded-xl px-4 py-2">
                    <span class="text-yellow-400 text-xs">★★★★★</span>
                    <span class="text-xs font-semibold text-gray-300">Top UAE Agency - Goodfirms</span>
                </div>

            </div>
        </div>

        {{-- Serving row --}}
        <div class="text-center text-xs text-gray-500 mb-10">
            <span class="font-semibold text-gray-400">Serving: </span>
            Dubai &bull; Sharjah &bull; Abu Dhabi &bull; Ajman &bull; All UAE Emirates &bull; GCC
        </div>

        {{-- Copyright Bar --}}
        <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-500">
            <p>© {{ date('Y') }} Blue Orbit Digital. All rights reserved.</p>
            <div class="flex gap-8">
                <a href="/terms" class="hover:text-white transition">Terms & Conditions</a>
                <a href="/privacy" class="hover:text-white transition">Privacy Policy</a>
            </div>
        </div>

    </div>
</footer>