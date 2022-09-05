@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Class Builder', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Class Builder', 'link' => '#'),
            array('label' => 'Record Voice', 'link' => ''),
			], 
		'buttons' => [
			array('label' => 'Discrade', 'classes' => 'btn-discrade', 'link' => route('classes.builder.index'), 'icon' => asset('img/discrade-icon.svg')),
			array('label' => 'Save', 'classes' => 'btn-save', 'link' => '', 'icon' => asset('img/save-icon.svg'))
			]
		])
@stop

@section('content')
	<!-- start of time line bar  -->
	<div class="top-process-bar-box">
	    <div class="progress">
	        <!-- <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div> -->
	    </div>

	    <div class="time-line">
	        <div class="time-box">
                <div class="time-finished-active">
                    <div class="inner-finished-active">
	                    <img src="{{ asset('img/icon-flag-next.svg') }}">
	                </div>
	            </div>
	            <h4>Class Summary</h4>
	        </div>

            <div class="time-box">
                <div class="time-finished-active">
                    <div class="inner-finished-active">
	                    <img src="{{ asset('img/icon-flag-next.svg') }}">
	                </div>
	            </div>
                <h4>Plan Your Class</h4>
            </div>

	        <div class="time-box">
	            <div class="time-finished-active">
                    <div class="inner-finished-active">
	                    <img src="{{ asset('img/icon-flag-next.svg') }}">
	                </div>
	            </div>
	            <h4>Add Music</h4>
	        </div>

	        <div class="time-box">
	            <div class="time-active">
                    <div class="inner-time">
                        <img src="{{ asset('img/dots-horizonral-icon.svg') }}">
                    </div>
                </div>
	            <h4>Record Voice</h4>
	        </div>

	        <div class="time-box">
	            <div class="time-unactive">
	                <div class="inner-untime"></div>
	            </div>
	            <h4>Submit</h4>
	        </div>
	    </div>
	</div>
	<!-- End of time line bar  -->

	<div class="record-voice-class-section">
	    <h2>Record Voice</h2>

        <div class="record-run-time">
            <h3>Total Time</h3>
            <h4> <img src="{{ asset('img/record-running-icon.svg') }}"> 02:23:00</h4>
        </div>

        <div class="record-box">
            <div class="rec-body">
                <div class="rec-head">
                    <h2>Section 01</h2>
                    <div class="btn-grp">
                        <a   class="btn-recording"> Recording</a>
                        <h3>02:23:00</h3>
                    </div>
                </div>

                <h4><img src="{{ asset('img/icon-clock.svg') }}"> 3 mins</h4>
            </div>

            <div class="progress">
                <div class="progress-bar bar-rec" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
        </div>

        <div class="record-box">
            <div class="rec-body">
                <div class="rec-head">
                    <h2>Section 01</h2>
                    <h3>02:23:00</h3>
                </div>

                <h4><img src="{{ asset('img/icon-clock.svg') }}"> 3 mins</h4>
            </div>

            <div class="progress">
                <div class="progress-bar bar-rec" role="progressbar" style="width: 95%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>

        <div class="record-box">
            <div class="rec-body">
                <div class="rec-head">
                    <h2>Section 01</h2>
                    <h3>02:23:00</h3>
                </div>

                <h4><img src="{{ asset('img/icon-clock.svg') }}"> 3 mins</h4>
            </div>

            <div class="progress">
                <div class="progress-bar bar-rec" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>

	    <div class="btn-grp-pr">
	        <a href="{{ route('classes.builder.music') }}" class="btn-back"> Back</a>
	        <a type="submit" href="{{ route('classes.builder.submit') }}" class="btn-next"><img src="{{ asset('img/next-icon.svg') }}"> Next</a>
	    </div>
	</div>
@stop
