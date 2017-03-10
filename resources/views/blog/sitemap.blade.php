<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc>{{ route('blog.index') }}</loc>
		<changefreq>weekly</changefreq>
		<priority>1.0</priority>
	</url>
    @foreach($pages as $page)
        <url>
            <loc>{{ route('blog.show', $page) }}</loc>
            <lastmod>{{ $page->updated_at_open_graph_format }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach($posts as $post)
        <url>
            <loc>{{ route('blog.show', $post) }}</loc>
            <lastmod>{{ $post->published_at_open_graph_format }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>