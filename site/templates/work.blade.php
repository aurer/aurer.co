@extends('layouts/default')

@section('primary')
	{{ image($page->hero()) }}

	{!! $page->text()->kirbytext() !!}

	<div class="">
		@foreach($page->gallery() as $image)
			{{ figure($image) }}
		@endforeach
	</div>
@endsection
