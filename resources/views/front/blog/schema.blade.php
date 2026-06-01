@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "BlogPosting",
      "@@id": "{{ url()->current() }}",
      "mainEntityOfPage": {
        "@@type": "WebPage",
        "@@id": "{{ url()->current() }}"
      },
      "headline": "{{ $post->title }}",
      "description": "{{ $post->meta_description ?? $post->excerpt }}",
      "url": "{{ url()->current() }}",
      "datePublished": "{{ ($post->published_at ?? $post->created_at)->utc()->format('Y-m-d\TH:i:s+00:00') }}",
      "dateModified": "{{ $post->updated_at->utc()->format('Y-m-d\TH:i:s+00:00') }}",
      @if($post->thumbnail_url)
      "image": "{{ $post->thumbnail_url }}",
      @endif
      "author": {
        "@@type": "Person",
        "name": "{{ $post->author?->name ?? $post->author_name ?? 'Blue Orbit' }}",
        @if($post->author?->linkedin_url)
        "url": "{{ $post->author->linkedin_url }}",
        @endif
        @if($post->author?->image)
        "image": "{{ asset('storage/' . $post->author->image) }}"
        @else
        "image": "{{ asset('images/logo.jfif', true) }}"
        @endif
      },
      "publisher": {
        "@@type": "Organization",
        "name": "Blue Orbit Digital Agency",
        "url": "https://blueorbitdigitalagency.com",
        "logo": {
          "@@type": "ImageObject",
          "url": "{{ asset('images/logo.jfif', true) }}"
        }
      }
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
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Blogs",
          "item": "{{ route('blog.index') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "{{ $post->title }}",
          "item": "{{ url()->current() }}"
        }
      ]
    }
  ]
}
</script>
@endsection