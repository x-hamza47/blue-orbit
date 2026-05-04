<section class="w-full bg-[#F8FAFF] py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 md:gap-8 mb-8">
            <div class="max-w-2xl">
                <h2 class="font-black text-[#010521] leading-tight text-[clamp(1.875rem,5vw,3rem)]">
                    Complementary <span class="text-[#4373F6]">Growth Services</span>
                </h2>
            </div>
            <div class="pb-2">
                <a href="#"
                    class="group flex items-center gap-2 text-[#010521] font-black uppercase tracking-widest text-xs border-b-2 border-[#4373F6] pb-1 hover:text-[#4373F6] transition-all">
                    View All Services
                    <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach ($data as $item)
                <div
                    class="bg-white p-6 md:p-8 lg:p-10 rounded-4xl md:rounded-[2.5rem] border border-gray-100 flex flex-col items-start hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group">
                    <div
                        class="md:w-14 md:h-14 w-12 h-12 bg-[#F8FAFF] rounded-2xl flex items-center justify-center md:mb-8 mb-5 group-hover:bg-[#4373F6] transition-colors duration-500">
                        <i data-lucide="{{ $item->icon ?? "file-text" }}"
                            class="w-7 h-7 text-[#4373F6] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-[#010521] font-black text-xl md:text-2xl mb-3 md:mb-4">{{ $item->title }}</h3>
                    <p class="text-gray-500 font-medium text-base md:text-lg leading-relaxed mb-6 md:mb-8">
                       {{ $item->desc }}
                    </p>
                    <a href="{{ route('service', $item->slug) }}"
                        class="mt-auto flex items-center gap-3 bg-[#010521] text-white px-5 py-2.5 md:px-8 md:py-4 rounded-xl font-black uppercase tracking-widest text-xs hover:bg-[#4373F6] transition-all group/btn">
                        Explore Service
                        <i data-lucide="plus"
                            class="md:w-4 md:h-4 w-3 h-3 group-hover/btn:rotate-90 transition-transform"></i>
                    </a>
                </div>
            @endforeach
            {{-- <div
                class="bg-white p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group">
                <div
                    class="w-14 h-14 bg-[#F8FAFF] rounded-2xl flex items-center justify-center mb-8 group-hover:bg-[#4373F6] transition-colors duration-500">
                    <i data-lucide="share-2"
                        class="w-7 h-7 text-[#4373F6] group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-[#010521] font-black text-2xl mb-4">Social Management</h3>
                <p class="text-gray-500 font-medium leading-relaxed mb-8">
                    Turn your social profiles into conversion engines through consistent branding, community engagement,
                    and viral strategy.
                </p>
                <button
                    class="mt-auto flex items-center gap-3 bg-[#010521] text-white px-8 py-4 rounded-xl font-black uppercase tracking-widest text-xs hover:bg-[#4373F6] transition-all group/btn">
                    Explore Service
                    <i data-lucide="plus" class="w-4 h-4 group-hover/btn:rotate-90 transition-transform"></i>
                </button>
            </div>

            <div
                class="bg-white p-10 rounded-[2.5rem] border border-gray-100 flex flex-col items-start hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group">
                <div
                    class="w-14 h-14 bg-[#F8FAFF] rounded-2xl flex items-center justify-center mb-8 group-hover:bg-[#4373F6] transition-colors duration-500">
                    <i data-lucide="mail-check"
                        class="w-7 h-7 text-[#4373F6] group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-[#010521] font-black text-2xl mb-4">Email Automation</h3>
                <p class="text-gray-500 font-medium leading-relaxed mb-8">
                    Nurture leads automatically with high-converting drip campaigns, behavioral triggers, and advanced
                    segmentation.
                </p>
                <button
                    class="mt-auto flex items-center gap-3 bg-[#010521] text-white px-8 py-4 rounded-xl font-black uppercase tracking-widest text-xs hover:bg-[#4373F6] transition-all group/btn">
                    Explore Service
                    <i data-lucide="plus" class="w-4 h-4 group-hover/btn:rotate-90 transition-transform"></i>
                </button>
            </div> --}}

        </div>
    </div>
</section>
