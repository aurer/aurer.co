@extends('layouts/home')

@section('mast')
	<h1>{{ $page->heading() }}</h1>
	@kt( $page->text()->kirbytext() )
@endsection

@section('main')
	<h2>Projects</h2>
	<div class="Items Items--projects">
		@foreach (page('projects')->children()->visible()->limit(3) as $item)
			<div class="Item">
				<a class="Item-link" href="{{ $item->url() }}">
					<h2 class="Item-title">{{ $item->title() }}</h2>
					<p class="Item-summary">{{ $item->summary() }}</p>
				</a>
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
