@component('components/section', ['type' => 'header', 'name' => 'mast'])
	@section('mast')
		@include('partials/breadcrumbs')	
		<h1>{{ $page->title() }}</h1>
	@show
@endcomponent