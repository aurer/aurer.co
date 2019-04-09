<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials/head')
</head>
<body>
	<div class="Page Page--home">
		@include('partials/mast')
		
		@yield('before-main')
		@component('components/section', ['type' => 'main', 'name' => 'main'])
			@yield('main')
		@endcomponent
		@yield('after-main')
		
		@include('partials/footer')
	</div>
</body>
</html>
