@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}
	<ul class="Social">
		@foreach($site->networks()->toStructure() as $link)
			<li><a href="{{ $link->url() }}" class="Social-link">{{ $link->title() }}</a></li>
		@endforeach
	</ul>
@endsection
