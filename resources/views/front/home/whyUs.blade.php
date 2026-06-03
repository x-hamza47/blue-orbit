<section id="why-us"
    class="w-full bg-white py-16 md:py-20 lg:py-24 md:px-12 sm:px-6 px-4">

    <div class="max-w-7xl mx-auto flex flex-col gap-16">

        {{-- TOP: Two columns --}}
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">

            {{-- LEFT: Copy + Checklist --}}
            <div class="w-full lg:w-1/2 flex flex-col gap-6">

                <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest
                             text-(--color-primary) border border-(--color-primary)/30 bg-(--color-primary)/8
                             rounded-full px-4 py-1.5 w-fit">
                    <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                    Why Blue Orbit
                </span>

                <h2 class="montserrat font-extrabold text-(--color-secondary) leading-[1.1] tracking-tight
                            lg:text-5xl md:text-4xl sm:text-3xl text-2xl">
                    We're Not Just an Agency.<br>
                    <span class="text-(--color-primary)">We're Your UAE Growth Partner.</span>
                </h2>

                <p class="text-gray-500 leading-relaxed text-base max-w-lg">
                    At Blue Orbit Digital, we do one thing: grow businesses in the UAE's hyper-competitive
                    digital landscape. Unlike generalist agencies that apply global templates to local problems,
                    our entire operation is built for the UAE market, its culture, its buyers, and its unique
                    digital behaviour.
                </p>

                <p class="text-gray-500 leading-relaxed text-base max-w-lg">
                    Whether you're a free zone startup or an established Dubai enterprise, our team combines
                    deep local knowledge with world-class marketing execution to deliver results you can measure.
                </p>

                {{-- Checklist --}}
                <ul class="flex flex-col gap-3 mt-1">
                    @php
                    $points = [
                        ['icon' => 'map-pin',    'label' => 'UAE-first strategy',         'detail' => 'Every campaign is built for this market, not copy-pasted from a global template'],
                        ['icon' => 'users',      'label' => '150+ in-house specialists',  'detail' => 'No outsourcing, no handoffs. Your team works directly on your account'],
                        ['icon' => 'globe-2',    'label' => 'Bilingual campaigns',        'detail' => 'We craft content in both English and Arabic to reach every UAE audience'],
                        ['icon' => 'bar-chart-2','label' => 'Real-time reporting',        'detail' => 'Full dashboard access so you see exactly where every dirham goes'],
                        ['icon' => 'cpu',        'label' => 'AI-powered optimisation',    'detail' => 'We use cutting-edge AI tools to outperform manually-managed campaigns'],
                        ['icon' => 'trophy',     'label' => 'Proven results',             'detail' => '500+ keywords ranked, 2,000+ clients served, 98% retention rate'],
                    ];
                    @endphp

                    @foreach ($points as $point)
                    <li class="flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full bg-(--color-primary)/10 flex items-center
                                     justify-center flex-shrink-0 mt-0.5">
                            <i data-lucide="{{ $point['icon'] }}" class="w-3.5 h-3.5 text-(--color-primary)"></i>
                        </span>
                        <span class="text-sm md:text-base leading-relaxed text-gray-600">
                            <strong class="text-(--color-secondary) font-semibold">{{ $point['label'] }}.</strong>
                            {{ $point['detail'] }}
                        </span>
                    </li>
                    @endforeach
                </ul>

                <div class="flex flex-wrap items-center gap-4 mt-3">
                    <a href="#contact"
                        class="flex items-center gap-2 bg-(--color-primary) text-white font-bold
                               rounded-full py-3 px-7 hover:bg-(--color-primary-hover) hover:scale-105
                               transition-all transform text-sm md:text-base">
                        <i data-lucide="rocket" class="w-4 h-4"></i>
                        Work With Us
                    </a>
                    <a href="#services"
                        class="flex items-center gap-2 border border-(--color-secondary)/20 text-(--color-secondary)
                               font-bold rounded-full py-3 px-7 hover:border-(--color-primary)/40
                               hover:text-(--color-primary) transition-all text-sm md:text-base">
                        See Our Services
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

            </div>

            {{-- RIGHT: Team photo --}}
            <div class="w-full lg:w-1/2 flex justify-center">
                <div class="relative w-full max-w-lg">

                    <div class="rounded-2xl overflow-hidden shadow-2xl shadow-gray-200/80 border border-gray-100">
                        <img src="{{ asset('./images/team.jpg') }}"
                             alt="Blue Orbit Digital UAE Team"
                             class="w-full h-full object-cover aspect-4/3"
                             onerror="this.src='https://blog.iil.com/wp-content/uploads/2022/09/fv7p606ao1s0-GettyImages-1256522124.jpg'">
                    </div>

                    {{-- Floating stat: top-left --}}
                    <div class="absolute -top-4 -left-4 bg-white rounded-xl shadow-lg border border-gray-100
                                px-4 py-3 flex items-center gap-3">
                        <span class="w-9 h-9 rounded-full bg-(--color-primary)/10 flex items-center justify-center">
                            <i data-lucide="users" class="w-4 h-4 text-(--color-primary)"></i>
                        </span>
                        <div>
                            <p class="text-lg font-extrabold text-(--color-secondary) leading-none">150+</p>
                            <p class="text-xs text-gray-400 font-medium mt-0.5">In-house Specialists</p>
                        </div>
                    </div>

                    {{-- Floating stat: bottom-right --}}
                    <div class="absolute -bottom-4 -right-4 bg-white rounded-xl shadow-lg border border-gray-100
                                px-4 py-3 flex items-center gap-3">
                        <span class="w-9 h-9 rounded-full bg-(--color-gold)/10 flex items-center justify-center">
                            <i data-lucide="trophy" class="w-4 h-4 text-(--color-gold)"></i>
                        </span>
                        <div>
                            <p class="text-lg font-extrabold text-(--color-secondary) leading-none">98%</p>
                            <p class="text-xs text-gray-400 font-medium mt-0.5">Client Retention Rate</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- BOTTOM: 4 Differentiator Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @php
            $cards = [
                [
                    'icon'  => 'target',
                    'title' => 'Performance-First',
                    'desc'  => 'Every strategy starts with your target numbers. Leads, sales, or ROAS. We work backwards from what matters.',
                ],
                [
                    'icon'  => 'microscope',
                    'title' => 'Data-Driven',
                    'desc'  => 'We track every click, conversion, and dirham. Monthly reports you actually understand.',
                ],
                [
                    'icon'  => 'handshake',
                    'title' => 'Transparent Partner',
                    'desc'  => 'No hidden fees. No vanity metrics. No lock-in contracts. Just honest results.',
                ],
                [
                    'icon'  => 'message-square',
                    'title' => 'Arabic + English',
                    'desc'  => 'Bilingual copy, bilingual ads, bilingual support for the full UAE market.',
                ],
            ];
            @endphp

            @foreach ($cards as $card)
            <div class="group flex flex-col gap-4 p-6 rounded-2xl border border-gray-100
                        hover:border-(--color-primary)/30 hover:shadow-xl hover:shadow-(--color-primary)/8
                        transition-all duration-300 cursor-default">

                <span class="w-12 h-12 rounded-xl bg-(--color-primary)/10 flex items-center justify-center
                             group-hover:bg-(--color-primary) transition-all duration-300">
                    <i data-lucide="{{ $card['icon'] }}"
                       class="w-5 h-5 text-(--color-primary) group-hover:text-white transition-colors duration-300"></i>
                </span>

                <div>
                    <h3 class="font-bold text-(--color-secondary) text-base mb-2">{{ $card['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $card['desc'] }}</p>
                </div>

            </div>
            @endforeach

        </div>

    </div>
</section>