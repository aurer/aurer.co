@extends('layouts/home')

@section('main')
	@component('components/section', ['name' => 'resources'])
		<div class="Items Items--resources">
			@foreach (page('resources')->children()->visible()->limit(3) as $item)
				<div class="Item">
					<h3><a href="{{ $item->url() }}">{{ $item->title() }}</a></h3>
					<p class="Item-description">{{ $item->summary() }}</p>
			</div>		
			@endforeach
		</div>
	@endcomponent
@endsection