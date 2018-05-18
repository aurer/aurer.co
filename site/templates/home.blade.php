@extends('layouts/default')

@section('h1')
	<h1>{!! $page->strapline()->kirbytext() !!}</h1>
@endsection

@section('primary')
	<div class="Page-caption">
		{!! $page->text()->kirbytext() !!}
	</div>

	<h2>Get in touch</h2>
	<ul class="Social">
		@foreach($site->networks()->toStructure() as $link)
			<li><a href="{{ $link->url() }}" class="Social-link">{{ $link->title() }}</a></li>
		@endforeach
	</ul>

	<h2>Latest resources</h2>
	<ul>
		@foreach(page('resources')->children() as $resource)
			<li><a href="{{ $resource->url() }}">{{ $resource->title() }}</a></li>
		@endforeach
	</ul>
@endsection
