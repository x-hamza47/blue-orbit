<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="max-w-4xl mb-8">
            <h2 class="font-black text-[#010521] leading-tight mb-6" style="font-size: clamp(2.5rem, 6vw, 3.5rem);">
                {{ $data['heading'] }}
            </h2>
            <p class="text-gray-500 text-lg leading-relaxed font-medium">
                {{ $data['subheading'] }}

            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($data['items'] as $item)
                <div
                    class="group border-l-4 border-gray-100 hover:border-[#4373F6] pl-8 py-4 transition-all duration-300">
                    <h3 class="text-2xl font-black text-[#010521] mb-4 group-hover:text-[#4373F6] transition-colors">
                        {{ $item['title'] }}</h3>
                    <ul class="space-y-3 text-gray-500 text-sm font-medium">
                        @foreach ($item['usecases'] as $usecase)
                            <li class="flex items-start gap-2">
                                <span
                                    class="text-[#4373F6] mt-1.5 w-1.5 h-1.5 rounded-full bg-[#4373F6] shrink-0"></span>
                                {{ $usecase }}
                            </li>
                        @endforeach


                    </ul>
                    {{-- <a href="#"
                        class="inline-block mt-6 text-[#4373F6] font-bold text-xs uppercase tracking-widest border-b-2 border-transparent hover:border-[#4373F6] transition-all">Read
                        Industry Insights</a> --}}
                </div>
            @endforeach

        </div>

        {{-- <div class="mt-20 p-12 bg-[#010521] rounded-[3rem] relative overflow-hidden group">
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="text-center md:text-left">
                    <h4 class="text-white font-black text-3xl mb-2">Don't see your industry here?</h4>
                    <p class="text-gray-400 font-medium">We've worked with over 30+ industries. Let's talk about your
                        custom needs.</p>
                </div>
                <button
                    class="bg-[#4373F6] text-white px-12 py-5 rounded-full font-black uppercase tracking-widest text-sm hover:scale-105 transition-all">
                    View All 30+ Sectors
                </button>
            </div>
            <div
                class="absolute -right-20 -bottom-20 w-64 h-64 bg-[#4373F6] rounded-full opacity-10 group-hover:scale-110 transition-transform duration-700">
            </div>
        </div> --}}
    </div>
</section>
