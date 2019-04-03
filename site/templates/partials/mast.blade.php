@component('components/section', ['type' => 'header', 'name' => 'header'])
	<div class="Page-mast">
		<a href="/" class="Page-logo"><img src="/assets/build/gfx/aurer-logo.svg" alt="Aurer"></a>
		@include('partials/nav-primary')
	</div>
	@include('partials/breadcrumbs')
	@section('h1') 
		<h1>{{ $page->isHomePage() ? $page->heading() : $page->title() }}</h1>
	@show
@endcomponent