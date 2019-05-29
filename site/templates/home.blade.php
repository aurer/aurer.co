@extends('layouts/home')

@section('main')
	<h2>Projects</h2>
	<div class="Items Items--projects">
		@foreach (page('projects')->children()->visible()->limit(3) as $item)
			<div class="Item">
				<a class="Item-link" href="{{ $item->url() }}">{{ $item->title() }}</a>
			</div>
		@endforeach
	</div>

	<h2>Get in touch...</h2>
	<div class="Items Items--networks">
		@foreach ($site->networks()->toStructure() as $item)
			<div class="Item">
				<a class="Item-link" href="{{ $item->url() }}" target="_blank" rel="noopener">
					<img src="/assets/build/gfx/icons/{{ $item->network() }}.svg" alt="{{ $item->network() }}" />
					<span>{{ ucfirst($item->network()) }}</span>
				</a>
			</div>
		@endforeach
	</div>
@endsection
