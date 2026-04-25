<section class="w-full bg-[#FCFDFF] py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="text-center max-w-4xl mx-auto mb-5">
            <h2 class="text-[#010521] font-black mb-6 leading-tight text-center"
                style="font-size: clamp(2.5rem, 5vw, 3.5rem);">
                Our <span class="text-[#4373F6]">{{ $service->title }}</span> Services
            </h2>
            <p class="text-gray-500 leading-relaxed text-lg font-medium text-center">
                {{ $data['subheading'] }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            @foreach ($data['items'] as $item)
                <div
                    class="bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-[0_10px_30px_rgba(1,5,33,0.03)] hover:shadow-[0_20px_50px_rgba(67,115,246,0.1)] hover:-translate-y-2 transition-all duration-500 group">
                    <div
                        class="mb-8 w-16 h-16 bg-[#F4F7FF] rounded-2xl flex items-center justify-center group-hover:bg-[#4373F6] transition-colors duration-500">
                        <i data-lucide="{{ $item['icon'] }}"
                            class="w-8 h-8 text-[#4373F6] group-hover:text-white transition-colors duration-500"></i>
                    </div>
                    <h3 class="text-[#010521] font-black text-xl mb-3 group-hover:text-[#4373F6] transition-colors">
                        {{ $item['title'] }}
                    </h3>
                    <p class="text-gray-500 leading-relaxed text-sm font-medium"> {{ $item['desc'] }}</p>
                </div>
            @endforeach


        </div>
    </div>
</section>
