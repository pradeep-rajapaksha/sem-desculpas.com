@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Class Builder', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Class Builder', 'link' => '#'),
            array('label' => 'Add Music', 'link' => ''),
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
	            <div class="time-active">
                    <div class="inner-time">
                        <img src="{{ asset('img/dots-horizonral-icon.svg') }}">
                    </div>
                </div>
	            <h4>Add Music</h4>
	        </div>

	        <div class="time-box">
	            <div class="time-unactive">
	                <div class="inner-untime"></div>
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

	<div class="class-music-section">
	    <h2>Add Music</h2>

        <div class="spootify-search-box">
            <div class="head-title">
                <h2>Search for your music on</h2>
                <img src="{{ asset('img/logo-spotify.svg') }}">
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-search" type="button" id="button-addon2"><img
                            src="{{ asset('img/icon-search.svg') }}"></button>
                </div>
            </div>
        </div>

        <div class="tracks-section-display">
            <!-- start of a track box -->
            <div class="track-box">
                <div class="head">
                    <h3 class="head-title"><img src="{{ asset('img/section-list-item.svg') }}"> Track 02</h3>

                    <div class="btn-grp">
                        <a href="" class="delete-btn-icon">
                            <img src="{{ asset('img/icon-delete.svg') }}">
                        </a>
                        <a href="" class="btn-upload">Upload Music</a>
                    </div>
                </div>

                <div class="body-track">
                    <h4>Twin Forks</h4>
                    <h5>Can’t be broken</h5>
                    <h6>Album Name</h6>
                </div>
            </div>
            <!-- end of a track box -->

            <!-- start of a track box -->
            <div class="track-box">
                <div class="head">
                    <h3 class="head-title"><img src="{{ asset('img/section-list-item.svg') }}"> Track 03</h3>

                    <div class="btn-grp">
                        <a href="" class="delete-btn-icon">
                            <img src="{{ asset('img/icon-delete.svg') }}">
                        </a>
                        <a href="" class="btn-play">Play</a>
                    </div>
                </div>

                <div class="body-track">
                    <h4>Twin Forks</h4>
                    <h5>Can’t be broken</h5>
                    <h6>Album Name</h6>
                </div>
            </div>
            <!-- end of a track box -->

            <!-- start of a track box -->
            <div class="track-box">
                <div class="head">
                    <h3 class="head-title"><img src="{{ asset('img/section-list-item.svg') }}"> Track 04</h3>

                    <div class="btn-grp">
                        <a href="" class="delete-btn-icon">
                            <img src="{{ asset('img/icon-delete.svg') }}">
                        </a>
                        <a href="" class="btn-play">Play</a>
                    </div>
                </div>

                <div class="body-track">
                    <h4>Twin Forks</h4>
                    <h5>Can’t be broken</h5>
                    <h6>Album Name</h6>
                </div>
            </div>
            <!-- end of a track box -->

		    <div class="btn-grp-pr">
		        <a href="{{ route('classes.builder.plan') }}" class="btn-back"> Back</a>
		        <a type="submit" href="{{ route('classes.builder.record') }}" class="btn-next"><img src="{{ asset('img/next-icon.svg') }}"> Next</a>
		    </div>
        </div>
	</div>
@stop
