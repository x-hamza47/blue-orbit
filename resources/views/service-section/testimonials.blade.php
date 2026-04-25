<section class="w-full bg-[#FCFDFF] py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="text-center mb-8">
            <h2 class="font-black text-[#010521] leading-tight" style="font-size: clamp(2.5rem, 6vw, 3.5rem);">
                {{ $data['heading'] }}
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            @foreach ($data['items'] as $item)
                <div
                    class="bg-white p-8 rounded-4xl border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-xl transition-all duration-500">
                    <div>
                        <div class="flex gap-1 mb-6 text-[#4373F6]">
                            @for ($i = 0; $i < $item['stars']; $i++)
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                            @endfor
                        </div>
                        <p class="text-gray-600 italic leading-relaxed mb-8">
                            {{ $item['testimonial'] }}
                        </p>
                    </div>

                    <div class="border-t border-gray-50 pt-6">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden">
                                <img src=" {{ $item['avatar'] }}" alt="{{ $item['customer'] }}" />
                            </div>
                            <div>
                                <h4 class="font-black text-[#010521] text-lg leading-tight">{{ $item['customer'] }}</h4>
                                <p class="text-xs text-gray-400 font-semibold">{{ $item['designation'] }}
                                </p>
                                <p class="text-xs text-gray-400 font-semibold">{{ $item['firm'] }},
                                    {{ $item['location'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>

    </div>
</section>
