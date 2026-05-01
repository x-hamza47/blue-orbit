<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-8">
            <h2 class="font-black text-[#010521] leading-tight mb-6" style="font-size: clamp(2.5rem, 6vw, 3.5rem);">
                Major Benefits of <span class="text-[#4373F6]">{{ $service->title }}</span>
            </h2>
            <p class="text-gray-500 max-w-4xl text-base sm:text-lg leading-relaxed font-medium">
                {{ $data['subheading'] }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($data['items'] as $item)
                <div
                    class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                    <i data-lucide="{{ $item['icon'] }}" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                    <h3 class="text-[#010521] font-black text-xl mb-3">{{ $item['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-medium">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
