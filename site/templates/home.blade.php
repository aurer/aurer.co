@extends('layout/default')

@section('main')
	@kt( $page->text()->kirbytext() )
	<div class="Items Items--work">
		@foreach (page('work')->children()->visible()->limit(4) as $item)
			<div class="Item">
				<h2><a href="{{ $item->url() }}">{{ $item->title() }}</a></h2>
		</div>		
		@endforeach
	</div>
@endsection