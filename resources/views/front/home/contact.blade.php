 <section id="contact" class="w-full bg-[#FAFAFA] py-10 md:py-15 lg:py-20 md:px-12 sm:px-6 px-2">

     <div class="max-w-480 mx-auto bg-white rounded-3xl overflow-hidden shadow-2xl flex flex-col lg:flex-row">

         <div
             class="bg-(--color-secondary) rounded-3xl text-white lg:px-10 lg:py-8 md:px-8 sm:px-7 px-6 py-5 lg:w-100 flex flex-col justify-between">
             <div>
                 <div class="space-y-8">
                     <div>
                         <p class=" text-base uppercase tracking-widest mb-1">Address</p>
                         <p class="text-sm sm:text-[15px] text-gray-400">Business Center Sharjah Publishing City Free
                             Zone, Sharjah, United Arab Emirates.</p>
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
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-instagram-icon lucide-instagram">
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
                 <span class="mb-4 text-(--color-secondary) font-bold tracking-wide sm:text-2xl text-xl">Contact
                     Us</span>
             </div>
             <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-(--color-secondary) md:mb-10 sm:mb-8 mb-7">Start
                 Growing Your <span class="text-(--color-primary)">Business</span> Today</h2>

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
