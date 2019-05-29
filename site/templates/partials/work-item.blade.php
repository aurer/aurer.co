<div class="Item">
	<a class="Item-link" href="{{ $child->url() }}">
		@if ($child->cover())
			{!! $child->cover()->toFile(['alt' => 400]) !!}
		@endif
		<h2>{{ $child->title() }}</h2>
	</a>
</div>