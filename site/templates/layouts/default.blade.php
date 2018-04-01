<!DOCTYPE html>
<html lang="en">
<head>
  @include('inc/head')
</head>
<body>
	<div class="Page Page--{{ $page->slug() }}" id="page">
		<div class="Section Section--mast">
			<div class="Section-inner">
				<a href="{{ $site->url() }}" title="Home" class="Page-logo"><img src="/assets/images/aurer-logo.svg" alt="Aurer"></a>
				@include('inc/nav-primary')
			</div>
		</div>
		@include('inc/primary')
	</div>
	@include('inc/foot')
</body>
</html>
