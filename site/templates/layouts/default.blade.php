<!DOCTYPE html>
<html lang="en">
<head>
  @include('inc/head')
</head>
<body>
	<div class="Page Page--{{ $page->slug() }}" id="page">
	  @include('inc/mast')
		@include('inc/primary')
	</div>
	@include('inc/foot')
</body>
</html>
