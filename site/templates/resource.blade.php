@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}
	<div class="Item-tags">
		@foreach($page->tags()->split(',') as $tag)
			<a href="{{ url('resources/' . url::paramsToString(['tag' => $tag]))}}">{{ $tag }}</a>
		@endforeach
	</div>
@endsection
