 <aside id="sidebar"
     class="sidebar-transition w-72 h-dvh sticky top-0 left-0 bg-[#010521] text-white flex flex-col z-50">
     <div class="p-6 flex items-center justify-between">
         <div class="flex items-center gap-2 overflow-hidden">
             <span class="font-black text-xl tracking-tighter sidebar-text">BLUEORBIT</span>
         </div>
         <button onclick="toggleSidebar()" class="hover:bg-white/10 p-1 rounded-lg transition-colors">
             <i data-lucide="menu" class="w-5 h-5 text-gray-400"></i>
         </button>
     </div>

     <nav class="flex-1 px-4 py-4 space-y-2 custom-scrollbar overflow-y-auto">
         <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 px-2 mb-4 sidebar-text">Main
             Menu</p>

         <a href="{{ route('dashboard') }}"
             class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all group 
            {{ request()->routeIs('dashboard') ? 'bg-[#4373F6] text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
             <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
             <span class="font-bold text-sm sidebar-text">Dashboard</span>
         </a>

         <a href="{{ route('contact.index') }}"
             class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all group 
            {{ request()->routeIs('contact.index') ? 'bg-[#4373F6] text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
             <i data-lucide="mail" class="w-5 h-5"></i>
             <span class="font-bold text-sm sidebar-text">Contact</span>
         </a>

         <a href="{{ route('service.index') }}"
             class="flex items-center gap-4 px-3 py-3 rounded-xl transition-all group 
               {{ request()->routeIs('service.*') ? 'bg-[#4373F6] text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
             <i data-lucide="layers" class="w-5 h-5"></i>
             <span class="font-bold text-sm sidebar-text">Services</span>
         </a>


         <div class="pt-6">
             <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 px-2 mb-4 sidebar-text">
                 Account</p>
             <a href="#"
                 class="flex items-center gap-4 px-3 py-3 text-gray-400 hover:bg-white/5 hover:text-white rounded-xl transition-all">
                 <i data-lucide="settings" class="w-5 h-5"></i>
                 <span class="font-bold text-sm sidebar-text">Settings</span>
             </a>
         </div>
     </nav>

     <div class="p-4 border-t border-white/5">
         <div class="flex items-center gap-3 p-2 rounded-2xl bg-white/5">
             <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Strategy"
                 class="w-10 h-10 rounded-xl bg-[#4373F6]/20" alt="User">
             <div class="overflow-hidden sidebar-text">
                 <p class="text-sm font-bold truncate">{{ Auth::user()->name }}</p>
                 <p class="text-[10px] text-gray-500 font-bold uppercase">Admin Account</p>
             </div>
         </div>
     </div>
 </aside>

 @push('scripts')
     <script>
         function toggleSidebar() {
             const sidebar = document.getElementById('sidebar');
             const sidebarTexts = document.querySelectorAll('.sidebar-text');
             if (sidebar.classList.contains('w-72')) {
                 sidebar.classList.replace('w-72', 'w-20');
                 sidebarTexts.forEach(t => t.classList.add('hidden'));
             } else {
                 sidebar.classList.replace('w-20', 'w-72');
                 setTimeout(() => {
                     sidebarTexts.forEach(t => t.classList.remove('hidden'));
                 }, 100);
             }
         }
     </script>
 @endpush
