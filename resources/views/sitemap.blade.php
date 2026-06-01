<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ url('/blogs') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach ($services as $service)
    <url>
        @if($service->parent_id)
            {{-- sub-service: /parent-slug/child-slug --}}
            <loc>{{ url('/' . $service->parent->slug . '/' . $service->slug) }}</loc>
            <priority>0.7</priority>
        @else
            {{-- parent service: /parent-slug --}}
            <loc>{{ url('/' . $service->slug) }}</loc>
            <priority>0.8</priority>
        @endif
        <lastmod>{{ $service->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    @endforeach

    @foreach ($posts as $post)
    <url>
        <loc>{{ url('/blog/' . $post->slug) }}</loc>
        <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

</urlset>