@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}
	<section class="Items Items--work">
		@foreach($page->children()->visible() as $item)
			<article class="Item">
				<div class="Item-info">
					<h2 class="Item-title"><a href="{{ $item->url() }}">{{ $item->title() }}</a></h2>
					<ul>
						@foreach($item->features()->toStructure() as $feature)
							<li>{{ $feature }}</li>
						@endforeach
					</ul>
				</div>
				<a href="{{ $item->url() }}" class="Item-image">
					{{ picture($item->image($item->cover())->thumb(['width' => 500])) }}
				</a>
			</article>
		@endforeach
	</section>
@endsection
