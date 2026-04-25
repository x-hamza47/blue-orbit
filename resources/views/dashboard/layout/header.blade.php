<header class="h-20 bg-white border-b border-gray-100 sticky top-0 flex items-center justify-between px-8 ">
    <div class="flex items-center gap-4">
       <h1 class="font-black text-xl text-[#010521]">
                Services <span class="text-gray-300 font-light mx-2">/</span> Management
            </h1>
    </div>

    <div class="flex items-center gap-6">
        <button class="relative p-2 text-gray-400 hover:text-[#4373F6] transition-colors">
            <i data-lucide="bell" class="w-5 h-5"></i>
            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
        </button>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                    <path d="m16 17 5-5-5-5" />
                    <path d="M21 12H9" />
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                </svg>
            </button>
        </form>
    </div>
</header>
