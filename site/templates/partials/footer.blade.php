@component('components/section', ['type' => 'footer', 'name' => 'footer'])
	<div class="Page-copyright">&copy; Phil Maurer</div>
	<nav class="Nav Nav--footer">
		<ul class="Nav-list">
			@foreach ($pages->filterBy('in_footer', 'true') as $item)
				<li class="Nav-item {{ r($item->isOpen(), 'is-active') }}"><a href="{{ $item->url() }}">{{ $item->title() }}</a></li>
			@endforeach
		</ul>
	</nav>
@endcomponent