@extends('front.main')
@section('schema')
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Organization",
  "name": "Blue Orbit Digital Agency",
  "url": "https://blueorbitdigitalagency.com",
 "logo": "{{ asset('images/logo.jfif', true) }}"
  "telephone": "+971567716432",
  "email": "grow@blueorbitdigitalagency.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Business Center, Sharjah Publishing City Free Zone",
    "addressLocality": "Sharjah",
    "addressCountry": "AE"
  },
  "sameAs": [
    "https://www.instagram.com/blue.orbit.digital"
  ]
}
</script>
@endsection

@section('content')
    {{-- ! Hero Section --}}
    @include('front.home.hero')

    @include('front.home.badges')
    
    {{-- ! About Section --}}
    @include('front.home.about')
    
    {{-- ! Services Section --}}
    @include('front.home.services')
    
    @include('front.home.results')
    @include('front.home.industries')

    {{-- ! Workflow Section --}}
    @include('front.home.workflow')

    {{-- ! Why Choose Us Section --}}
    @include('front.home.whyUs')

    {{-- ! Testimonials Section --}}
    @include('front.home.testimonials')

    {{-- ! Contact Section --}}
    @include('front.home.contact')
@endsection

{{-- Info: Scripts & Styles --}}

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initSwiper({
                selector: ".testimonialSwiper",
                lg: 2,
            });
        });
    </script>
    <script>
        (function() {
            const items = document.querySelectorAll('.stat-item');

            const runCounter = (el) => {
                const target = parseFloat(el.dataset.value);
                const decimals = parseInt(el.dataset.decimals) || 0;
                const numEl = el.querySelector('.stat-number');
                const duration = 1800;
                const start = performance.now();

                const ease = t => t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;

                const tick = (now) => {
                    const elapsed = now - start;
                    const progress = Math.min(elapsed / duration, 1);
                    const current = target * ease(progress);
                    numEl.textContent = decimals ?
                        current.toFixed(decimals) :
                        Math.floor(current).toLocaleString();
                    if (progress < 1) requestAnimationFrame(tick);
                    else numEl.textContent = decimals ? target.toFixed(decimals) : target.toLocaleString();
                };
                requestAnimationFrame(tick);
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        // Fade + slide in
                        el.classList.remove('opacity-0', 'translate-y-6');
                        el.classList.add('opacity-100', 'translate-y-0');
                        runCounter(el);
                        observer.unobserve(el);
                    }
                });
            }, {
                threshold: 0.3
            });

            items.forEach(el => observer.observe(el));
        })();
    </script>
@endpush

@push('styles')
    @vite('resources/css/testimonialSwiper.css')
@endpush
