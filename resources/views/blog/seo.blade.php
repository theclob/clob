<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ $options->title }}" />
<meta name="twitter:site" content="@theclob" />
@if(request()->route()->getName() === 'blog.index')
	<meta property="og:title" content="{{ $options->title }}" />
	<meta property="og:description" content="{{ str_replace(["\r", "\n"], ' ', $options->description) }}" />
	{{-- <meta property="og:image" content="https://kellysundbergcom.files.wordpress.com/2016/03/cropped-arrest1.jpg" />
	<meta property="og:image:width" content="300" />
	<meta property="og:image:height" content="300" /> --}}
	<meta name="description" content="{{ str_replace(["\r", "\n"], ' ', $options->description) }}" />
@else
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ $post->seo_title or str_limit($post->title, 57) }}" />
	<meta property="og:description" content="{{ $post->seo_description or str_replace(["\r", "\n"], ' ', str_limit(strip_tags($post->html_content), 297)) }}" />
	<meta property="article:published_time" content="{{ $post->published_at->toAtomString() }}" />
	<meta property="article:modified_time" content="{{ $post->updated_at->toAtomString() }}" />
	@if($post->seo_image_url)
		<meta property="og:image" content="{{ $post->seo_image_url }}" />
		<meta name="twitter:image" content="{{ $post->seo_image_url }}" />
	@endif
	<meta name="twitter:card" content="summary" />
	<meta name="description" content="{{ $post->seo_description or str_replace(["\r", "\n"], ' ', str_limit(strip_tags($post->html_content), 157)) }}" />
@endif