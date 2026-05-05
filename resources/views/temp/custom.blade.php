@php
$data = $section['data'] ?? [];
@endphp

<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <!-- HEADING -->
        <h2 class="font-black text-[#010521] leading-[1.1] mb-10"
            style="font-size: clamp(2rem, 5vw, 3rem);">

            {!! $data['heading'] ??
            'We believe that <span class="text-[#4373F6]">Digital Marketing</span> is no longer about who shouts the loudest, but who understands the data best.' !!}

        </h2>

        <!-- PARAGRAPHS -->
        <div class="space-y-8">

            @foreach($data['paragraphs'] ?? [] as $para)
                <p class="text-gray-500 text-[clamp(1.1rem,2vw,1.35rem)] leading-relaxed font-medium">
                    {{ $para['text'] }}
                </p>
            @endforeach

        </div>

    </div>
</section>