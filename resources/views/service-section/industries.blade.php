<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-8">
            <h2 class="font-black text-[#010521] leading-tight mb-6" style="font-size: clamp(2rem, 5vw, 3rem);">
                Industries <span class="text-[#4373F6]">we support</span>
            </h2>
            <p class="text-gray-500 max-w-4xl text-lg leading-relaxed font-medium">
                {{ $data['subheading'] }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($data['items'] as $item)
                <div
                    class="flex items-start gap-5 border border-gray-100 bg-[#F8FAFF] rounded-3xl p-8 hover:border-[#4373F6]/30 hover:bg-white hover:shadow-[0_20px_40px_rgba(67,115,246,0.08)] transition-all duration-500 group">
                    <div
                        class="w-14 h-14 shrink-0 bg-white rounded-2xl flex items-center justify-center shadow-sm group-hover:bg-[#4373F6] transition-colors duration-500">
                        <i data-lucide="{{ $item['icon'] }}"
                            class="w-7 h-7 text-[#4373F6] group-hover:text-white transition-colors"></i>
                    </div>
                    <div>
                        <h3 class="font-black text-[#010521] uppercase tracking-tight text-lg mb-1">{{ $item['title'] }}
                        </h3>
                        <p class="text-gray-500 text-sm leading-snug font-medium">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
