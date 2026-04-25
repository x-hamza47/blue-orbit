<section class="w-full bg-white py-[clamp(4rem,10vw,8rem)]">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-8">
            <h2 class="font-black text-[#010521] leading-[1.1]" style="font-size: clamp(2.5rem, 5vw, 4.5rem);">
                {{ $data['heading'] }}
            </h2>
        </div>

        <div class="space-y-32">
            @foreach ($data['items'] as $index => $item)
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">

                    <div class="lg:col-span-5 {{ $loop->even ? 'lg:order-2' : '' }}">
                        <div class="relative">
                            <span
                                class="absolute -top-12 -left-8 text-[12rem] font-black text-[#F8FAFF] select-none z-0">
                                {{ sprintf('%02d', $loop->iteration) }}
                            </span>

                            <div class="relative z-10">
                                <h3 class="text-[#010521] font-black text-4xl mb-8 leading-tight">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-gray-500 font-medium text-lg leading-relaxed mb-8">
                                    {{ $item['desc'] }}
                                </p>
                                <div class="w-20 h-1 bg-[#4373F6] rounded-full"></div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-7 {{ $loop->even ? 'lg:order-1' : '' }}">
                        <div class="space-y-6">
                            @foreach ($item['details'] as $detail)
                                <div
                                    class="group bg-[#010521] p-10 rounded-[3rem] shadow-2xl shadow-[#010521]/10 transition-all duration-500 hover:-translate-y-1.25 relative overflow-hidden">
                                    <div
                                        class="absolute top-0 right-0 w-32 h-32 bg-[#4373F6] opacity-0 group-hover:opacity-10 blur-[50px] transition-opacity">
                                    </div>

                                    <div class="relative z-10">
                                        <div class="flex gap-4 mb-4">
                                            <i data-lucide="help-circle" class="w-5 h-5 text-[#4373F6] shrink-0"></i>
                                            <h4 class="text-[#4373F6] font-black uppercase tracking-widest text-[11px]">
                                                {{ $detail['question'] }}
                                            </h4>
                                        </div>
                                        <p class="text-gray-300 text-base leading-relaxed font-medium pl-9">
                                            {{ $detail['answer'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>
