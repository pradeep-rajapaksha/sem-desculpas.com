@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Profile', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Profile', 'link' => ''),
			], 
		'buttons' => []
		])
@stop

@section('content')
	Profile
@stop
