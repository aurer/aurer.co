@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}
	<section class="Items Items--projects">
		@foreach($page->children()->visible() as $project)
			<article class="Item">
				<h2><a href="{{ $project->url() }}" class="">{{ $project->title() }}</a></h2>
			</article>
		@endforeach
	</section>
@endsection
