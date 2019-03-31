@extends('layouts/default')

@section('main')
	@include('partials/page-content')
	<nav class="Nav Nav--secondary">
		<ul class="Nav-list">
			@foreach ($page->children()->visible() as $child)
				<li class="Nav-item">
					<a href="{{ $child->url() }}">{{ $child->title() }}</a>
				</li>
			@endforeach
		</ul>
	</nav>
@endsection