<section class="w-full bg-white font-sans py-10 pt-16">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="flex flex-col space-y-8">
                <div>
                    <h1
                        class="text-(--color-secondary) [&>span]:text-[clamp(2.5rem,6vw,4.5rem)] [&>span]:uppercase [&>span]:italic [&>span]:leading-none font-black uppercase tracking-wider text-lg md:text-xl mb-2 ">
                        {{ $data['subheading'] ?? 'Digital Marketing services built to drive' }}
                        <span class="text-(--color-primary)"> {{ $data['heading'] ?? 'Grow' }}</span>
                        <br />
                        {{-- <span class="text-(--color-secondary)">and </span>
                        <span class="text-(--color-primary)">Results</span>  --}}
                    </h1>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 max-w-xl w-full">

                    <input type="text" placeholder="{{ $data['input_placeholder'] ?? 'Enter Website Address' }}"
                        class="flex-1 border border-neutral-200 rounded-md min-w-56 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-(--color-primary)/50 shadow-sm w-full" />

                    <a href="{{ $data['button_link'] ?? '#' }}"
                        class="bg-(--color-primary) hover:bg-(--color-secondary) text-white font-semibold px-6 py-3 rounded-md transition-colors uppercase tracking-tight whitespace-nowrap w-full sm:w-auto">
                        {{ $data['button_text'] ?? 'Get My Free Proposal' }}
                </a>

                </div>

                <div
                    class="flex flex-wrap items-center sm:justify-start justify-center gap-6 pt-4 opacity-70 [&>img]:cursor-pointer [&>img]:grayscale [&>img]:hover:grayscale-0 transition-all duration-500">
                    <img src="https://cdn.brandfetch.io/inc.com" alt="Inc 5000" class="w-6" />
                    <img src="https://cdn.brandfetch.io/google.com" alt="Google Partner" class="w-6" />
                    <img src="https://cdn.brandfetch.io/meta.com" alt="Meta Business Partner" class="w-6" />
                    <img src="https://cdn.brandfetch.io/shopify.com" alt="Shopify Partner" class="w-6" />
                </div>
            </div>

            <div class="relative flex justify-center lg:justify-end">
                <div
                    class="relative w-full max-w-md aspect-square bg-linear-to-tr from-(--color-secondary) to-(--color-primary) rounded-tl-[100px] rounded-br-[100px] rounded-tr-[50%] overflow-hidden">
                    <img src="{{ $data['image'] ?? 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=800' }}"
                        alt="Olivia"
                        class="absolute inset-0 w-full h-full object-cover mix-blend-luminosity hover:mix-blend-normal transition-all duration-500" />
                </div>

                <div
                    class="absolute  left-2 md:-left-4 top-3/5 sm:top-1/4 bg-white p-4 md:p-6 rounded-2xl shadow-xl max-w-70 border border-neutral-100">
                    <div class="text-(--color-primary) mb-2">
                        <svg class="w-6 h-6 md:w-8 md:h-8 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.154c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                    </div>
                    <p class="text-(--color-secondary) text-sm leading-relaxed font-medium">
                        "{{ $data['review_text'] ?? 'Business trust our digital marketing services for clear guidance, strategy consultancy, measurable results & persistent growth' }}"
                    </p>
                    <p class="sm:mt-4 mt-3 text-(--color-primary) font-bold text-sm">— {{ $data['reviewer_name'] ?? 'Anonymous' }}</p>
                </div>
            </div>

        </div>
    </div>
</section>
