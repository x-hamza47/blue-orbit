<header class="w-full fixed z-9999 ">
    <div class="bg-(--color-secondary) text-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4 md:px-6">
            <div class="flex items-center gap-8 py-3 md:text-sm text-xs font-medium [&>a]:text-nowrap">

                <!-- Phone -->
                <a href="tel:+971567716432" class="flex items-center gap-2 hover:text-(--color-primary-hover) transition">
                    <i data-lucide="phone" class="w-4 h-4 text-(--color-primary)"></i>
                    <span class="hidden lg:block">+971 56 771 6432</span>
                </a>

                <!-- Email -->
                <a href="mailto:grow@blueorbitdigitalagency.com"
                    class="flex items-center gap-2 hover:text-(--color-primary-hover) transition">
                    <i data-lucide="mail" class="w-4 h-4 text-(--color-primary)"></i>
                    <span class="hidden lg:block">grow@blueorbitdigitalagency.com</span>
                </a>

                <!-- Address -->
                <a href="https://www.google.com/maps?q=Sharjah+Publishing+City+Free+Zone" target="_blank"
                    rel="noopener noreferrer" class="flex items-center gap-2 hover:text-(---primary-hover) transition">
                    <i data-lucide="map-pin" class="w-4 h-4 text-(--color-primary)"></i>
                    <span class="truncate max-w-105 hidden lg:block">
                        Business Center Sharjah Publishing City Free Zone, Sharjah, UAE
                    </span>
                </a>

            </div>

            <!-- Right: Social -->
            <div class="flex items-center gap-5 bg-(--color-primary) py-3 px-8 clip-path-slant">

                <!-- Instagram -->
                <a href="https://www.instagram.com/blue.orbit.digital" target="_blank" rel="noopener noreferrer"
                    aria-label="Instagram" class="hover:opacity-80 hover:scale-110 transition">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">

                        <rect width="20" height="20" x="2" y="2" rx="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                    </svg>
                </a>
                <!-- Email Shortcut -->
                <a href="mailto:grow@blueorbitdigitalagency.com" aria-label="Email"
                    class="hover:opacity-80 hover:scale-110 transition">
                    <i data-lucide="mail" class="w-5 h-5"></i>
                </a>

            </div>

        </div>
    </div>
    <div class="mx-auto relative flex items-center justify-between h-20 px-4 md:px-10 bg-white ">

        <div class="w-24 h-full shrink-0 mr-7 overflow-hidden flex items-center">
            <img class="w-full h-24 object-contain" src="{{ asset('images/logo.jfif') }}" alt="Logo">
        </div>
        <nav class="navbar">
            <a href="{{ route('home') }}"
                class="nav-link flex items-center gap-2 {{ Route::is('home') ? 'active' : '' }}">
                <i data-lucide="home" class="w-5 h-5 nav-icon"></i>
                <span>Home</span>
            </a>
            <a href="#about" class="nav-link flex items-center gap-2 ">
                <i data-lucide="user" class="w-5 h-5 nav-icon"></i>
                <span>About</span>
            </a>
            {{-- dummy --}}
            <div class="relative group menu-item h-fit dropdown-container flex items-center flex-col">

                <!-- Trigger -->
                <button class="nav-link px-3 py-1! flex items-center justify-between w-full gap-2 cursor-pointer">
                    <div class="flex items-center gap-2">
                        <i data-lucide="briefcase" class="w-5 h-5 nav-icon"></i>
                        <span>Services</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 chevron dropdown-icon"></i>
                    </div>
                </button>

                <!-- Dropdown -->
                <div class="menu-dropdown">

                    <div class="menu-grid flex [&>div]:min-w-3xs h-auto flex-wrap gap-x-4 gap-y-2">

                        @foreach ($navServices as $service)
                            <!-- Digital Marketing -->
                            <div class="sub-menu">
                                <div class="flex items-center gap-x-1 mb-3">
                                    <span
                                        class="w-7 h-7 flex items-center justify-center rounded-md" style="background-color: {{ $service->color }}20; color: {{ $service->color }}">
                                        <i data-lucide="{{ $service->icon }}" class="w-4 h-4"></i>
                                    </span>
                                    <a class="flex items-center text-base gap-2 font-semibold sub-menu-title"
                                        href="{{ route('service', ['parentSlug' => $service->slug]) }}">
                                       {{ $service->title }}
                                    </a>
                                    <span class="sub-chevron">
                                        <i data-lucide="chevron-down" class="w-4 h-4 xl:hidden"></i>
                                    </span>
                                </div>
                                @if($service->children->count())
                                <div class="sub-menu-dropdown">
                                    <ul class="space-y-1 list-disc list-inside">
                                        @foreach ($service->children as $child)
                                        <li>
                                            <a class="dropdown-link" href="{{ route('service', ['parentSlug' => $service->slug, 'childSlug' => $child->slug]) }}">
                                            {{ $child->title }}</a></li>
                                            @endforeach
                
                                    </ul>
                                </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <a href="{{ route('blogs') }}" class="nav-link flex items-center gap-2 ">
                <i data-lucide="file-text" class="w-5 h-5 nav-icon"></i>
                <span>Blogs</span>
            </a>
            {{-- <a href="" class="nav-link flex items-center gap-2 ">
                <i data-lucide="shield-check" class="w-5 h-5 nav-icon"></i>
                <span>Why us</span>
            </a> --}}
            {{-- <a href="" class="nav-link flex items-center gap-2 ">
                <i data-lucide="star" class="w-5 h-5 nav-icon"></i>
                <span>Testimonials</span>
            </a> --}}
            <a href="{{ request()->is('/') ? '#contact' : url('/') . '#contact' }}" class="nav-link flex items-center gap-2 ">
                <i data-lucide="phone" class="w-5 h-5 nav-icon"></i>
                <span>Contact</span>
            </a>

            <a href="{{ request()->is('/') ? '#contact' : url('/') . '#contact' }}"
                class="hidden sm:block bg-[#4373F6] text-white px-8 py-3 rounded-full font-bold hover:bg-[#010521] transition-all transform hover:scale-105 lg:ml-auto">
                Book a Consultation
            </a>
            {{-- @foreach ($navCategories as $category)
                <div class="relative group menu-item w-max dropdown-container">
                    <button class="nav-link flex items-center justify-between w-full gap-2">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid {{ $category->icon }} text-xl nav-icon"></i>
                            <span>{{ $category->name }}</span>
                        </div>

                        <i
                            class="fa-solid fa-chevron-down nav-icon text-white text-lg transition-transform duration-300"></i>
                    </button>
                    @if ($category->services->count())
                        <div class="menu-dropdown">
                            <ul class="space-y-1">
                                @foreach ($category->services as $service)
                                    <li><a class="dropdown-link"
                                            href="{{ route('services.companies', $service->slug) }}">{{ $service->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @endforeach --}}



        </nav>

        <div class="block xl:hidden">
            <button id="mobile-menu-btn" class="text-(--color-text) text-2xl">
                <i id="menu-icon" data-lucide="menu" class="w-7 h-7"></i>
            </button>
        </div>
    </div>
</header>
