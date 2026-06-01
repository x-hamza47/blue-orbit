<section class="w-full bg-[#FCFDFF] py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">
        <div class="text-center max-w-4xl mx-auto mb-5">
            <h2 class="text-(--color-secondary) font-black mb-6 leading-tight text-center text-[clamp(1.875rem,5vw,3rem)]">
                {{ $data['heading'] ?? 'Our Digital' }}
                <span class="text-(--color-primary)">
                    {{ $data['heading_highlight'] ?? 'Marketing Services' }}
                </span>
            </h2>
            @if (!empty($data['subheading']))
                <p class="text-gray-500 leading-relaxed text-base sm:text-lg font-medium text-center">
                    {{ $data['subheading'] }}
                </p>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            @foreach ($data['items'] ?? [] as $item)
                <div class="bg-white sm:p-6 p-5 md:p-8 lg:p-10 rounded-[2.5rem] border border-gray-100
                    shadow-[0_10px_30px_rgba(1,5,33,0.03)] hover:shadow-[0_20px_50px_rgba(67,115,246,0.1)]
                    hover:-translate-y-2 transition-all duration-500 group">

                    <div class="mb-6 md:mb-8 sm:w-16 sm:h-16 w-14 h-14 bg-[#F4F7FF] rounded-2xl
                        flex items-center justify-center group-hover:bg-(--color-primary) transition-colors duration-500">
                        <i data-lucide="{{ $item['icon'] ?? 'zap' }}"
                            class="sm:w-8 sm:h-8 w-7 h-7 text-(--color-primary) group-hover:text-white transition-colors duration-500"></i>
                    </div>

                    <h3 class="text-(--color-secondary) font-black text-lg sm:text-xl sm:mb-3 mb-2.5
                        group-hover:text-(--color-primary) transition-colors">
                        {{ $item['title'] ?? '' }}
                    </h3>

                    <p class="text-gray-500 leading-relaxed text-sm font-medium">
                        {{ $item['desc'] ?? '' }}
                    </p>

                </div>
            @endforeach

        </div>
    </div>
</section>