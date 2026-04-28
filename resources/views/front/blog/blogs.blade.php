@extends('front.main')

@section('content')
<section id="blogs"
    class="w-full relative overflow-hidden flex items-center bg-blend-overlay md:px-12 sm:px-6 px-4 h-[70vh]"
    style="background: #212121 url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=80') center / cover no-repeat;">



    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto w-full flex items-center h-full">

        <div class="text-white max-w-2xl flex flex-col gap-5">

            <h1 class="font-extrabold uppercase leading-tight 
                lg:text-6xl md:text-5xl text-3xl">
                Insights & Stories from our Blog
            </h1>

            <p class="text-gray-300 text-base md:text-lg leading-relaxed">
                Explore the latest trends in digital marketing, technology updates, 
                and strategies to grow your business online with powerful insights.
            </p>

            <div class="flex gap-4 mt-2">
                {{-- <a href="#latest"
                    class="bg-[#00d9ff] text-[#010521] font-bold uppercase px-6 py-3 rounded-sm
                    hover:bg-white transition-all">
                    Read Blogs
                </a> --}}

                <a href="#contact"
                    class="border border-white text-white font-bold uppercase px-6 py-3 rounded-sm
                    hover:bg-white hover:text-black transition-all">
                    Contact Us
                </a>
            </div>

        </div>

    </div>
</section>
@endsection