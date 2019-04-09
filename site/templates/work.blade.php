@extends('layouts/default')

@section('main')
	@if ($page->hero())
		<div class="Page-hero">
			{!! $page->hero()->toFile() !!}
		</div>
	@endif
	@include('partials/page-content')
	<div class="Gallery">
		<div class="Grid Grid--spaced">
			@foreach ($page->gallery()->toFiles() as $image)
				<div class="Grid-cell u-md-size1of2">
					{{ snippet('figure', ['image' => $image]) }}
				</div>
			@endforeach
		</div>
	</div>
@endsection