<section id="home"
    class="w-full relative overflow-hidden flex items-center bg-cover bg-center md:px-12 sm:px-6 px-4 min-h-[90vh]"
    >
   {{-- Replace overlay with solid + canvas for particles --}}
<div class="absolute inset-0 bg-(--color-primary) z-0"></div>
<canvas id="particles" class="absolute inset-0 z-1 opacity-50 w-full h-full"></canvas>

    <div class="max-w-7xl mx-auto w-full relative z-10 flex flex-col md:flex-row items-center gap-8 pb-12 pt-6 md:pt-4">

        <div class="max-[840px]:w-full w-1/2 text-white flex flex-col items-start gap-5">

            {{-- <h1
                class="montserrat font-extrabold leading-[1.1] tracking-tight uppercase lg:text-5xl md:text-4xl sm:text-3xl text-2xl">
                UAE's #1 Performance-Driven<br>
                <span class="text-(--color-gold)">Digital Marketing Agency</span>
            </h1> --}}
  {{-- <h1 class="montserrat font-extrabold leading-[1.1] tracking-tight uppercase lg:text-5xl md:text-4xl sm:text-3xl text-2xl">
    UAE's #1
    <span class="script-text script-performance text-cyan-400 lg:text-7xl md:text-6xl sm:text-5xl text-4xl">Performance</span>-<span class="script-text script-driven text-(--color-gold) lg:text-7xl md:text-6xl sm:text-5xl text-4xl">Driven</span><br>
    <span class="text-(--color-gold)">Digital Marketing Agency</span>
</h1> --}}
<h1 class="montserrat font-extrabold leading-[1.1] tracking-tight uppercase lg:text-5xl md:text-4xl sm:text-3xl text-2xl">
    UAE's #1
    <span class="script-text text-(--color-secondary) lg:text-7xl md:text-6xl sm:text-5xl text-4xl">Performance</span>Driven<br>
    <span class="text-(--color-gold)">Digital Marketing Agency</span>
</h1>

            <h2
                class="text-gray-300 max-w-xl leading-relaxed text-base md:text-lg font-normal normal-case tracking-normal">
                Helping businesses in Dubai, Sharjah &amp; across the UAE dominate Google,
                grow on social media, and convert visitors into paying customers.
            </h2>

            <div class="flex flex-wrap items-center gap-x-6 gap-y-3 mt-1">

                <div class="flex items-center gap-2 text-sm font-semibold">
                    <span class="text-[#0A1628]">
                        <i data-lucide="badge-check" class="w-5 h-5"></i>
                    </span>
                    <span class="text-gray-200">Google Certified Agency</span>
                </div>

                <div class="flex items-center gap-2 text-sm font-semibold">
                    <span class="text-[#0A1628] font-bold text-base">2,000+</span>
                    <span class="text-gray-200">Clients Served</span>
                </div>

                <div class="flex items-center gap-2 text-sm font-semibold">
                    <span class="text-yellow-400">★★★★★</span>
                    <span class="text-gray-200">5.0 Google Rating</span>
                </div>

                <div class="flex items-center gap-2 text-sm font-semibold">
                    <span class="text-[#0A1628] font-bold text-base">150+</span>
                    <span class="text-gray-200">Team Members</span>
                </div>

            </div>

            <div class="flex flex-wrap items-center gap-4 mt-3">

                {{-- Primary CTA: Gold, opens audit form/Calendly --}}
                <a href="#contact"
                    class="flex items-center gap-3 bg-(--color-gold) text-white font-bold rounded-full
                           py-3 px-7 hover:brightness-110 hover:scale-105 transition-all transform text-sm md:text-base">
                    <i data-lucide="search" class="w-5 h-5"></i>
                    Get Your FREE Website Audit
                </a>

                {{-- Secondary CTA: WhatsApp green --}}
                <a href="https://wa.me/971567716432" target="_blank" rel="noopener noreferrer"
                    class="flex items-center gap-3 bg-[#25D366] text-white font-bold rounded-full
                           py-3 px-7 hover:brightness-110 hover:scale-105 transition-all transform text-sm md:text-base">
                    {{-- WhatsApp SVG --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    WhatsApp Us Now
                </a>

            </div>
        </div>

        {{-- ── RIGHT COLUMN: Image ── --}}
        <div class="w-full h-full max-[840px]:hidden flex justify-end items-end md:w-1/2">
            <img src="{{ asset('images/person.png') }}" alt="UAE Digital Marketing Agency"
                class="w-full rounded-lg max-w-150 object-contain drop-shadow-[0_0_30px_rgba(67,115,246,0.3)]">
        </div>

    </div>
</section>

