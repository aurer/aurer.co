@extends('layouts/default')

@section('primary')
	{!! $page->text()->kirbytext() !!}
@endsection
