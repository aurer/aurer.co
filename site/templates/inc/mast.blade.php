<div class="Section Section--mast">
	<div class="Section-inner">
		<a href="{{ $site->url() }}" title="Home" class="Page-logo"><img src="/assets/images/aurer-logo.svg" alt="Aurer"></a>
		@include('inc/nav-primary')
		<div class="Page-title">
			<div class="Page-title-inner">
				@section('h1')
					<nav class="Page--breadcrumbs">
						@if($page->depth() > 1)
							<a href="{{ $page->parent()->url() }}">{{ $page->parent()->title() }}</a>
						@endif
					</nav>
					<h1>{{ $page->title() }}</h1>
				@show()
			</div>
		</div>
	</div>
</div>
