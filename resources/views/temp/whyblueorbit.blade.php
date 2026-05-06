<section class="w-full bg-(--color-secondary) py-15 overflow-hidden relative">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-(--color-primary) opacity-5 -skew-x-12 translate-x-1/2"></div>

    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)] relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div>
                <h2 class="font-black text-white leading-tight text-[clamp(1.875rem,5vw,3rem)] mb-12">
                    {{ $data['heading'] ?? '' }}
                    <span class="text-(--color-primary)">
                        {{ $data['highlight'] ?? '' }}
                    </span>
                </h2>

                <div class="space-y-6">
                    @foreach ($data['features'] ?? [] as $item)
                        <div class="flex gap-x-4 group">

                            <div class="w-10 h-10 rounded-2xl bg-white/5 flex items-center justify-center">
                                <i data-lucide="{{ $item['icon'] }}"></i>
                            </div>

                            <div>
                                <h4 class="text-white font-black">{{ $item['title'] }}</h4>
                                <p class="text-gray-400 text-sm">{{ $item['desc'] }}</p>
                            </div>

                        </div>
                    @endforeach


                </div>
            </div>

            <div
                class="bg-white/5 border border-white/10 rounded-3xl sm:rounded-4xl md:rounded-[3.5rem] p-6 sm:p-8 md:p-12">
                <h5 class="text-white font-bold uppercase tracking-widest text-xs mb-6 sm:mb-8 text-center opacity-50">
                    Authorized Strategic Partners</h5>

                <div class="grid grid-cols-3 md:grid-cols-3 gap-5 md:gap-8 sm:mb-4 mb-2.5">
                    @foreach ($data['partners'] ?? [] as $p)
                        <div class="flex items-center justify-center">
                            <i class="{{ $p['icon'] }} text-4xl text-white"></i>
                        </div>
                    @endforeach
                </div>

                <div class="pt-8 border-t border-white/10">
                    <p class="text-white/80 font-bold text-sm mb-4">Core Competencies:</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($data['tags'] ?? [] as $tag)
                            <span class="bg-white/10 text-white px-4 py-2 rounded-full text-xs font-bold">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


@push('servicestyles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
@endpush
