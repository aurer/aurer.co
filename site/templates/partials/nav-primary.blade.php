<a href="#menu" class="Nav-open" title="Open menu">Menu</a>
<nav class="Nav Nav--primary" id="menu">
	<ul class="Nav-list">
		@foreach($pages->visible() as $item)
		<li class="Nav-item"><a class="Nav-item" {{ r($item->isOpen(), 'aria-current="page"') }} href="{{ $item->url() }}">{{ $item->title() }}</a></li>
		@endforeach
	</ul>
	<a href="#page" class="Nav-close" title="Close menu">Close</a>
</nav>
