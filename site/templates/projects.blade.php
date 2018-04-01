@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}
	<nav class="Items Items--work">
		@foreach($page->children()->visible() as $project)
			<div class="Item">
				<h2><a href="{{ $project->url() }}" class="">{{ $project->title() }}</a></h2>
			</div>
		@endforeach
	</nav>
@endsection
