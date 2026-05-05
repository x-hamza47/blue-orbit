<section class="w-full bg-white text-[#010521]">
    <div class="max-w-480 mx-auto w-full px-[clamp(1.5rem,5vw,5rem)] py-10">

        {{-- HEADER --}}
        <div class="text-center mb-12">
            <h2 class="font-extrabold leading-tight text-[clamp(2.5rem,6vw,4.5rem)]">
                Process <span class="text-[#4373F6]">How We Work</span>
            </h2>

            <p class="text-gray-700">
                {{ $data['subheading'] ?? '' }}
            </p>

            <div class="w-24 h-1 bg-[#4373F6] mx-auto mt-4 rounded-full"></div>
        </div>

        @php $items = $data['items'] ?? []; @endphp

        {{-- <div class="relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8"> --}}
        <div class="relative flex flex-wrap justify-center gap-8">

            @if (count($items) === 4)
                <div class="hidden lg:block absolute top-10 left-[8%] right-[8%] h-0.5 bg-[#4373F6] z-0"></div>
            @endif

            @foreach ($items as $item)
                @php
                    $number = $item['number'] ?? str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
                @endphp

                <div class="relative z-10 flex flex-col items-center text-center group">

                    <div
                        class="relative w-20 h-20 rounded-full bg-[#4373F6] text-white flex items-center justify-center">

                        <i data-lucide="{{ $item['icon'] ?? 'circle' }}" class="w-8 h-8"></i>

                        <span
                            class="absolute bg-[#010521] border-2 border-white w-10 h-10 flex items-center justify-center rounded-full right-0 translate-x-1/2">
                            {{ $number }}
                        </span>

                    </div>

                    <h3 class="font-bold text-lg mb-2">{{ $item['title'] ?? '' }}</h3>
                    <p class="text-gray-800">{{ $item['desc'] ?? '' }}</p>

                </div>
            @endforeach

        </div>

    </div>
</section>
