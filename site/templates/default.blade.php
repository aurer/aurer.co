@extends('layouts/default')

@section('main')
	@include('partials/page-content')
	<nav class="Items">
		@foreach ($page->children()->visible() as $child)
			<div class="Item">
				<a class="Item-link" href="{{ $child->url() }}">{{ $child->title() }}</a>
			</div>
		@endforeach
	</nav>
@endsection