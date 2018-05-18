@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}
	<section class="Items Items--resources">
		@foreach($resources as $resource)
			<article class="Item">
				<h2><a href="{{ $resource->url() }}" class="Social-link">{{ $resource->title() }}</a></h2>
				<footer class="Item-tags">
					@foreach($resource->tags()->split(',') as $tag)
						<a href="{{ url('resources/' . url::paramsToString(['tag' => $tag]))}}">{{ $tag }}</a>
					@endforeach
				</footer>
			</article>
		@endforeach
	</section>
@endsection
