<nav class="Nav Nav--primary">
	@foreach($pages->visible() as $item)
		<a class="Nav-item {{ r($item->isOpen(), 'is-active') }}" href="{{ $item->url() }}">{{ $item->title() }}</a>
	@endforeach
</nav>
