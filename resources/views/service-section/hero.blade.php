<section class="w-full bg-white font-sans py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="flex flex-col space-y-8">
                <div>
                    <h2 class="text-[#010521] font-extrabold uppercase tracking-wider text-xl mb-2">
                        {{ $data['subheading'] }}
                    </h2>
                    <h1 class="text-[clamp(2.5rem,6vw,4.5rem)] font-black leading-none uppercase italic">
                        {{-- <span class="text-[#4373F6]">Relationships</span>
                        <br />
                        <span class="text-[#010521]">&</span>
                        <span class="text-[#4373F6]">Results</span> --}}
                        <span class="text-[#4373F6]">{{ $data['heading'] }}</span>

                    </h1>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 max-w-xl">
                    <input type="text" placeholder="Enter Website Address"
                        class="flex-1 border border-neutral-200 rounded-md px-6 py-4 focus:outline-none focus:ring-2 focus:ring-[#4373F6]/50 shadow-sm" />
                    <button
                        class="bg-[#4373F6] hover:bg-[#010521] text-white font-bold px-8 py-4 rounded-md transition-colors uppercase tracking-tight whitespace-nowrap">
                        Get My Free Proposal
                    </button>
                </div>

                <div
                    class="flex flex-wrap items-center gap-6 pt-4 opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                    <img src="https://cdn.brandfetch.io/inc.com" alt="Inc 5000" class="h-8" />
                    <img src="https://cdn.brandfetch.io/google.com" alt="Google Partner" class="h-6" />
                    <img src="https://cdn.brandfetch.io/meta.com" alt="Meta Business Partner" class="h-5" />
                    <img src="https://cdn.brandfetch.io/shopify.com" alt="Shopify Partner" class="h-6" />
                </div>
            </div>

            <div class="relative flex justify-center lg:justify-end">
                <div
                    class="relative w-full max-w-md aspect-square bg-linear-to-tr from-[#010521] to-[#4373F6] rounded-tl-[100px] rounded-br-[100px] rounded-tr-[50%] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=800"
                        alt="Olivia"
                        class="absolute inset-0 w-full h-full object-cover mix-blend-luminosity hover:mix-blend-normal transition-all duration-500" />
                </div>

                <div
                    class="absolute -left-4 top-1/4 bg-white p-6 rounded-2xl shadow-xl max-w-70 border border-neutral-100">
                    <div class="text-[#4373F6] mb-2">
                        <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.154c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                    </div>
                    <p class="text-[#010521] text-sm leading-relaxed font-medium">
                        "{{ $data['review'] }}"
                    </p>
                    <p class="mt-4 text-[#4373F6] font-bold text-sm">— {{ $data['reviewer'] }}</p>
                </div>
            </div>

        </div>
    </div>
</section>
