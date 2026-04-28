@extends('home-layout.layout')
@section('content')
    {{-- ! Hero Section --}}
{{-- <section id="home"
    class="relative w-full max-w-7xl  bg-cover bg-center pt-20 md:pt-32 px-3 sm:px-6 md:px-12 min-h-screen"
    style="background-image: url('{{ asset('images/background.png') }}');">

    <div class="text-white">

        <!-- Text + Image Container -->
        <div class="shape-container">

            <h1 class="montserrat font-extrabold uppercase leading-[1.1] 
                       text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl">
                driving 
                <span class="text-[#00d9ff]">Growth</span> 
                through digital innovation
            </h1>

            <img src="{{ asset('images/person.png') }}"
                 class="shape-img"
                 alt="Digital Illustration">

            <p class="text-gray-300 leading-relaxed text-base mt-6 max-w-2xl">
                We are a Results Driven Marketing Agency offering comprehensive Digital Marketing and Technology
                Solutions for all your Business Needs.
            </p>

            <a href="#contact"
                class="mt-8 inline-block bg-[#00d9ff] uppercase text-[#010521] rounded-sm font-bold 
                       hover:bg-white hover:text-[#010521] py-4 px-10 text-lg transition-all">
                connect now
            </a>

        </div>
    </div>
</section> --}}
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
    {{-- ! About Section --}}
    <section id="about" class="w-full bg-white relative overflow-hidden flex items-center py-5 md:py-10 lg:py-15">
        <div class="max-w-480 mx-auto w-full relative z-10 flex flex-col md:flex-row items-center gap-12 md:px-12 sm:px-6 px-4 ">
            <div class="w-full md:w-[50%] flex justify-center md:justify-end mt-12 md:mt-0 relative">

                <img src="{{ asset('images/collage.png') }}" alt="Laptop with analytics dashboards"
                    class="w-full max-w-187.5 h-auto object-contain relative z-10">
            </div>
            <div class="w-full md:w-[50%] flex flex-col items-start gap-[clamp(1rem,3vw,0.2rem)]">
                <p class="text-(--color-secondary) font-bold tracking-wide sm:text-2xl text-xl"> About Us</p>

                <h2 class="font-extrabold leading-[1.1] tracking-tight text-(--color-secondary) text-3xl md:text-4xl lg:text-5xl">
                    Your Partner In <span class="text-(--color-primary)">Digital Success</span>
                </h2>
                <p class="text-gray-700 text-sm sm:text-base">Blue Orbit Digital helps businesses curate creative ideas into impactful
                    digital experiences. Incorporating strategic thinking, data-driven marketing, it forms digital
                    solutions that drive scalable growth.</p>

                <div class="flex justify-center lg:justify-between flex-wrap w-full gap-x-10 gap-y-3">
                    <div class="py-1 text-center">
                        <p class="font-extrabold text-(--color-primary) text-[clamp(1.8rem,5vw,2.75rem)]">150+
                        </p>
                        <p class="text-sm font-medium text-gray-500">Team Members</p>
                    </div>

                    <div class="py-1 text-center">
                        <p class="font-extrabold text-(--color-primary) text-[clamp(1.8rem,5vw,2.75rem)]">2000+
                        </p>
                        <p class="text-sm font-medium text-gray-500">Happy Clients</p>
                    </div>

                    <div class="py-1 text-center">
                        <p class="font-extrabold text-(--color-primary) text-[clamp(1.8rem,5vw,2.75rem)]">99%</p>
                        <p class="text-sm font-medium text-gray-500">Client Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ! Service Section --}}
    <section id="services" class="w-full bg-[#F3F6FF] py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-4">
        <div class="mx-auto w-full max-w-480">

            <div class="flex flex-col md:flex-row justify-between sm:mb-16 mb-13 gap-8">
                <div class="relative">
                    <span
                        class="absolute -top-12 left-0 text-lg font-black text-gray-100/50 uppercase select-none -z-10">
                        Services
                    </span>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-(--color-secondary) font-bold tracking-wide sm:text-2xl text-xl">Our Services</span>
                    </div>
                    <h2 class="font-extrabold leading-[1.1] text-(--color-secondary) text-3xl md:text-4xl lg:text-5xl">
                        Services We Provide to <br>
                        <span class="text-(--color-primary)">Elevate Your Business</span>
                    </h2>
                </div>
            </div>

            {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> --}}
            <div class="card-wrapper flex flex-wrap justify-center my-4 lg:gap-x-20 md:gap-x-10 gap-x-5 gap-y-10  mobile-cards relative">

                @foreach ($services as $service)
                    <div
                        class="bg-white px-5 md:px-7 lg:px-10 py-5 md:py-7 lg:py-10 rounded-[40px] shadow-sm border-b-4 border-transparent hover:border-(--color-primary) hover:shadow-xl transition-all duration-500 group card relative flex flex-col sm:w-[48%] md:w-full">

                        <div
                            class="sm:w-20 sm:h-20 w-15 h-15 bg-(--color-primary) rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-500/30">
                            <i data-lucide="{{ $service->icon }}" class="sm:w-10 sm:h-10 w-7 h-7 text-white"></i>
                        </div>

                        <h3 class="sm:text-2xl text-xl font-extrabold text-(--color-secondary) mb-4">
                            {{ $service->title }}
                        </h3>

                        <p class="text-gray-400 text-sm sm:text-base leading-relaxed mb-8">
                            {{ $service->desc }}
                        </p>

                        <a href="{{ route('service', $service->slug) }}"
                            class="inline-flex items-center gap-2 text-(--color-secondary) font-bold group-hover:text-(--color-primary) transition-all mt-auto">
                            Learn more
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- ! Workflow Section --}}
    <section id="process" class="w-full bg-white text-(--color-secondary) py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-4">
        <div class="max-w-480 mx-auto w-full ">

            <div class="text-center md:mb-24 sm:mb-20 mb-16">
                <h2 class="font-extrabold leading-tight text-3xl md:text-4xl lg:text-5xl">
                    Our Proven <span class="text-(--color-primary)">Work Process</span>
                </h2>
                <div class="w-24 h-1 bg-(--color-primary) mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="relative grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-8">

                <div class="hidden lg:block absolute top-10 left-[8%] right-[8%] h-0.5 bg-(--color-primary) z-0"></div>

                <div class="relative z-10 flex flex-col items-center text-center group">
                    <div
                        class="relative sm:w-20 sm:h-20 w-17 h-17 rounded-full outline-8 outline-white border-2 border-gray-200 flex items-center justify-center sm:mb-6 mb-4 font-bold text-xl group-hover:border-(--color-primary) bg-(--color-primary) text-white transition-all">
                        <i data-lucide="Search" class="sm:w-10 sm:h-10 w-7 h-7 text-white"></i>

                        <span
                            class="absolute bg-(--color-secondary) sm:border-3 border text-sm sm:text-base md:text-xl border-white sm:w-10 sm:h-10 w-8 h-8 flex items-center justify-center rounded-full right-0 translate-x-1/2">
                            01</span>
                    </div>
                    <h3 class="font-bold text-lg sm:mb-2 mb-1">Discovery</h3>
                    <p class="text-gray-800">We examine your business model, target audience, and what you aim for.
                    </p>
                </div>

                <div class="relative z-10 flex flex-col items-center text-center group">
                    <div
                        class="relative sm:w-20 sm:h-20 w-17 h-17 rounded-full outline-8 outline-white border-2 border-gray-200 flex items-center justify-center sm:mb-6 mb-4 font-bold text-xl group-hover:border-(--color-primary) bg-(--color-primary) text-white transition-all">
                        <i data-lucide="Lightbulb" class="sm:w-10 sm:h-10 w-7 h-7 text-white"></i>

                        <span
                            class="absolute bg-(--color-secondary) sm:border-3 border text-sm sm:text-base md:text-xl border-white sm:w-10 sm:h-10 w-8 h-8 flex items-center justify-center rounded-full right-0 translate-x-1/2">
                            02</span>
                    </div>
                    <h3 class="font-bold text-lg sm:mb-2 mb-1">Strategy</h3>
                    <p class="text-gray-800">We curate a solution driven growth plan aligned with measurable KPIs.</p>

                </div>

                <div class="relative z-10 flex flex-col items-center text-center group">
                    <div
                        class="relative sm:w-20 sm:h-20 w-17 h-17 rounded-full outline-8 outline-white border-2 border-gray-200 flex items-center justify-center sm:mb-6 mb-4 font-bold text-xl group-hover:border-(--color-primary) bg-(--color-primary) text-white transition-all">
                        <i data-lucide="Rocket" class="sm:w-10 sm:h-10 w-7 h-7 text-white"></i>

                        <span
                            class="absolute bg-(--color-secondary) sm:border-3 border text-sm sm:text-base md:text-xl border-white sm:w-10 sm:h-10 w-8 h-8 flex items-center justify-center rounded-full right-0 translate-x-1/2">
                            03</span>
                    </div>
                    <h3 class="font-bold text-lg sm:mb-2 mb-1">Execution</h3>
                    <p class="text-gray-800">We Execute the campaigns, develop platforms, and launch digital assets.</p>
                </div>

                <div class="relative z-10 flex flex-col items-center text-center group">
                    <div
                        class="relative sm:w-20 sm:h-20 w-17 h-17 rounded-full outline-8 outline-white border-2 border-gray-200 flex items-center justify-center sm:mb-6 mb-4 font-bold text-xl group-hover:border-(--color-primary) bg-(--color-primary) text-white transition-all">
                        <i data-lucide="Cog" class="sm:w-10 sm:h-10 w-7 h-7 text-white"></i>

                        <span
                            class="absolute bg-(--color-secondary) sm:border-3 border text-sm sm:text-base md:text-xl border-white sm:w-10 sm:h-10 w-8 h-8 flex items-center justify-center rounded-full right-0 translate-x-1/2">
                            04</span>
                    </div>
                    <h3 class="font-bold text-lg sm:mb-2 mb-1">Optimization</h3>
                    <p class="text-gray-800">We analyze and monitor performance data and focus on improvement.
                    </p>
                </div>

                <div class="relative z-10 flex flex-col items-center text-center group">
                    <div
                        class="relative sm:w-20 sm:h-20 w-17 h-17 rounded-full outline-8 outline-white border-2 border-gray-200 flex items-center justify-center sm:mb-6 mb-4 font-bold text-xl group-hover:border-(--color-primary) bg-(--color-primary) text-white transition-all">
                        <i data-lucide="FileChartColumn" class="sm:w-10 sm:h-10 w-7 h-7 text-white"></i>

                        <span
                            class="absolute bg-(--color-secondary) sm:border-3 border text-sm sm:text-base md:text-xl border-white sm:w-10 sm:h-10 w-8 h-8 flex items-center justify-center rounded-full right-0 translate-x-1/2">
                            05</span>
                    </div>
                    <h3 class="font-bold text-lg sm:mb-2 mb-1">Reporting</h3>
                    <p class="text-gray-800">Clear, structured monthly reporting.</p>
                </div>

                <div class="relative z-10 flex flex-col items-center text-center group">
                    <div
                        class="relative sm:w-20 sm:h-20 w-17 h-17 rounded-full outline-8 outline-white border-2 border-gray-200 flex items-center justify-center sm:mb-6 mb-4 font-bold text-xl group-hover:border-(--color-primary) bg-(--color-primary) text-white transition-all">
                        <i data-lucide="Sprout" class="sm:w-10 sm:h-10 w-7 h-7 text-white"></i>

                        <span
                            class="absolute bg-(--color-secondary) sm:border-3 border text-sm sm:text-base md:text-xl border-white sm:w-10 sm:h-10 w-8 h-8 flex items-center justify-center rounded-full right-0 translate-x-1/2">
                            06</span>
                    </div>
                    <h3 class="font-bold text-lg sm:mb-2 mb-1">Scaling</h3>
                    <p class="text-gray-800">We expand high-performing campaigns to maximize growth.</p>
                </div>

            </div>
        </div>
    </section>
    {{-- ! Why Us Section --}}
    <section id="why-us" class="w-full bg-(--color-secondary) text-white py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-4">
        <div class="w-full max-w-480 ">
            <div class="flex flex-col md:flex-row md:items-end justify-between md:mb-24 sm:mb-20 mb-16 gap-8">
                <div class="relative">
                    <div class="relative z-10 flex items-center gap-2 sm:mb-4 mb-2">
                        <span class="text-white font-bold tracking-wide sm:text-2xl text-xl">Why Choose Us</span>
                    </div>
                    <h2 class="relative z-10 font-extrabold leading-[1.1] text-3xl md:text-4xl lg:text-5xl">
                        Why Trust Us for <br>
                        Your <span class="text-(--color-primary)">Marketing Needs?</span>
                    </h2>
                </div>

                <a href="#contact"
                    class="bg-(--color-primary) w-max text-white sm:px-7 sm:py-3.5 px-6 py-3 md:px-10 md:py-4 rounded-full font-bold hover:bg-white hover:text-(--color-secondary) transition-all duration-300 shadow-lg shadow-blue-500/20 text-base">
                    Get A Quote
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-16 gap-y-13 items-center">

                <div class="relative group">
                    <div class="rounded-[40px] overflow-hidden shadow-2xl">
                        <img src="https://blog.iil.com/wp-content/uploads/2022/09/fv7p606ao1s0-GettyImages-1256522124.jpg"
                            alt="Team Working" class="w-full h-full object-cover aspect-4/3">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button
                            class="w-24 h-24 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30 hover:scale-110 transition-transform group-cursor-pointer">
                            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-xl">
                                <div
                                    class="w-0 h-0 border-t-10 border-t-transparent border-l-18 border-l-(--color-primary) border-b-10 border-b-transparent ml-1">
                                </div>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-12 gap-x-8">

                    <div class="space-y-4">
                        <div class="sm:w-12 sm:h-12 w-10 h-10 text-white">
                            <i data-lucide="ChartNoAxesCombined" class="w-full h-full"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold">Structured and measurable marketing </h3>
                        <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                            Our marketing strategies follow clear frameworks and KPIs
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="sm:w-12 sm:h-12 w-10 h-10 text-white">
                            <i data-lucide="Cpu" class="w-full h-full"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold">Technology-driven execution</h3>
                        <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                            We capitalize on modern tools, analytics platforms, and digital technologies
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="sm:w-12 sm:h-12 w-10 h-10 text-white">
                            <i data-lucide="Target" class="w-full h-full"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold">Performance-focused campaigns</h3>
                        <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                            Every campaign is result oriented driving sustainable growth.
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="sm:w-12 sm:h-12 w-10 h-10 text-white">
                            <i data-lucide="FileChartPie" class="w-full h-full"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold">Transparent communication and reporting</h3>
                        <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                            We believe in complete transparency and honest communication
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- ! Testimonial Section --}}
    <section id="testimonials" class="w-full bg-(--color-secondary) text-white overflow-hidden py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-4">
        <div class="mx-auto w-full max-w-480 ">
            <div class="text-center relative md:mb-24 sm:mb-20 mb-16">
                <div class="relative z-10 flex items-center justify-center gap-2 mb-4">
                    <span class="text-white font-bold tracking-widest text-lg uppercase">Testimonials</span>
                </div>
                <h2 class="relative z-10 font-extrabold leading-[1.1] text-3xl md:text-4xl lg:text-5xl">
                    <span class="text-(--color-primary)">Trusted</span> <br>by Our Clients
                </h2>
            </div>

            <div class="swiper testimonialSwiper pb-16">
                <div class="swiper-wrapper pb-24!">

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white/5 border border-white/10 px-5 md:px-7 lg:px-10 py-5 md:py-7 lg:py-10 rounded-[40px] h-full flex flex-col relative overflow-hidden group hover:border-(--color-primary)/50 transition-all duration-500">
                            <div class="flex items-center gap-1 sm:mb-6 mb-4">
                                <span class="text-yellow-400 sm:text-xl text-lg">★★★★★</span>
                                <span class="text-white/60 ml-2 font-bold text-sm sm:text-base">5.0</span>
                            </div>
                            <h3 class="sm:text-2xl text-xl font-bold sm:mb-4 mb-2">Outstanding SEO Results!</h3>
                            <p class="text-gray-300 leading-relaxed sm:mb-8 mb-6 grow text-base md:text-lg">
                                "Blue Orbit Digital helped our website rank higher and attract the right customers.
                                Their SEO strategy significantly improved our online visibility."
                            </p>
                            <div class="flex items-center gap-4">
                                <img src="https://picsum.photos/id/64/100/100" alt="Ahmed Raza"
                                    class="sm:w-14 sm:h-14 w-12 h-12 rounded-full object-cover border-2 border-(--color-primary)">
                                <div>
                                    <h4 class="font-bold text-base sm:text-lg">Ahmed Raza</h4>
                                    <p class="text-(--color-primary) text-xs sm:text-sm">Marketing Manager</p>
                                </div>
                            </div>
                            <span
                                class="absolute sm:bottom-10 bottom-16 right-10 lg:text-9xl md:text-8xl sm:text-7xl text-5xl font-serif text-white/5 select-none z-0">”</span>
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white/5 border border-white/10 px-5 md:px-7 lg:px-10 py-5 md:py-7 lg:py-10 rounded-[40px] h-full flex flex-col relative overflow-hidden group hover:border-(--color-primary)/50 transition-all duration-500">
                            <div class="flex items-center gap-1 sm:mb-6 mb-4">
                                <span class="text-yellow-400 sm:text-xl text-lg">★★★★★</span>
                                <span class="text-white/60 ml-2 font-bold text-sm sm:text-base">5.0</span>
                            </div>
                            <h3 class="sm:text-2xl text-xl font-bold sm:mb-4 mb-2">Highly Recommended</h3>
                            <p class="text-gray-300 leading-relaxed sm:mb-8 mb-6 grow text-base md:text-lg">
                                "Their team perfectly understood our brand voice and created engaging content. Our reach
                                and engagement have grown noticeably."
                            </p>
                            <div class="flex items-center gap-4">
                                <img src="https://picsum.photos/id/65/100/100" alt="Sarah Williams"
                                    class="sm:w-14 sm:h-14 w-12 h-12 rounded-full object-cover border-2 border-(--color-primary)">
                                <div>
                                    <h4 class="font-bold text-base sm:text-lg">Sarah Williams</h4>
                                    <p class="text-(--color-primary) text-xs sm:text-sm">Brand Manager</p>
                                </div>
                            </div>
                            <span
                                class="absolute sm:bottom-10 bottom-16 right-10 lg:text-9xl md:text-8xl sm:text-7xl text-5xl font-serif text-white/5 select-none z-0">”</span>
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white/5 border border-white/10 px-5 md:px-7 lg:px-10 py-5 md:py-7 lg:py-10 rounded-[40px] h-full flex flex-col relative overflow-hidden group hover:border-(--color-primary)/50 transition-all duration-500">
                            <div class="flex items-center gap-1 sm:mb-6 mb-4">
                                <span class="text-yellow-400 sm:text-xl text-lg">★★★★★</span>
                                <span class="text-white/60 ml-2 font-bold text-sm sm:text-base">5.0</span>
                            </div>
                            <h3 class="sm:text-2xl text-xl font-bold sm:mb-4 mb-2">Highly Professional!!</h3>
                            <p class="text-gray-300 leading-relaxed sm:mb-8 mb-6 grow text-base md:text-lg">
                                "Their digital media strategy helped us reach the right audience efficiently. The
                                results exceeded our expectations."
                            </p>
                            <div class="flex items-center gap-4">
                                <img src="https://picsum.photos/id/91/100/100" alt="Daniel Mathew"
                                    class="sm:w-14 sm:h-14 w-12 h-12 rounded-full object-cover border-2 border-(--color-primary)">
                                <div>
                                    <h4 class="font-bold text-base sm:text-lg">Daniel Mathew</h4>
                                    <p class="text-(--color-primary) text-xs sm:text-sm">Director, Apex Business Solutions</p>
                                </div>
                            </div>
                            <span
                                class="absolute sm:bottom-10 bottom-16 right-10 lg:text-9xl md:text-8xl sm:text-7xl text-5xl font-serif text-white/5 select-none z-0">”</span>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    {{-- ! Contact Section --}}
    <section id="contact" class="w-full bg-[#FAFAFA] py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-2">

        <div class="max-w-480 mx-auto bg-white rounded-3xl overflow-hidden shadow-2xl flex flex-col lg:flex-row">

            <div class="bg-(--color-secondary) rounded-3xl text-white lg:px-10 lg:py-8 md:px-8 sm:px-7 px-6 py-5 lg:w-100 flex flex-col justify-between">
                <div>
                    <div class="space-y-8">
                        <div>
                            <p class=" text-base uppercase tracking-widest mb-1">Address</p>
                            <p class="text-sm sm:text-[15px] text-gray-400">Business Center Sharjah Publishing City Free Zone, Sharjah, United Arab Emirates.</p>
                        </div>
                        <div>
                            <p class=" text-base uppercase tracking-widest mb-1">Contact</p>
                            <p class="text-sm sm:text-[15px] text-gray-400">Phone : +971 56 771 6432</p>
                            <p class="text-sm sm:text-[15px] text-gray-400 ">Email : grow@blueorbitdigitalagency.com</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <p class="text-gray-400 text-sm uppercase tracking-widest mb-4">Stay Connected</p>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                            <a href="mailto:grow@blueorbitdigitalagency.com" class="hover:opacity-80"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" data-lucide="mail" aria-hidden="true"
                                    class="lucide lucide-mail w-5 h-5">
                                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                </svg></a>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                            <a href="https://www.instagram.com/blue.orbit.digital" target="_blank"
                                class="hover:opacity-80">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-instagram-icon lucide-instagram">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                                    </rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-4 lg:flex-1 bg-white">
                <div class="flex items-center gap-2">
                    <span class="mb-4 text-(--color-secondary) font-bold tracking-wide sm:text-2xl text-xl">Contact Us</span>
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-(--color-secondary) md:mb-10 sm:mb-8 mb-7">Start Growing Your <span
                        class="text-(--color-primary)">Business</span> Today</h2>

                <form action="{{ route('contact.store') }}" autocomplete="off" method="POST"
                    class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    <input type="text" name="name" placeholder="Your Name *" required
                        class="w-full p-4 rounded-xl border border-gray-200 focus:border-(--color-primary) outline-none transition-all">

                    <input type="email" name="email" placeholder="Email *" required
                        class="w-full p-4 rounded-xl border border-gray-200 focus:border-(--color-primary) outline-none transition-all">

                    <input type="text" name="subject" placeholder="Subject *"
                        class="w-full p-4 rounded-xl border border-gray-200 focus:border-(--color-primary) outline-none transition-all">

                    <select name="service_id" required
                        class="w-full p-4 rounded-xl border border-gray-200 focus:border-(--color-primary) outline-none transition-all text-gray-500">

                        <option value="" disabled selected>Select a Service</option>

                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->title }}
                            </option>
                        @endforeach

                    </select>

                    <textarea name="message" placeholder="Your Message *" required
                        class="col-span-full w-full p-4 h-32 rounded-xl border border-gray-200 focus:border-(--color-primary) outline-none transition-all"></textarea>

                    <div class="flex flex-col gap-4 mt-4 sm:flex-row">
                        <button type="submit"
                            class="bg-(--color-primary) text-white text-nowrap px-8 py-4 rounded-full font-bold hover:bg-[#010521] transition-all">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        @vite('resources/js/testimonialSwiper.js')
       
    @endpush

    @push('styles')
        @vite('resources/css/testimonialSwiper.css')
    @endpush
@endsection
