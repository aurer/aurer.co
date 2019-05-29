<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials/head')
</head>
<body>
	<div class="Page Page--home">
		@include('partials/mast')
		
		@component('components/section', ['type' => 'main', 'name' => 'main'])
			@yield('main')
		@endcomponent
		
		@include('partials/footer')
	</div>
</body>
</html>
