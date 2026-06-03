<section id="our-process" class="w-full bg-[#f8f9fb] md:px-12 sm:px-6 px-4 py-20">

    <div class="max-w-7xl mx-auto w-full">

        {{-- Section Header --}}
        <div class="flex flex-col items-center text-center mb-16">
            <span class="text-(--color-primary) uppercase tracking-widest text-sm font-semibold mb-3">
                Our Process
            </span>
            <h2 class="montserrat font-extrabold text-(--color-secondary) lg:text-4xl md:text-3xl text-2xl leading-tight mb-4">
                The Blue Orbit
                <span class="text-(--color-primary)">LAUNCH Framework</span>
            </h2>
            <p class="text-gray-500 max-w-xl text-base leading-relaxed">
                A proven 6-step system that takes your business from invisible to unmissable in the UAE and beyond.
            </p>
        </div>

        {{-- LAUNCH Acronym Banner --}}
        <div class="flex items-center justify-center mb-14">

            @php
                $letterColors = [
                    'L' => '#4373f6',
                    'A' => '#f5a623',
                    'U' => '#10b981',
                    'N' => '#8b5cf6',
                    'C' => '#ef4444',
                    'H' => '#06b6d4',
                ];
            @endphp

            @foreach(['L','A','U','N','C','H'] as $letter)

                <div
                    class="flex items-center justify-center w-9 h-9 sm:w-12 sm:h-12 md:w-14 md:h-14 rounded-xl text-white montserrat font-black text-lg sm:text-2xl md:text-3xl"
                    style="background-color: {{ $letterColors[$letter] }};">
                    {{ $letter }}
                </div>

                @if(!$loop->last)
                    <div class="hidden sm:block w-3 sm:w-5 md:w-8 h-0.5 bg-gray-200"></div>
                @endif

            @endforeach

        </div>

        {{-- Steps Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">

            @php
                $steps = $data['steps'] ?? [
                    ['letter' => 'L', 'title' => 'Listen',    'desc' => 'Deep discovery of your business, audience & goals'],
                    ['letter' => 'A', 'title' => 'Architect', 'desc' => 'Build a custom strategy with measurable KPIs'],
                    ['letter' => 'U', 'title' => 'Unleash',   'desc' => 'Execute campaigns, launch platforms & assets'],
                    ['letter' => 'N', 'title' => 'Navigate',  'desc' => 'Real-time monitoring & performance tracking'],
                    ['letter' => 'C', 'title' => 'Convert',   'desc' => 'Optimise for leads, sales & ROI continuously'],
                    ['letter' => 'H', 'title' => 'Hone',      'desc' => 'Scale what works. Monthly reporting & growth reviews'],
                ];

                $cardBg = [
                    'L' => '#eff4ff',
                    'A' => '#fef9ee',
                    'U' => '#ecfdf5',
                    'N' => '#f5f3ff',
                    'C' => '#fef2f2',
                    'H' => '#ecfeff',
                ];
            @endphp

            @foreach($steps as $index => $step)

                @php $color = $letterColors[$step['letter']]; @endphp
                @php $bg = $cardBg[$step['letter']]; @endphp

                <div
                    class="launch-card group flex flex-col items-center text-center gap-3 border border-gray-100 rounded-2xl p-5 hover:-translate-y-2 hover:shadow-xl transition-all duration-300"
                    style="border-top: 3px solid {{ $color }}; background-color: {{ $bg }};"
                    data-index="{{ $index }}">

                    {{-- Number bubble --}}
                    <div
                        class="step-number w-9 h-9 rounded-full font-black text-base flex items-center justify-center transition-all duration-300"
                        style="background-color: {{ $color }}1a; color: {{ $color }};">
                        {{ $index + 1 }}
                    </div>

                    {{-- Letter --}}
                    <div
                        class="montserrat font-black text-4xl leading-none transition-colors duration-300"
                        style="color: {{ $color }};">
                        {{ $step['letter'] }}
                    </div>

                    {{-- Title --}}
                    <h3 class="font-bold text-sm text-(--color-secondary) tracking-wide uppercase">
                        {{ $step['title'] }}
                    </h3>

                    {{-- Description --}}
                    <p class="text-gray-400 text-xs leading-relaxed">
                        {{ $step['desc'] }}
                    </p>

                </div>

            @endforeach

        </div>

        {{-- Bottom CTA --}}
        <div class="flex justify-center mt-12">
            <a href="/our-process"
                class="flex items-center gap-3 bg-(--color-secondary) text-white font-bold rounded-full py-3 px-8 hover:bg-(--color-primary) transition-all duration-300 text-sm md:text-base">
                See Our Full Process
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </a>
        </div>

    </div>

</section>