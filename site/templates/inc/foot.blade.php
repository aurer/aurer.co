<footer class="Section Section--footer">
	<div class="Section-inner">
		<nav class="Nav Nav--footer" id="footer-menu">
			<ul class="Nav-list">
				@foreach($pages->filterBy('show_in_footer', '==', 'true') as $item)
					<li class="Nav-item"><a class="Nav-item {{ r($item->isOpen(), 'is-active') }}" href="{{ $item->url() }}">{{ $item->title() }}</a></li>
				@endforeach
			</ul>
			<a href="#page" class="Nav-close" title="Close menu">Close</a>
		</nav>
		<div class="Page-legal">
			<strong>{{ html::decode($site->copyright()->kirbytext()) }}</strong>
		</div>
	</div>
</footer>
<script src="/assets/js/main.js"></script>
