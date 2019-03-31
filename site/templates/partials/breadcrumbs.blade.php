<nav class="Nav Nav--breadcrumbs">
	<ul class="Nav-list">
		@foreach ($site->breadcrumb()->filterBy('id', '!=', $page->id()) as $crumb)
			<li class="Nav-item">
				<a href="{{ $crumb->url() }}" title="{{ $crumb->title() }}">{{ $crumb->title() }}</a>
			</li>
		@endforeach
	</ul>
</nav>