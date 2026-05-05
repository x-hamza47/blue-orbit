<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-8">
            <h2 class="font-black text-(--color-secondary) leading-tight mb-6 text-[clamp(1.875rem,5vw,3rem)]">
                Industries <span class="text-(--color-primary)">We Support</span>
            </h2>

            <p class="text-gray-500 max-w-4xl text-base sm:text-lg leading-relaxed font-medium">
                {{ $section['data']['subheading'] ?? 'Blue Orbit assists businesses across different industries expand & grow through our digital marketing strategies designed for competitive markets and challenges.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:gap-6 gap-4">

            @foreach($section['data']['items'] ?? [] as $item)
                <div
                    class="flex items-start sm:gap-5 gap-4 border border-gray-100 bg-[#F8FAFF] rounded-3xl sm:p-8 p-6 hover:border-(--color-primary)/30 hover:bg-white hover:shadow-[0_20px_40px_rgba(67,115,246,0.08)] transition-all duration-500 group">

                    <div
                        class="sm:w-14 sm:h-14 w-12 h-12 shrink-0 bg-white sm:rounded-2xl rounded-xl flex items-center justify-center shadow-sm group-hover:bg-(--color-primary) transition-colors duration-500">

                        <i data-lucide="{{ $item['icon'] }}"
                            class="sm:w-7 sm:h-7 w-6 h-6 text-(--color-primary) group-hover:text-white transition-colors"></i>

                    </div>

                    <div>
                        <h3 class="font-black text-(--color-secondary) uppercase tracking-tight text-base sm:text-lg mb-1">
                            {{ $item['title'] }}
                        </h3>

                        <p class="text-gray-500 text-sm sm:text-base leading-snug font-medium">
                            {{ $item['desc'] }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</section>