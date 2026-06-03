{{-- SECTION 04: Results Counter Bar --}}
<section id="results" class="w-full py-16 px-4 md:px-12 relative overflow-hidden bg-(--color-primary)">

    {{-- Background texture / subtle grid --}}
    <div class="absolute inset-0 opacity-[0.04]" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 28px 28px;"></div>

    {{-- Top gold accent line --}}
    <div class="absolute top-0 left-0 right-0 h-[2px]" style="background: linear-gradient(90deg, transparent, var(--color-gold), transparent);"></div>

    <div class="max-w-7xl mx-auto relative z-10">

        {{-- Heading --}}
        <p class="text-center text-xs font-semibold tracking-[0.25em] uppercase mb-10" style="color: var(--color-gold); opacity: 0.75;">
            Real Numbers. Real Results.
        </p>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-y-10 gap-x-4">

            @php
                $stats = [
                    ['value' => 500,  'suffix' => '+', 'label' => 'Keywords on Page 1',           'prefix' => ''],
                    ['value' => 2000, 'suffix' => '+', 'label' => 'Clients Served Across UAE',    'prefix' => ''],
                    ['value' => 98,   'suffix' => '%', 'label' => 'Client Retention Rate',        'prefix' => ''],
                    ['value' => 3.2,  'suffix' => 'x', 'label' => 'Average ROI Delivered',        'prefix' => ''],
                ];
            @endphp

            @foreach ($stats as $i => $stat)
                <div class="stat-item flex flex-col items-center text-center gap-2 opacity-0 translate-y-6 transition-all duration-700"
                     data-value="{{ $stat['value'] }}"
                     data-suffix="{{ $stat['suffix'] }}"
                     data-prefix="{{ $stat['prefix'] }}"
                     data-decimals="{{ str_contains((string)$stat['value'], '.') ? 1 : 0 }}"
                     style="transition-delay: {{ $i * 120 }}ms;">

                    {{-- Number --}}
                    <div class="text-5xl md:text-6xl font-black tracking-tight leading-none montserrat"
                         style="color: var(--color-gold);">
                        <span class="stat-prefix">{{ $stat['prefix'] }}</span><span class="stat-number">0</span><span class="stat-suffix">{{ $stat['suffix'] }}</span>
                    </div>

                    {{-- Divider --}}
                    <div class="w-8 h-[2px] rounded-full mt-1" style="background: var(--color-gold); opacity: 0.4;"></div>

                    {{-- Label --}}
                    <p class="text-sm md:text-base font-medium text-white/70 max-w-[140px] leading-snug">
                        {{ $stat['label'] }}
                    </p>
                </div>
            @endforeach

        </div>
    </div>


    <div class="absolute bottom-0 left-0 right-0 h-[2px]" style="background: linear-gradient(90deg, transparent, var(--color-gold), transparent);"></div>
</section>

