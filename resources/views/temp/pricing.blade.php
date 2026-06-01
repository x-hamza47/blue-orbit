<section class="w-full bg-[#FCFDFF] py-10 overflow-hidden">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)] relative">

        <div class="absolute -top-16 -right-16 w-80 h-80 bg-(--color-primary) rounded-full opacity-5"></div>

        <div class="mb-12 relative z-10">
            <h2 class="font-black text-(--color-secondary) leading-tight text-[clamp(1.875rem,5vw,3rem)]">
                {{ $data['heading'] ?? 'SEO Services Pricing —' }}
                <span class="text-(--color-primary)">
                    {{ $data['highlight'] ?? 'Clear, Transparent, No Surprises' }}
                </span>
            </h2>
            <p class="mt-4 text-gray-500 text-base max-w-xl leading-relaxed">
                {{ $data['subheading'] ?? 'We believe pricing transparency is the foundation of trust. Choose the SEO package that fits your goals — or contact us for a fully custom enterprise engagement.' }}
            </p>
        </div>

            {{-- ================= DESKTOP TABLE ================= --}}
            <div
                class="hidden lg:block bg-white rounded-4xl sm:rounded-[3rem] border border-gray-100 shadow-sm relative ">

                {{-- Header --}}
                <div class="grid grid-cols-4 bg-gray-50/50 border-b border-gray-100">

                    <div class="p-6 sm:p-8 flex items-end">
                        <span class="text-(--color-secondary) font-black uppercase tracking-widest text-xs">
                            Feature
                        </span>
                    </div>

                    @foreach ($data['plans'] ?? [] as $plan)
                        <div @class([
                            'p-6 sm:p-8 text-center relative',
                            'bg-(--color-secondary) text-white' => $plan['highlighted'] ?? false,
                            'bg-gray-50 text-gray-500' => !($plan['highlighted'] ?? false),
                        ])>

                            @if (!empty($plan['badge']))
                                <span
                                    class="absolute -top-3 left-1/2 -translate-x-1/2 bg-(--color-primary) text-white text-[0.6rem] font-black uppercase tracking-widest rounded-full px-3 py-0.5 whitespace-nowrap">
                                    {{ $plan['badge'] }}
                                </span>
                            @endif

                            <span class="font-black uppercase tracking-widest text-xs block">
                                {{ $plan['name'] }}
                            </span>

                            <span @class([
                                'text-xs font-semibold mt-1 block',
                                'text-indigo-300' => $plan['highlighted'] ?? false,
                                'text-gray-400' => !($plan['highlighted'] ?? false),
                            ])>
                                {{ $plan['price'] }}
                            </span>

                        </div>
                    @endforeach
                </div>

                {{-- Rows --}}
                <div class="divide-y divide-gray-50">

                    @foreach ($data['rows'] ?? [] as $row)
                        <div class="grid grid-cols-4 items-stretch group">

                            <div class="p-5 sm:p-6 flex items-center bg-gray-50/30">
                                <span class="text-(--color-secondary) font-bold text-sm">
                                    {{ $row['feature'] }}
                                </span>
                            </div>

                            @foreach ($row['values'] ?? [] as $index => $value)
                                @php $highlighted = $data['plans'][$index]['highlighted'] ?? false; @endphp

                                <div @class([
                                    'p-5 sm:p-6 flex items-center justify-center text-center text-sm',
                                    'bg-(--color-secondary)/5 border-l-4 border-l-(--color-primary) font-semibold text-(--color-secondary)' => $highlighted,
                                    'text-gray-500 border-l border-gray-50' => !$highlighted,
                                ])>

                                    @if (str_starts_with(trim($value), '✅') || str_starts_with(trim($value), '✓'))
                                        <span class="text-(--color-primary) font-black mr-1.5">✓</span>
                                        {{ ltrim(ltrim(trim($value), '✅'), '✓') }}
                                    @else
                                        {{ $value }}
                                    @endif

                                </div>
                            @endforeach

                        </div>
                    @endforeach

                </div>
            </div>

            {{-- ================= MOBILE CARDS ================= --}}
            <div class="lg:hidden space-y-6">

                @foreach ($data['plans'] ?? [] as $pi => $plan)
                    <div @class([
                        'rounded-3xl border overflow-hidden',
                        'border-(--color-primary)' => $plan['highlighted'] ?? false,
                        'border-gray-200 bg-white' => !($plan['highlighted'] ?? false),
                    ])>

                        {{-- Header --}}
                        <div @class([
                            'p-6 text-center relative',
                            'bg-(--color-secondary) text-white' => $plan['highlighted'] ?? false,
                            'bg-gray-50 text-(--color-secondary)' => !($plan['highlighted'] ?? false),
                        ])>

                            @if (!empty($plan['badge']))
                                <span
                                    class="absolute top-3 right-3 bg-(--color-primary) text-white text-[0.6rem] font-black uppercase tracking-widest rounded-full px-3 py-1">
                                    {{ $plan['badge'] }}
                                </span>
                            @endif

                            <h3 class="font-black uppercase tracking-widest text-sm">
                                {{ $plan['name'] }}
                            </h3>

                            <p class="mt-2 text-sm font-semibold">
                                {{ $plan['price'] }}
                            </p>

                        </div>

                        {{-- Features --}}
                        <div class="divide-y divide-gray-100">

                            @foreach ($data['rows'] ?? [] as $row)
                                @php
                                    $value = $row['values'][$pi] ?? '';
                                @endphp

                                <div class="p-5 flex items-start justify-between gap-4">

                                    <span class="text-sm font-semibold text-(--color-secondary)">
                                        {{ $row['feature'] }}
                                    </span>

                                    <span class="text-sm text-right text-gray-500">

                                        @if (str_starts_with(trim($value), '✅') || str_starts_with(trim($value), '✓'))
                                            <span class="text-(--color-primary) font-black mr-1">✓</span>
                                            {{ ltrim(ltrim(trim($value), '✅'), '✓') }}
                                        @else
                                            {{ $value }}
                                        @endif

                                    </span>

                                </div>
                            @endforeach

                        </div>

                    </div>
                @endforeach

            </div>
    
    </div>
</section>
