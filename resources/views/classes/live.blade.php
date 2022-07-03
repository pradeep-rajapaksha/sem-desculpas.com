@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Live Classes', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Live Classes', 'link' => ''),
			], 
		'buttons' => []
		])
@stop

@section('page-analytic-box')
	<div class="analytic-box">
		<div class="info-box">
	        <h3> <img src="{{ asset('img/icon-users.svg') }}"> Total Users </h3>
	        <h5>423</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-users.svg') }}"> Current Users </h3>
	        <h5>12</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-clock-white.svg') }}"> Total time </h3>
	        <h5>4:23:42:20</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-heart.svg') }}"> Total interaction  </h3>
	        <h5>265</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-task-completed.svg') }}"> Total completed  </h3>
	        <h5>265</h5>
	    </div>
	</div>
@stop

@section('content')
	<div class="live-classes">
		<div class="live-all-class">
		    <!-- start of one class box  -->
		    <div class="class-box">
		        <div class="cls-top">
		            <h2>Aenean et blandit ante</h2>
		            <div class="btn-box">
		                <a class="btn-publish-status" href=""><img src="{{ asset('img/icon-published.svg') }}"> Published</a>
		                <a class="btn-details-status" href=""><img src="{{ asset('img/details-drop-icon.svg') }}"> </a>
		            </div>
		        </div>

		        <div class="cls-bottom-details-box">
		            <a class="btn-date" href=""><img src="{{ asset('img/icon-calander.svg') }}" > 20 January 2021</a>
		            <a class="btn-clock" href=""><img src="{{ asset('img/icon-clock.svg') }}" > 32 mins</a>
		            <a class="btn-beg-stage" href=""><img src="{{ asset('img/icon-beg-stage.svg') }}"> Beginner</a>
		            <a class="btn-mindfulness" href=""><img src="{{ asset('img/icon-mindfulness.svg') }}"> Mindfulness</a>
		        </div>
		    </div>
		    <!-- end of one class box  -->

		    <!-- start of one class box  -->
		    <div class="class-box">
		        <div class="cls-top">
		            <h2>Aenean et blandit ante</h2>
		            <div class="btn-box">
		                <a class="btn-publish-status" href=""><img src="{{ asset('img/icon-published.svg') }}"> Published</a>
		                <a class="btn-details-status" href=""><img src="{{ asset('img/details-drop-icon.svg') }}"> </a>
		            </div>
		        </div>

		        <div class="cls-bottom-details-box">
		            <a class="btn-date" href=""><img src="{{ asset('img/icon-calander.svg') }}" > 20 January 2021</a>
		            <a class="btn-clock" href=""><img src="{{ asset('img/icon-clock.svg') }}" > 32 mins</a>
		            <a class="btn-beg-stage" href=""><img src="{{ asset('img/icon-beg-stage.svg') }}"> Beginner</a>
		            <a class="btn-mindfulness" href=""><img src="{{ asset('img/icon-mindfulness.svg') }}"> Mindfulness</a>
		        </div>
		    </div>
		    <!-- end of one class box  -->

		    <!-- start of one class box  -->
		    <div class="class-box">
		        <div class="cls-top">
		            <h2>Aenean et blandit ante</h2>
		            <div class="btn-box">
		                <a class="btn-publish-status" href=""><img src="{{ asset('img/icon-published.svg') }}"> Published</a>
		                <a class="btn-details-status" href=""><img src="{{ asset('img/details-drop-icon.svg') }}"> </a>
		            </div>
		        </div>

		        <div class="cls-bottom-details-box">
		            <a class="btn-date" href=""><img src="{{ asset('img/icon-calander.svg') }}" > 20 January 2021</a>
		            <a class="btn-clock" href=""><img src="{{ asset('img/icon-clock.svg') }}" > 32 mins</a>
		            <a class="btn-beg-stage" href=""><img src="{{ asset('img/icon-beg-stage.svg') }}"> Beginner</a>
		            <a class="btn-mindfulness" href=""><img src="{{ asset('img/icon-mindfulness.svg') }}"> Mindfulness</a>
		        </div>
		    </div>
		    <!-- end of one class box  -->
		</div>
	</div>
@stop
