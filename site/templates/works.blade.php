@extends('layouts/default')

@section('main')
	@include('partials/page-content')
	<nav class="Items Items--work">
		@foreach ($page->children()->flip()->visible() as $child)
			@include('partials/work-item')
		@endforeach
	</nav>
@endsection