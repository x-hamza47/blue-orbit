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

    {{-- ! About Section --}}
    @include('front.home.about')

    {{-- ! Services Section --}}
    @include('front.home.services')

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
@endpush

@push('styles')
    @vite('resources/css/testimonialSwiper.css')
@endpush
