<section class="w-full max-w-480 py-10">
    <div class="mx-auto px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-8">
            <h2 class="font-black text-[#010521] leading-tight" style="font-size: clamp(2rem, 5vw, 3rem);">
                {{-- Blue Orbit offshore <span class="text-[#4373F6]">strength in numbers</span> --}}
                {{ $data['heading'] }}
            </h2>
        </div>

        <div class="relative group">
            <div
                class="absolute inset-0 bg-[#4373F6] translate-x-3 translate-y-3 rounded-3xl -z-10 opacity-10 group-hover:translate-x-1 group-hover:translate-y-1 transition-transform duration-500">
            </div>

            <div
                class="bg-white border border-[#4373F6]/10 shadow-[0_20px_50px_rgba(67,115,246,0.08)] p-[clamp(2.5rem,6vw,4.5rem)] rounded-3xl">
                <div class="flex flex-wrap justify-center gap-y-20 text-center">

                    @foreach ($data['items'] as $item)
                        <div class="flex flex-col items-center group/item basis-full sm:basis-1/2 lg:basis-1/3">
                            <span
                                class="font-black text-[#010521] text-[clamp(2.5rem,5vw,4rem)] leading-none group-hover/item:text-[#4373F6] transition-colors duration-300">{{ $item['title'] }}</span>
                            <div
                                class="h-1 w-12 bg-[#4373F6] my-4 rounded-full opacity-20 group-hover/item:w-20 group-hover/item:opacity-100 transition-all duration-300">
                            </div>
                            <p
                                class="text-gray-500 font-semibold max-w-55 text-sm md:text-base leading-snug uppercase tracking-tight">
                                {{ $item['desc'] }}
                            </p>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</section>
