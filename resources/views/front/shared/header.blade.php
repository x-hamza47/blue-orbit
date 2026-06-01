<header class="w-full fixed z-9999 ">

    <div class="bg-(--color-secondary) text-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4 md:px-6">

            <div class="flex items-center gap-6 py-2.5 md:text-sm text-xs font-medium [&>a]:text-nowrap">

                {{-- Phone --}}
                <a href="tel:+971567716432"
                    class="flex items-center gap-2 hover:text-(--color-primary) transition">
                    <i data-lucide="phone" class="w-4 h-4 text-(--color-primary)"></i>
                    <span class="hidden lg:block">+971 56 771 6432</span>
                </a>

                {{-- Email --}}
                <a href="mailto:grow@blueorbitdigitalagency.com"
                    class="flex items-center gap-2 hover:text-(--color-primary) transition">
                    <i data-lucide="mail" class="w-4 h-4 text-(--color-primary)"></i>
                    <span class="hidden lg:block">grow@blueorbitdigitalagency.com</span>
                </a>

                {{-- Address --}}
                <a href="https://www.google.com/maps?q=Sharjah+Publishing+City+Free+Zone"
                    target="_blank" rel="noopener noreferrer"
                    class="flex items-center gap-2 hover:text-(--color-primary) transition">
                    <i data-lucide="map-pin" class="w-4 h-4 text-(--color-primary)"></i>
                    <span class="truncate max-w-105 hidden lg:block">
                        Business Center Sharjah Publishing City Free Zone, Sharjah, UAE
                    </span>
                </a>

            </div>

            {{-- WhatsApp CTA --}}
            <a href="https://wa.me/971567716432" target="_blank" rel="noopener noreferrer"
                class="flex items-center gap-2 bg-[#25D366] hover:brightness-110 transition text-white text-xs md:text-sm font-bold py-2.5 px-5 clip-path-slant">
                {{-- WhatsApp icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                <span class="hidden sm:block">WhatsApp Us Now</span>
            </a>

        </div>
    </div>

    <div class="mx-auto relative flex items-center text-white justify-between h-20 px-4 md:px-10 bg-[#0A1628] shadow-sm">

        {{-- Logo --}}
        <div class="w-24 h-full shrink-0 mr-7 overflow-hidden flex items-center">
            <img class="w-full h-24 object-contain" src="{{ asset('images/logo.jfif') }}" alt="Blue Orbit Digital Logo">
        </div>

        {{-- Nav links --}}
        <nav class="navbar">

            {{-- Home --}}
            <a href="{{ route('home') }}"
                class="nav-link flex items-center gap-2 {{ Route::is('home') ? 'active' : '' }}">
                <i data-lucide="home" class="w-5 h-5 nav-icon"></i>
                <span>Home</span>
            </a>

            {{-- About --}}
            <a href="#about" class="nav-link flex items-center gap-2">
                <i data-lucide="user" class="w-5 h-5 nav-icon"></i>
                <span>About</span>
            </a>

            {{-- Services Dropdown --}}
            <div class="relative group menu-item h-fit dropdown-container flex xl:items-center flex-col">

                <button class="nav-link px-3 py-1! flex items-center justify-between w-full gap-2 cursor-pointer">
                    <div class="flex items-center gap-2">
                        <i data-lucide="briefcase" class="w-5 h-5 nav-icon"></i>
                        <span>Services</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 chevron dropdown-icon"></i>
                    </div>
                </button>

                <div class="menu-dropdown">
                    <div class="menu-grid xl:overflow-y-auto flex xl:justify-center [&>div]:min-w-3xs xl:[&>div]:flex-1 xl:max-h-[calc(100dvh-200px)] flex-col flex-wrap gap-x-4 gap-y-2">
                        @foreach ($navServices as $service)
                            <div class="sub-menu">
                                <div class="flex items-center gap-x-1 mb-3">
                                    <span class="w-7 h-7 flex items-center justify-center rounded-md shrink-0"
                                        style="background-color: {{ $service->color }}20; color: {{ $service->color }}">
                                        <i data-lucide="{{ $service->icon }}" class="w-4 h-4"></i>
                                    </span>
                                    <a class="flex items-center text-sm xl:text-base gap-2 font-semibold sub-menu-title"
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
                                                    <a class="dropdown-link"
                                                        href="{{ route('service', ['parentSlug' => $service->slug, 'childSlug' => $child->slug]) }}">
                                                        {{ $child->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Industries Dropdown --}}
            <div class="relative group menu-item h-fit dropdown-container flex xl:items-center flex-col">

                <button class="nav-link px-2 py-1! flex items-center justify-between w-full gap-2 cursor-pointer">
                    <div class="flex items-center gap-2">
                        <i data-lucide="building-2" class="w-5 h-5 nav-icon"></i>
                        <span>Industries</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 chevron dropdown-icon"></i>
                    </div>
                </button>

                <div class="menu-dropdown">
                    <div class="menu-grid flex flex-col gap-y-1 min-w-[200px]">
                        @php
                            $industries = [
                                ['icon' => 'building',        'label' => 'Real Estate'],
                                ['icon' => 'hotel',           'label' => 'Hospitality & Hotels'],
                                ['icon' => 'heart-pulse',     'label' => 'Healthcare & Clinics'],
                                ['icon' => 'shopping-cart',   'label' => 'E-Commerce'],
                                ['icon' => 'utensils',        'label' => 'F&B & Restaurants'],
                                ['icon' => 'scale',           'label' => 'Legal & Finance'],
                                ['icon' => 'rocket',          'label' => 'Free Zone Startups'],
                                ['icon' => 'shirt',           'label' => 'Retail & Fashion'],
                            ];
                        @endphp

                        @foreach ($industries as $industry)
                            <a href="#"
                                class="flex items-center gap-3 px-2.5 py-2 rounded-md hover:bg-(--color-primary)/10 hover:text-(--color-primary) transition group/item">
                                <span class="w-7 h-7 flex items-center justify-center rounded-md bg-(--color-primary)/10 text-(--color-primary) group-hover/item:bg-(--color-primary) group-hover/item:text-white transition">
                                    <i data-lucide="{{ $industry['icon'] }}" class="w-4 h-4"></i>
                                </span>
                                <span class="text-sm font-medium  group-hover/item:text-(--color-primary) text-nowrap transition">
                                    {{ $industry['label'] }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ── NEW: Case Studies ── --}}
            <a href=""
                class="nav-link flex items-center gap-2">
                <i data-lucide="bar-chart-2" class="w-5 h-5 nav-icon"></i>
                <span>Case Studies</span>
            </a>

            {{-- Blog --}}
            <a href="{{ route('blog.index') }}" class="nav-link flex items-center gap-2">
                <i data-lucide="file-text" class="w-5 h-5 nav-icon"></i>
                <span>Blogs</span>
            </a>

            {{-- Contact --}}
            <a href="{{ request()->is('/') ? '#contact' : url('/') . '#contact' }}"
                class="nav-link flex items-center gap-2">
                <i data-lucide="phone" class="w-5 h-5 nav-icon"></i>
                <span>Contact</span>
            </a>

            <a href="{{ request()->is('/') ? '#contact' : url('/') . '#contact' }}"
                class="hidden sm:flex items-center gap-2 bg-(--color-gold) text-white px-6 py-2.5 rounded-full font-bold hover:brightness-110 hover:scale-105 transition-all transform lg:ml-auto text-nowrap border-2 border-(--color-gold) free-audit-btn">
                <i data-lucide="search" class="w-4 h-4"></i>
                Free Audit →
            </a>

        </nav>

        {{-- Mobile menu toggle --}}
        <div class="block xl:hidden">
            <button id="mobile-menu-btn" class="text-(--color-text) text-2xl">
                <i id="menu-icon" data-lucide="menu" class="w-7 h-7"></i>
            </button>
        </div>
    </div>
</header>