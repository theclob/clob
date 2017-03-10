<p class="social">
	@foreach($social_links as $link)
		<a href="{{ $link->url }}" target="_blank" title="{{ ucfirst($link->type) }}">
			@include('blog.themes.default._partials.social.' . $link->type)
		</a>
	@endforeach
</p>