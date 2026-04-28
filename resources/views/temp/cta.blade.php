<section class="w-full py-10 bg-white">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div
            class="relative bg-(--color-secondary) rounded-3xl sm:rounded-4xl md:rounded-[3.5rem] p-6 sm:p-8 md:p-10 overflow-hidden shadow-xl md:shadow-2xl shadow-(--color-secondary)/30">

            <div class="absolute top-0 right-0 w-1/2 h-full bg-linear-to-l from-(--color-primary)/20 to-transparent">
            </div>
            <div
                class="absolute -bottom-24 -left-24 md:w-96 md:h-96 sm:w-80 sm:h-80 w-72 h-72 bg-(--color-primary) rounded-full blur-[80px] opacity-20">
            </div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <div class="lg:col-span-8">
                    <h2 class="font-black text-white leading-[1.1] text-[clamp(1.875rem,5vw,3rem)] mb-2">
                        {!! $data['heading'] ?? '' !!}
                        {{-- Ready to grow? <br>
                        Lets create your <span class="text-(--color-primary)">winning strategy</span>— Free --}}
                    </h2>

                    <p class="text-gray-400 text-lg lg:text-xl font-medium max-w-2xl leading-relaxed">
                        {{ $data['subheading'] ?? '' }}
                    </p>
                </div>

                <div class="lg:col-span-4 flex lg:justify-end">
                    <a href="{{ $data['button_link'] ?? '#' }}"
                        class="group relative inline-flex items-center justify-center sm:px-8 px-6 md:px-10 py-4 md:py-6 bg-(--color-primary) text-white rounded-xl sm:rounded-2xl font-semibold sm:font-black uppercase tracking-widest text-sm transition-all duration-500 hover:bg-white hover:text-(--color-secondary) hover:scale-105 active:scale-95 shadow-xl shadow-(--color-primary)/20">
                        <span>{{ $data['button_text'] ?? '' }}</span>
                        <i data-lucide="arrow-up-right"
                            class="ml-3 w-5 h-5 transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
