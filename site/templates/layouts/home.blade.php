<!DOCTYPE html>
<html lang="en">
<head>
  @include('inc/head')
</head>
<body>
	<div class="Page">
		<header class="Section Section--mast">
			<div class="Section-inner">
				@include('inc/nav-primary')
			</div>
		</header>
    <div class="Section Section--Strapline">
      <div class="Section-inner">
        @yield('strapline')
      </div>
    </div>
		@include('inc/primary')
	</div>
	@include('inc/foot')
</body>
</html>
