@extends('front.main')

@section('content')
    {{-- @include('temp.roicalculator') --}}
    @forelse ($service->sections as $section)
        @include('temp.' . $section->type, [
            'data' => $section->resolved_data,
        ])
    @empty
        <div class="text-center py-10 text-gray-400">
            No active sections found
        </div>
    @endforelse
@endsection
