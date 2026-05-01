<section class="w-full bg-[#FCFDFF] py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="text-center max-w-4xl mx-auto mb-8">
            <h2 class="text-[#010521] font-black mb-6 leading-tight" style="font-size: clamp(2.5rem, 5vw, 3.5rem);">
                {!! $data['heading'] ?? "Technologies <span class='text-[#4373F6]''>We Use</span>" !!}
            </h2>
            <p class="text-gray-500 leading-relaxed text-lg font-medium">
                {{ $data['subheading'] ?? 'We leverage a world-class suite of 50+ tools to ensure your growth is backed by the most powerful
                marketing and development technology available today.' }}

            </p>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-3 md:gap-4">

            @foreach ($data['items'] as $item)
                <div
                    class="group flex items-center gap-3 bg-white border border-gray-100 px-5 py-3 rounded-xl shadow-sm hover:shadow-[0_10px_25px_rgba(67,115,246,0.1)] hover:border-[#4373F6]/30 transition-all duration-300">

                    <!-- Devicon -->
                    <i
                        class="{{ $item['icon'] }} text-2xl text-gray-400 group-hover:text-[#4373F6] transition-colors"></i>

                    <!-- Title -->
                    <span class="font-bold text-[#010521] group-hover:text-[#4373F6] transition-colors text-sm">
                        {{ $item['title'] }}
                    </span>

                </div>
            @endforeach

        </div>
    </div>
</section>

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
@endpush
