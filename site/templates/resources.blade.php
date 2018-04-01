@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}
	<nav class="Items Items--resource">
		@foreach($resources as $resource)
			<div class="Item">
				<h2><a href="{{ $resource->url() }}" class="Social-link">{{ $resource->title() }}</a></h2>
				<div class="Item-tags">
					@foreach($resource->tags()->split(',') as $tag)
						<a href="{{ url('resources/' . url::paramsToString(['tag' => $tag]))}}">{{ $tag }}</a>
					@endforeach
				</div>
			</div>
		@endforeach
	</nav>
@endsection
