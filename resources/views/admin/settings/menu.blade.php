<div class="list-group-header visible-xs">@lang('admin.settings.menu')</div>
<div class="list-group">
	<a href="{{ route('admin.settings.blog') }}"
		class="list-group-item @if(request()->route()->getName() === 'admin.settings.blog') active @endif">
		@lang('admin.settings.blog.title')
	</a>
	<a href="{{ route('admin.settings.social_links.index') }}"
		class="list-group-item @if(request()->route()->getName() === 'admin.settings.social_links.index') active @endif">
		@lang('admin.settings.social_links.title')
	</a>
	<a href="{{ route('admin.settings.user') }}"
		class="list-group-item @if(request()->route()->getName() === 'admin.settings.user') active @endif">
		@lang('admin.settings.user.title')
	</a>
	<a href="{{ route('admin.settings.password') }}"
		class="list-group-item @if(request()->route()->getName() === 'admin.settings.password') active @endif">
		@lang('admin.settings.password.title')
	</a>
</div>