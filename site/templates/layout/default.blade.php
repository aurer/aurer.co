<!DOCTYPE html>
<html lang="en">
<head>
	@include('partial/head')
</head>
<body>
	<div class="Page">
		<header class="Page-header">
			@include('partial/nav-primary')
			@section('h1')
				<h1>@kt($page->title())</h1>
			@show
		</header>
		<main class="Page-main">
			@yield('main')
		</main>
		<footer class="Page-footer"></footer>
	</div>
</body>
</html>
