<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ $options->title }}" />
<meta name="twitter:site" content="{{ '@' . config('app.twitter_username') }}" />
@if(request()->route()->getName() === 'blog.index')
	<meta property="og:title" content="{{ $options->title }}" />
	<meta property="og:description" content="{{ $options->description_trimmed }}" />
	{{-- TODO image --}}
	<meta name="description" content="{{ $options->description_trimmed }}" />
@else
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ $post->seo_title or $post->title_opengraph }}" />
	<meta property="og:description" content="{{ $post->seo_description or $post->html_content_opengraph }}" />
	<meta property="article:published_time" content="{{ $post->published_at_opengraph_format }}" />
	<meta property="article:modified_time" content="{{ $post->updated_at_opengraph_format }}" />
	@if($post->seo_image_url)
		<meta property="og:image" content="{{ $post->seo_image_url }}" />
		<meta name="twitter:image" content="{{ $post->seo_image_url }}" />
	@endif
	<meta name="twitter:card" content="summary" />
	<meta name="description" content="{{ $post->seo_description or $post->html_content_meta_description }}" />
@endif