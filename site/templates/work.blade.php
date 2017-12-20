@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}

	<div class="">
		@foreach($contentImages as $image)
			{{ figure($image) }}
		@endforeach
	</div>
@endsection
