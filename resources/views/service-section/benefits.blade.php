<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-8">
            <h2 class="font-black text-[#010521] leading-tight mb-6" style="font-size: clamp(2.5rem, 6vw, 3.5rem);">
                Major Benefits of <span class="text-[#4373F6]">{{ $service->title }}</span>
            </h2>
            <p class="text-gray-500 max-w-4xl text-lg leading-relaxed font-medium">
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

            {{-- <div
                class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                <i data-lucide="target" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                <h3 class="text-[#010521] font-black text-xl mb-3">Precision Targeting</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">Reach your ideal customers based on
                    specific demographics, interests, and real-time search intent.</p>
            </div>

            <div
                class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                <i data-lucide="line-chart" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                <h3 class="text-[#010521] font-black text-xl mb-3">Measurable ROI</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">Track every dollar spent with crystal-clear
                    analytics, from the first click to the final purchase.</p>
            </div>

            <div
                class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                <i data-lucide="globe" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                <h3 class="text-[#010521] font-black text-xl mb-3">Global & Local Reach</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">Expand your brand presence worldwide or
                    dominate local 'near me' searches with equal efficiency.</p>
            </div>

            <div
                class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                <i data-lucide="award" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                <h3 class="text-[#010521] font-black text-xl mb-3">Brand Authority</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">Position your business as a thought leader
                    through high-quality content and top-tier search rankings.</p>
            </div>

            <div
                class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                <i data-lucide="piggy-bank" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                <h3 class="text-[#010521] font-black text-xl mb-3">Lower Acquisition Cost</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">Reduce your CAC over time compared to
                    traditional media through optimized organic and paid funnels.</p>
            </div>

            <div
                class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                <i data-lucide="zap" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                <h3 class="text-[#010521] font-black text-xl mb-3">Agile Evolution</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">Flexibility to pivot strategies instantly
                    based on market trends and real-time performance data.</p>
            </div>

            <div
                class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                <i data-lucide="clock" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                <h3 class="text-[#010521] font-black text-xl mb-3">24/7 Lead Generation</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">Your digital assets work around the clock,
                    capturing leads and nurturing customers while you sleep.</p>
            </div>

            <div
                class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                <i data-lucide="mouse-pointer-2" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                <h3 class="text-[#010521] font-black text-xl mb-3">High Conversion Rates</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">Streamlined UX and targeted messaging turn
                    casual browsers into committed buyers faster.</p>
            </div>

            <div
                class="p-8 rounded-4xl bg-[#F8FAFF] border border-gray-100 hover:border-[#4373F6]/20 hover:bg-white hover:shadow-xl transition-all duration-500 group">
                <i data-lucide="cpu" class="w-10 h-10 text-[#4373F6] mb-6"></i>
                <h3 class="text-[#010521] font-black text-xl mb-3">Tech-Driven Growth</h3>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">Utilize AI-driven bidding, automated
                    workflows, and predictive analytics to outperform competitors.</p>
            </div> --}}

        </div>
    </div>
</section>
