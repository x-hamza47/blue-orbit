<link rel="canonical" href="{{ config('app.url') . request()->getRequestUri() }}" />

{{-- ? Open Graph --}}
<meta property="og:type"        content="@yield('og_type', 'website')" />
<meta property="og:url"         content="{{ config('app.url') . request()->getRequestUri() }}" />
<meta property="og:site_name"   content="Blue Orbit Digital Agency" />
<meta property="og:title"       content="@yield('title', 'Digital Marketing Company | Blue Orbit')" />
<meta property="og:description" content="@yield('meta_description', 'Blue Orbit Digital is a full-service digital marketing agency. We provide SEO, PPC, social media, web design and more.')" />
<meta property="og:image" content="@yield('og_image', asset('images/og-images/' . (request()->segment(2) ?: (request()->segment(1) ?: 'og_home')) . '.webp'))" />
<meta property="og:image:width"  content="1200" />
<meta property="og:image:height" content="630" />

{{-- ? Twitter --}}
<meta name="twitter:card"        content="summary_large_image" />
<meta name="twitter:title"       content="@yield('title', 'Digital Marketing Company | Blue Orbit')" />
<meta name="twitter:description" content="@yield('meta_description', 'Blue Orbit Digital is a full-service digital marketing agency. We provide SEO, PPC, social media, web design and more.')" />
<meta name="twitter:image" content="@yield('og_image', asset('images/og-twitter/' . (request()->segment(2) ?: (request()->segment(1) ?: 'og_home')) . '.webp'))" />