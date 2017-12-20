@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}
	<nav class="Items Items--work">
		@foreach($page->children()->visible() as $work)
			<div class="Item">
				<a href="{{ $work->url() }}" class="Social-link">
					<p>{{ $work->title() }}</p>
					{{ picture($work->image($work->cover())->thumb(['width' => 500])) }}
				</a>
			</div>
		@endforeach
	</nav>
@endsection
