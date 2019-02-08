@extends('layout/default')

@section('main')
	@kt( $page->text()->kirbytext() )
@endsection