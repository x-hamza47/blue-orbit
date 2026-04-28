    <section id="home" class="w-full max-w-480 relative overflow-hidden flex items-center bg-cover bg-center md:px-12 sm:px-6 px-4 h-dvh sm:h-auto"
        style="background-image: url('{{ asset('images/background.png') }}');">
        <div class="max-w-480 mx-auto w-full relative z-10 flex flex-col md:flex-row items-center gap-12 mt-10">
            <div
                class="max-[840px]:w-full w-3/4 text-white pb-20 flex flex-col items-start gap-[clamp(.5rem,2vw,.8rem)] pt-6">
                <span class="relative">
                    
                    <h1 class="montserrat font-extrabold leading-[1.1] tracking-tight uppercase lg:text-7xl md:text-5xl sm:text-4xl text-3xl relative">
                        <span class="flex flex-wrap items-end montserrat gap-x-2">
                            driving <span class="growth text-5xl capitalize text-[#00d9ff] sm:hidden">
                                Growth </span>

                            <img class="-mb-10 sm:block hidden" src="{{ asset('images/caligraphy.webp') }}" >
                        </span>
                        through digital innovation
                    </h1>

                </span>
                <p class="text-gray-300 max-w-xl leading-relaxed text-base">
                    We are a Results Diven Marketing Agency offering comprehensive Digital Marketing and Technology
                    Solutions for all your Business Needs.
                    
                </p>
                <div class="flex flex-wrap items-center gap-8 mt-4">
                    <a href="#contact"
                        class="bg-[#00d9ff] uppercase text-[#010521] rounded-sm font-bold hover:bg-white hover:text-[#010521] py-[clamp(0.75rem,1.2vw,1rem)] px-[clamp(1.5rem,2.5vw,2.5rem)] text-[clamp(0.975rem,1vw,1rem)] transition-all transform hover:scale-105 flex items-center gap-3">
                        connect now
                    </a>

                </div>
            </div>
            <div class="w-full h-[90%] max-[840px]:hidden flex justify-end items-end absolute right-0 bottom-0 md:w-1/2">
                <img src="{{ asset('images/person.png') }}" alt="AI Digital Illustration"
                    class="w-full rounded-lg max-w-150 object-contain drop-shadow-[0_0_30px_rgba(67,115,246,0.3)]">
            </div>
        </div>
    </section>