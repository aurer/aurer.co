<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials/head')
</head>
<body>
	<div class="Page Page--default">
		@include('partials/mast')
		@component('components/section', ['name' => 'h1'])
			@include('partials/breadcrumbs')
			@section('h1') <h1>{{ $page->title() }}</h1> @show
		@endcomponent
		
		@component('components/section', ['type' => 'main', 'name' => 'main'])
			@yield('main')
		@endcomponent

		@include('partials/footer')
	</div>
</body>
</html>