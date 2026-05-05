<section class="w-full max-w-480 py-15">
    <div class="mx-auto px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-8">
            <h2 class="font-black text-(--color-secondary) leading-tight"
                style="font-size: clamp(1.875rem, 5vw, 3rem);">
                {{ $data['heading'] ?? '' }}
            </h2>
        </div>

        @php $items = $data['items'] ?? []; @endphp

        <div class="relative group">
            <div
                class="absolute inset-0 bg-(--color-primary) translate-x-3 translate-y-3 rounded-3xl -z-10 opacity-10 group-hover:translate-x-1 group-hover:translate-y-1 transition-transform duration-500">
            </div>

            <div
                class="bg-white border border-(--color-primary)/10 shadow-[0_20px_50px_rgba(67,115,246,0.08)] p-[clamp(2rem,6vw,4.5rem)] rounded-3xl">

                <div class="flex flex-wrap justify-center gap-y-16 md:gap-y-20 text-center">

                    @foreach ($items as $item)
                        <div class="flex flex-col items-center group/item basis-full sm:basis-1/2 lg:basis-1/3">

                            <span
                                class="font-black text-(--color-secondary) text-[clamp(2.5rem,5vw,4rem)] leading-none group-hover/item:text-(--color-primary) transition-colors duration-300">
                                {{ $item['value'] ?? '' }}
                            </span>

                            <div
                                class="h-1 w-12 bg-(--color-primary) my-4 rounded-full opacity-20 group-hover/item:w-20 group-hover/item:opacity-100 transition-all duration-300">
                            </div>

                            <p
                                class="text-gray-500 font-semibold max-w-55 text-sm md:text-base leading-snug uppercase tracking-tight">
                                {{ $item['label'] ?? '' }}
                            </p>

                        </div>
                    @endforeach

                </div>

            </div>
        </div>

    </div>
</section>