@extends('front.main')

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
