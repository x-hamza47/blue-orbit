@extends('home-layout.layout')
@stack('styles')
@section('content')
    @foreach ($service->sections as $section)
        @include('service-section.' . $section->type, ['data' => $section->data])
    @endforeach
        {{-- @include('service-section.hero') --}}
@endsection
@stack('scripts')
