<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-8">
            <h2 class="font-black text-[#010521] leading-tight text-[clamp(1.875rem,5vw,3rem)] mb-2" >
                Major Benefits of <span class="text-[#4373F6]">{{ $service->title }}</span>
            </h2>
            <p class="text-gray-500 max-w-4xl text-base md:text-lg leading-relaxed font-medium">
                {{ $data['subheading'] }}
            </p>
        </div>

        <div class="flex justify-center xl:justify-center md:gap-6 gap-4 flex-wrap">

            @foreach ($data['items'] as $item)
                <div
                    class="md:p-8 p-6 max-w-80 lg:max-w-[380px] rounded-3xl md:rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                    <i data-lucide="{{ $item['icon'] }}" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                    <h3 class="text-[#010521] font-black text-xl mb-3">{{ $item['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-medium">{{ $item['desc'] }}</p>
                </div>
       
            @endforeach
        </div>
    </div>
</section>
