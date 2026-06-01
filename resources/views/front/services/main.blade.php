@extends('front.main')
@section('title', ($service->meta_title ?? $service->title) . ' - Blue Orbit Digital Agency')
@section('meta_description', $service->meta_description ?? $service->desc)
@section('schema')
    @php
        $faqSection = $service->sections->firstWhere('type', 'faqs');
        $faqs = $faqSection ? $faqSection->resolved_data['faqs'] ?? [] : [];
    @endphp
    <script type="application/ld+json">
{
"@@context": "https://schema.org",
"@@graph": [
    {
    "@@type": "WebPage",
    "@@id": "{{ url()->current() }}",
    "url": "{{ url()->current() }}",
    "name": "{{ $service->meta_title ?? $service->title }}",
    "description": "{{ $service->meta_description ?? $service->desc }}",
    "inLanguage": "en-US",
    "isPartOf": {
        "@@type": "WebSite",
        "name": "Blue Orbit Digital Agency",
        "url": "https://blueorbitdigitalagency.com"
    },
    "datePublished": "{{ $service->created_at->utc()->format('Y-m-d\TH:i:s+00:00') }}",
    "dateModified": "{{ $service->updated_at->utc()->format('Y-m-d\TH:i:s+00:00') }}"
    },
    {
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {
        "@@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ url('/') }}"
        },
        @if($service->parent)
        {
        "@@type": "ListItem",
        "position": 2,
        "name": "{{ $service->parent->title }}",
        "item": "{{ route('service', $service->parent->slug) }}"
        },
        {
        "@@type": "ListItem",
        "position": 3,
        "name": "{{ $service->title }}",
        "item": "{{ url()->current() }}"
        }
        @else
        {
        "@@type": "ListItem",
        "position": 2,
        "name": "{{ $service->title }}",
        "item": "{{ url()->current() }}"
        }
        @endif
    ]
    }
    @if(count($faqs))
    ,{
    "@@type": "FAQPage",
    "mainEntity": [
        @foreach($faqs as $faq)
        {
        "@@type": "Question",
        "name": "{{ $faq['question'] }}",
        "acceptedAnswer": {
            "@@type": "Answer",
            "text": "{{ strip_tags($faq['answer']) }}"
        }
        }@if(!$loop->last),@endif
        @endforeach
    ]
    }
    @endif
]
}
</script>
@endsection

@section('content')
    {{-- @include('temp.pricing') --}}
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
