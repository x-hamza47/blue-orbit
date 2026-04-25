<section class="w-full py-10 bg-white">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="relative bg-[#010521] rounded-[3.5rem] p-10 lg:p-24 overflow-hidden shadow-2xl shadow-[#010521]/30">

            <div class="absolute top-0 right-0 w-1/2 h-full bg-linear-to-l from-[#4373F6]/10 to-transparent"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-[#4373F6] rounded-full blur-[120px] opacity-20"></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <div class="lg:col-span-8">
                    <h2 class="font-black text-white cta leading-[1.1] mb-6" style="font-size: clamp(2.5rem, 6vw, 4.5rem);">
                        {{ $data['heading'] }}
                    </h2>

                    <p class="text-gray-400 text-lg lg:text-xl font-medium max-w-2xl leading-relaxed">
                        {{ $data['subheading'] }}

                    </p>
                </div>

                <div class="lg:col-span-4 flex lg:justify-end">
                    <a href="#booking"
                        class="group relative inline-flex items-center justify-center px-10 py-6 bg-[#4373F6] text-white rounded-2xl font-black uppercase tracking-widest text-sm transition-all duration-500 hover:bg-white hover:text-[#010521] hover:scale-105 active:scale-95 shadow-xl shadow-[#4373F6]/20">
                        <span> {{ $data['btntext'] }}
                        </span>
                        <i data-lucide="arrow-up-right"
                            class="ml-3 w-5 h-5 transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
