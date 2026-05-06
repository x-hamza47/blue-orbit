<section class="w-full bg-[#FCFDFF] py-10" id="client_testimonials">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="text-center mb-12">
            <h2 class="font-black text-(--color-secondary) leading-tight text-[clamp(1.875rem,5vw,3rem)]">
                {{ $data['heading'] ?? '' }}
                <span class="text-(--color-primary)">
                    {{ $data['highlight'] ?? '' }}
                </span>
            </h2>
        </div>

        {{-- <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12"> --}}
        <div class="mb-12">

            <div class="swiper clientTestimonialSwiper pb-16">
                <div class="swiper-wrapper justify-center! pb-24!">

                    @foreach ($data['items'] ?? [] as $item)
                        <div class="swiper-slide">

                            <div
                                class="bg-white md:p-8 p-6 rounded-3xl border border-gray-100 shadow-sm flex flex-col justify-between h-full">

                                <!-- Stars -->
                                <div class="flex gap-1 mb-6 text-(--color-primary)">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i data-lucide="star"
                                            class="w-4 h-4 {{ $i <= ($item['rating'] ?? 5) ? 'fill-current' : '' }}"></i>
                                    @endfor
                                </div>

                                <!-- Text -->
                                <p class="text-gray-600 italic mb-6">
                                    {{ $item['text'] }}
                                </p>

                                <!-- Footer -->
                                <div class="border-t border-gray-50 pt-4 flex items-center gap-4">

                                    <div class="w-10 h-10 bg-gray-200 rounded-full overflow-hidden">
                                        @if (!empty($item['image']))
                                            <img src="{{ $item['image'] }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>

                                    <div>
                                        <h4 class="font-black text-(--color-secondary)">
                                            {{ $item['name'] }}
                                        </h4>

                                        <p class="text-xs text-gray-400 uppercase font-bold">
                                            {{ $item['role'] }}
                                            @if (!empty($item['company']))
                                                , {{ $item['company'] }}
                                            @endif
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

                <div class="swiper-pagination"></div>
            </div>




        </div>

    </div>
</section>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initSwiper({
                selector: ".clientTestimonialSwiper",
                lg: 3,
            });
        });
    </script>
@endpush

@push('styles')
    @vite('resources/css/testimonialSwiper.css')
@endpush
