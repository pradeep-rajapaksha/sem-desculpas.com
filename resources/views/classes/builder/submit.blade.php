@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Class Builder', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Class Builder', 'link' => '#'),
            array('label' => 'Submit', 'link' => ''),
			], 
		'buttons' => [
			array('label' => 'Discrade', 'classes' => 'btn-discrade', 'link' => route('classes.builder.index'), 'icon' => asset('img/discrade-icon.svg')),
			array('label' => 'Submit', 'classes' => 'btn-save', 'link' => '', 'icon' => asset('img/save-icon.svg'))
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
                        <img src="{{ asset('img/icon-flag-next.svg') }}">
                    </div>
                </div>
	            <h4>Record Voice</h4>
	        </div>

	        <div class="time-box">
	            <div class="time-active">
                    <div class="inner-time">
                        <img src="{{ asset('img/dots-horizonral-icon.svg') }}">
                    </div>
                </div>
	            <h4>Submit</h4>
	        </div>
	    </div>
	</div>
	<!-- End of time line bar  -->

	<div class="term-and-condition">
	    <h2>Terms & Conditions</h2>

	    <form action="{{ route('classes.builder.submit.next') }}" method="post" id="classes-builder-submit-form" enctype="multipart/form-data">
	    	@csrf
	    	
		    <div class="tc-box">
	            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lacinia feugiat
	                mollis. Morbi finibus et libero sit amet rutrum. Phasellus volutpat quam eget odio
	                rhoncus gravida. Donec posuere est vel purus elementum, vel auctor urna dapibus.
	                Morbi vel lacus nisi. Pellentesque viverra lacus facilisis lectus maximus accumsan.
	                Donec mattis enim augue, eu ultrices eros elementum a. Nunc ultricies massa turpis,
	                ut tempor nibh dictum sit amet. Pellentesque habitant morbi tristique senectus et
	                netus et malesuada fames ac turpis egestas. Morbi a auctor turpis. Maecenas sed
	                accumsan urna. Vestibulum iaculis velit sed ornare sodales. Class aptent taciti
	                sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
	            </p>

	            <p>
	                Nulla semper cursus justo eget scelerisque. Vestibulum ultrices, velit in imperdiet
	                blandit, metus velit aliquam ante, in pellentesque leo felis id velit. Aenean id
	                tortor vitae mi venenatis tempus. Etiam laoreet ultrices nunc, id ornare quam
	                blandit ac. Vivamus id augue at lorem malesuada tincidunt a sit amet nunc. Donec
	                viverra eget leo vitae malesuada. Fusce id justo est. Sed semper pulvinar laoreet.
	                Suspendisse vitae diam ut dui tempor aliquam id at lorem. Fusce id laoreet tellus,
	                at vehicula felis. Sed auctor ultrices sapien imperdiet iaculis. Nam rhoncus nibh
	                enim, sed dictum justo venenatis eu. Donec porta libero dictum, mattis tortor at,
	                egestas risus. Aenean viverra, ipsum ac laoreet fermentum, felis tortor vestibulum
	                augue, non ullamcorper nibh lacus sit amet justo. Sed mollis nulla a eleifend
	                elementum.
	            </p>

	        	<div class="form-group form-check">
		            <input type="checkbox" class="form-check-input" name="agree" id="agreeCheck">
		            <label class="form-check-label" for="agreeCheck">I agree</label>
	          	</div>
	        </div>
	    </form>

	    <div class="btn-grp-pr">
	        <a href="{{ route('classes.builder.record') }}" class="btn-back"> Back</a>
	        <button onclick="$('#classes-builder-submit-form').submit();" type="submit" href="{{ route('classes.builder.submit.next') }}" class="btn-next"><img src="{{ asset('img/next-icon.svg') }}"> Next</button>
	    </div>
	</div>
@stop
