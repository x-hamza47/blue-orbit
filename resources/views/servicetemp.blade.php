@extends('home-layout.layout')
@section('content')
    @include('temp.hero')
    @include('temp.stats')
    @include('temp.services')
    @include('temp.industries')
    @include('temp.process')
    @include('temp.tech')
    @include('temp.benefits')
    @include('temp.testimonials')
    @include('temp.usecases')
    @include('temp.faqs')
    @include('temp.challenges')
    @include('temp.whyblueorbit')
    @include('temp.contact')
    @include('temp.relatedservices')
    @include('temp.relatedservices')


    @include('temp.custom')
    @push('styles')
        @stack('servicestyles')
    @endpush
    @push('scripts')
        @stack('servicescripts')
    @endpush
@endsection
