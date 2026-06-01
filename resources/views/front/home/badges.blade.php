@php
    $badges = [
        ['image' => 'google-ads-certified.png', 'label' => 'Google Ads Certified', 'abbr' => 'G', 'color' => '#4285F4'],
        ['image' => 'meta-business.png', 'label' => 'Meta Business Partner', 'abbr' => 'M', 'color' => '#0866FF'],
        ['image' => 'clutch.png', 'label' => 'Top Agency on Clutch', 'abbr' => 'C', 'color' => '#EF4335'],
        ['image' => 'goodfirms.png', 'label' => 'Top Agency GoodFirms', 'abbr' => 'GF', 'color' => '#00A651'],
        ['image' => 'semrush.png', 'label' => 'SEMrush Certified', 'abbr' => 'S', 'color' => '#FF6422'],
        ['image' => 'hubspot.png', 'label' => 'HubSpot Partner', 'abbr' => 'H', 'color' => '#FF7A59'],
    ];
@endphp

@php
    function badgeImg(string $image, string $label, string $abbr, string $color, string $sizeClass): string
    {
        $imagePath = public_path('images/badges/' . $image);
        if (file_exists($imagePath)) {
            return '<img src="' .
                asset('images/badges/' . $image) .
                '" alt="' .
                e($label) .
                '" class="' .
                $sizeClass .
                ' object-contain grayscale group-hover:grayscale-0 transition duration-300">';
        }
        $size = str_contains($sizeClass, 'h-12') ? '68' : '40';
        return <<<SVG
        <svg width="{$size}" height="{$size}" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="grayscale group-hover:grayscale-0 transition duration-300">
            <path d="M24 4L6 11V24C6 33.4 14 41.7 24 44C34 41.7 42 33.4 42 24V11L24 4Z" fill="{$color}" opacity="0.15"/>
            <path d="M24 4L6 11V24C6 33.4 14 41.7 24 44C34 41.7 42 33.4 42 24V11L24 4Z" stroke="{$color}" stroke-width="2" fill="none"/>
            <text x="24" y="29" text-anchor="middle" font-size="13" font-weight="700" font-family="sans-serif" fill="{$color}">{$abbr}</text>
        </svg>
        SVG;
    }
@endphp

<section id="badges" class="w-full bg-white border-y border-gray-200 py-10 px-4 md:px-12">
    <div class="max-w-7xl mx-auto text-center ">

        <div class="text-center mb-12">
            <span
                class="inline-flex items-center rounded-full border border-gray-200 px-4 py-2 text-xs font-semibold tracking-[0.2em] uppercase text-gray-600">
                Trusted, Certified & Recognised
            </span>

            <h2 class="mt-6 text-3xl md:text-4xl font-bold text-gray-900">
                Industry Certifications & Partner Recognition
            </h2>
        </div>

        {{-- DESKTOP --}}
        <div class="hidden md:flex items-center justify-center flex-wrap gap-10">
            @foreach ($badges as $badge)
                <div class="flex flex-col items-center gap-2 group">
                    {!! badgeImg($badge['image'], $badge['label'], $badge['abbr'], $badge['color'], 'h-12') !!}
                    <span class="text-xs text-gray-400 font-medium group-hover:text-gray-600 transition">
                        {{ $badge['label'] }}
                    </span>
                </div>
            @endforeach
        </div>

        {{-- MOBILE marquee --}}
        <div class="md:hidden overflow-hidden relative">
            <div class="flex gap-10 animate-marquee w-max">
                @foreach (array_merge($badges, $badges) as $badge)
                    <div class="flex flex-col items-center gap-2 min-w-[80px] group">
                        {!! badgeImg($badge['image'], $badge['label'], $badge['abbr'], $badge['color'], 'h-10') !!}
                        <span class="text-xs text-gray-400 font-medium text-center">
                            {{ $badge['label'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
