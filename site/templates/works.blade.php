@extends('layouts/default')

@section('main')
	@include('partials/page-content')
	<nav class="Items Items--work">
		@foreach ($page->children()->visible() as $child)
			<div class="Item">
				<a class="Item-link" href="{{ $child->url() }}">
					@if ($child->cover())
						{!! $child->cover()->toFile() !!}
					@endif
					<h2>{{ $child->title() }}</h2>
				</a>
			</div>
		@endforeach
	</nav>
@endsection