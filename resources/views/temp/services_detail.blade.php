@php
    $data            = $section['resolved_data'] ?? $section['data'] ?? [];
    $headingPrimary  = $data['heading']           ?? 'Services Detail';  
    $headingRest     = $data['heading_highlight'] ?? 'Explain';       
    $services        = $data['services']          ?? [];
@endphp

<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        {{-- Header --}}
        <div class="mb-12">
            <h2 class="font-black text-(--color-secondary) leading-tight text-[clamp(1.875rem,5vw,3rem)]">
                <span class="text-(--color-primary)">{{ $headingPrimary }}</span>
                {{ $headingRest }}
            </h2>
        </div>

        {{-- Services Stack --}}
        @if(!empty($services))
            <div class="space-y-10">

                @foreach($services as $service)

                    {{-- Divider — skip first --}}
                    @if(!$loop->first)
                        <hr class="border-gray-100">
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

                        {{-- Sticky Col — flips right on even rows --}}
                        <div class="lg:col-span-4 sticky top-10 {{ $loop->even ? 'lg:order-2' : '' }}">
                            <h3 class="text-(--color-secondary) font-black sm:text-2xl text-xl md:text-3xl sm:mb-6 mb-4">
                                {{ $service['title'] ?? '' }}
                            </h3>
                            <p class="text-gray-500 text-sm sm:text-base font-medium leading-relaxed">
                                {{ $service['intro'] ?? '' }}
                            </p>
                        </div>

                        {{-- Cards Col — flips left on even rows --}}
                        <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 sm:gap-8 gap-6 {{ $loop->even ? 'lg:order-1' : '' }}">

                            {{-- Card 1 — Light --}}
                            <div class="bg-[#F8FAFF] md:p-10 sm:p-8 p-7 rounded-[2.5rem] border border-gray-100">
                                <h4 class="text-(--color-primary) font-black uppercase tracking-widest text-xs sm:mb-6 mb-4">
                                    {{ $service['what_title'] ?? 'What It Involves' }}
                                </h4>
                                <p class="text-(--color-secondary) text-sm leading-relaxed font-medium">
                                    {{ $service['what_desc'] ?? '' }}
                                </p>
                            </div>

                            {{-- Card 2 — Dark --}}
                            <div class="bg-(--color-secondary) md:p-10 sm:p-8 p-7 rounded-[2.5rem] shadow-lg sm:shadow-xl">
                                <h4 class="text-(--color-primary) font-black uppercase tracking-widest text-xs sm:mb-6 mb-4">
                                    {{ $service['why_title'] ?? 'Why It\'s a Great Investment' }}
                                </h4>
                                <p class="text-gray-300 text-sm leading-relaxed font-medium">
                                    {{ $service['why_desc'] ?? '' }}
                                </p>
                            </div>

                        </div>
                    </div>

                @endforeach

            </div>
        @endif

    </div>
</section>