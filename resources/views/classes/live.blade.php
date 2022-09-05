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
	        <h5>{{ $totalUsers }}</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-users.svg') }}"> Current Users </h3>
	        <h5>{{ $currentUsers }}</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-clock-white.svg') }}"> Total time </h3>
	        <h5>{{ $totalTime }}</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-heart.svg') }}"> Total interaction  </h3>
	        <h5>{{ $totalInteraction }}</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-task-completed.svg') }}"> Total completed  </h3>
	        <h5>{{ $totalCompleted }}</h5>
	    </div>
	</div>
@stop

@section('content')
	<div class="live-classes">
		<div class="live-all-class">
		    @foreach ($classes as $key => $class)
		    	<!-- start of one class box  -->
			    <div class="class-box">
			        <div class="cls-top">
			            <h2>{{ $class['classNickname'] }}</h2>
			            <div class="btn-box">
			                <a class="btn-publish-status" href="#"><img src="{{ asset('img/icon-published.svg') }}"> {{ \App\Models\Classes::PUBLISHED }}</a>
			                <a class="btn-details-status" href="#" role="button" id="dropdown-{{$key }}" data-toggle="dropdown" aria-expanded="false"><img src="{{ asset('img/details-drop-icon.svg')}}"></a>
	                        <div class="dropdown-menu" aria-labelledby="dropdown-{{$key }}">
	                            <a class="dropdown-item" href="{{ route('classes.live-class', $class['classId']) }}">Class Summary</a>
	                            <a class="dropdown-item" href="#">Action</a>
	                            <a class="dropdown-item" href="#">Another action</a>
	                        </div>
			            </div>
			        </div>

			        <div class="cls-bottom-details-box">
			            <a class="btn-date" href="#"><img src="{{ asset('img/icon-calander.svg') }}" > {{ date('j F Y', strtotime($class['classDate'] ?? null)) }}</a>
			            <a class="btn-clock" href="#"><img src="{{ asset('img/icon-clock.svg') }}" > {{ str_replace('m', 'mins ', str_replace('s', 'secs ', ($class['classTime'] ?? '0m0s'))) }}</a>
			            <a class="btn-beg-stage" href="#"><img src="{{ asset('img/icon-beg-stage.svg') }}"> {{ $class['fitnessLevel'] ?? '' }}</a>
			            <a class="btn-mindfulness" href="#"><img src="{{ asset('img/icon-mindfulness.svg') }}"> {{ $class['categoryName'] ?? '' }}</a>
			        </div>
			    </div>
		    	<!-- end of one class box  -->
		    @endforeach

		    <!-- start of one class box  -->
		    {{-- <div class="class-box">
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
		    </div> --}}
		    <!-- end of one class box  -->

		    <!-- start of one class box  -->
		    {{-- <div class="class-box">
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
		    </div> --}}
		    <!-- end of one class box  -->
		</div>
	</div>
@stop
