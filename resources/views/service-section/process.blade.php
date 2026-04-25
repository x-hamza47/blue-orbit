 <section class="w-full bg-white text-[#010521]">
     <div class="max-w-480 mx-auto w-full px-[clamp(1.5rem,5vw,5rem)] py-10">

         <div class="text-center mb-12">
             <h2 class="font-extrabold leading-tight text-[clamp(2.5rem,6vw,4.5rem)]">
                 Process <span class="text-[#4373F6]">How We Work</span>
             </h2>
             <p class="text-gray-700">{{ $data['subheading'] }}</p>
             <div class="w-24 h-1 bg-[#4373F6] mx-auto mt-4 rounded-full"></div>
         </div>

         <div @class([
             'relative grid grid-cols-1 md:grid-cols-2 gap-8',
             'lg:grid-cols-1' => count($data['items']) === 1,
             'lg:grid-cols-2' => count($data['items']) === 2,
             'lg:grid-cols-3' => count($data['items']) === 3,
             'lg:grid-cols-4' => count($data['items']) === 4,
             'lg:grid-cols-5' => count($data['items']) === 5,
             'lg:grid-cols-6' => count($data['items']) === 6,
         ])>

             <div class="hidden lg:block absolute top-10 left-[8%] right-[8%] h-0.5 bg-[#4373F6] z-0"></div>
             @foreach ($data['items'] as $item)
                 <div class="relative z-10 flex flex-col items-center text-center group">
                     <div
                         class="relative w-20 h-20 rounded-full outline-8 outline-white border-2 border-gray-200 flex items-center justify-center mb-6 font-bold text-xl group-hover:border-[#4373F6] bg-[#4373F6] text-white transition-all">
                         <i data-lucide="{{ $item['icon'] }}" class="w-8 h-8 text-white"></i>

                         <span
                             class="absolute bg-[#010521] border-3 border-white w-10 h-10 flex items-center justify-center rounded-full right-0 translate-x-1/2">
                             {{ $loop->iteration }}</span>
                     </div>
                     <h3 class="font-bold text-lg mb-2">{{ $item['title'] }}</h3>
                     <p class="text-gray-800">{{ $item['desc'] }}
                     </p>
                 </div>
             @endforeach

         </div>
     </div>
 </section>
