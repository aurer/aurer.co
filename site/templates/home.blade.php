@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}

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
