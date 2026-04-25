<section class="w-full bg-[#FCFDFF] py-10 overflow-hidden">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)] relative">

        <div class="absolute -top-16 -right-16 w-80 h-80 bg-[#4373F6] rounded-full opacity-5"></div>

        <div class="mb-16 relative z-10">
            <h2 class="font-black comp text-[#010521] leading-tight" style="font-size: clamp(2.5rem, 6vw, 3.5rem);">
                {{ $data['heading'] }}
            </h2>
        </div>

        <div class="bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">

            <div
                class="grid grid-cols-1 md:grid-cols-4 items-center bg-gray-50/50 border-b border-gray-100 divide-x divide-gray-100 md:divide-x-0">
                <div class="p-8 hidden md:block">
                    <span class="text-[#010521] font-black uppercase tracking-widest text-sm">Feature</span>
                </div>
                <div
                    class="p-8 bg-[#010521] text-white rounded-t-[2.5rem] md:rounded-t-none md:rounded-l-none text-center">
                    <span class="font-black uppercase tracking-widest text-sm">BlueOrbit</span>
                </div>
                <div class="p-8 text-center bg-gray-50 md:bg-transparent">
                    <span class="text-[#010521] font-black uppercase tracking-widest text-sm">Typical Agency</span>
                </div>
                <div class="p-8 text-center bg-gray-50 md:bg-transparent">
                    <span class="text-[#010521] font-black uppercase tracking-widest text-sm">DIY</span>
                </div>
            </div>

            <div class="divide-y divide-gray-50">

                @foreach ($data['items'] as $item)
                    <div
                        class="grid grid-cols-1 md:grid-cols-4 items-stretch divide-x divide-gray-50 md:divide-x-0 group">
                        <div class="p-8 flex items-center md:bg-gray-50/20">
                            <span class="text-[#010521] font-bold text-lg">{{ $item['feature'] }}</span>
                        </div>
                        <div
                            class="p-8 md:p-10 bg-[#010521]/5 text-[#010521] border-l-4 border-l-[#4373F6] relative group-hover:bg-[#010521]/10 transition-colors">
                            <span class="absolute top-4 right-4 text-[#4373F6] text-xl font-bold">✓</span>
                            <p class="text-sm leading-relaxed font-semibold">{{ $item['blueorbit'] }}</p>
                        </div>
                        <div class="p-8 flex items-start group-hover:bg-gray-50/20 transition-colors">
                            <span class="text-gray-400 text-xl font-bold mr-3 mt-0.5">X</span>
                            <p class="text-gray-500 text-sm leading-relaxed font-medium">{{ $item['others'] }}</p>
                        </div>
                        <div class="p-8 flex items-start group-hover:bg-gray-50/20 transition-colors">
                            <span class="text-gray-400 text-xl font-bold mr-3 mt-0.5">X</span>
                            <p class="text-gray-500 text-sm leading-relaxed font-medium">{{ $item['diy'] }}</p>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </div>
</section>
