@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Messages', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Messages', 'link' => ''),
			], 
		'buttons' => []
		])
@stop

@section('content')
	Messages
@stop
