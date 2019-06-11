@extends('layouts/default')

@section('main')
	@include('partials/page-content')
	<nav class="Items Items--projects">
		@foreach ($page->children()->visible() as $item)
			<div class="Item">
				<a class="Item-link" href="{{ $item->url() }}">
					<h2 class="Item-title">{{ $item->title() }}</h2>
					<p class="Item-summary">{{ $item->summary() }}</p>
				</a>
			</div>
		@endforeach
	</nav>
@endsection