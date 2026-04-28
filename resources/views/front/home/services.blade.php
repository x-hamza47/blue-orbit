  <section id="services" class="w-full bg-[#F3F6FF] py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-4">
      <div class="mx-auto w-full max-w-480">

          <div class="flex flex-col md:flex-row justify-between sm:mb-16 mb-13 gap-8">
              <div class="relative">
                  <span class="absolute -top-12 left-0 text-lg font-black text-gray-100/50 uppercase select-none -z-10">
                      Services
                  </span>
                  <div class="flex items-center gap-2 mb-4">
                      <span class="text-(--color-secondary) font-bold tracking-wide sm:text-2xl text-xl">Our
                          Services</span>
                  </div>
                  <h2 class="font-extrabold leading-[1.1] text-(--color-secondary) text-3xl md:text-4xl lg:text-5xl">
                      Services We Provide to <br>
                      <span class="text-(--color-primary)">Elevate Your Business</span>
                  </h2>
              </div>
          </div>

          {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> --}}
          <div
              class="card-wrapper flex flex-wrap justify-center my-4 lg:gap-x-20 md:gap-x-10 gap-x-5 gap-y-10  mobile-cards relative">

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
