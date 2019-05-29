@component('components/section', ['type' => 'footer', 'name' => 'footer'])
<nav class="Nav Nav--footer">
	<ul class="Nav-list">
		@foreach ($pages->filterBy('in_footer', 'true') as $item)
		<li class="Nav-item {{ r($item->isOpen(), 'is-active') }}"><a href="{{ $item->url() }}">{{ $item->title() }}</a></li>
		@endforeach
	</ul>
</nav>
<div class="Page-copyright">&copy; Phil Maurer {{ date('Y') }}</div>
@endcomponent