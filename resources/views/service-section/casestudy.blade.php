<section class="w-full bg-[#010521] py-10 overflow-hidden">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-16">
            <h2 class="font-black text-white case leading-tight" style="font-size: clamp(2.5rem, 6vw, 3.5rem);">
                {{ $data['heading'] }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @foreach ($data['items'] as $item)
                <div
                    class="group bg-white/5 border border-white/10 p-10 rounded-[3rem] hover:bg-white/8 transition-all duration-500 hover:-translate-y-2">
                    <div class="mb-8">
                        <span class="text-[#4373F6] font-black"
                            style="font-size: clamp(3rem, 5vw, 4.5rem);">{{ $item['title'] }}</span>
                    </div>
                    <h3 class="text-white font-black text-2xl mb-2">{{ $item['desc'] }}</h3>
                    <div class="flex items-center gap-3">

                        <span class="w-1 h-1 bg-[#4373F6] rounded-full"></span>
                        <span
                            class="text-gray-500 font-bold text-xs uppercase tracking-widest">{{ $item['service'] }}</span>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
