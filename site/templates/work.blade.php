@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}

	<div class="">
		@foreach($contentImages as $image)
			{{ figure($image) }}
		@endforeach
	</div>
	<script>
		document.querySelectorAll('img').forEach(img => {
			img.style.opacity = 0;
			img.addEventListener('load', function(){
				img.style.opacity = 1;
			});
		})
	</script>
@endsection
