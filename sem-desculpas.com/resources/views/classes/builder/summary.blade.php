@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Class Builder', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Class Builder', 'link' => '#'),
            array('label' => 'Class Summary', 'link' => ''),
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
	            <div class="time-active">
	                <div class="inner-time">
	                    <img src="{{ asset('img/dots-horizonral-icon.svg') }}">
	                </div>
	            </div>
	            <h4>Class Summary</h4>
	        </div>

	        <div class="time-box">
	            <div class="time-unactive">
	                <div class="inner-untime"></div>
	            </div>
	            <h4>Plan Your Class</h4>
	        </div>

	        <div class="time-box">
	            <div class="time-unactive">
	                <div class="inner-untime"></div>
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

	<div class="form-box">
	    <h2>Class summary</h3>

	    <form>
	        <div class="form-row">
	          	<div class="form-group col-md-12">
	            	<label >Class Name</label>
	            	<input type="text" class="form-control" id="classname">
	          	</div>
	        </div>

	        <div class="form-row">
	            <div class="form-group col-md-12">
	              	<label >Class Description</label>
	              	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	            </div>
	        </div>

	        <div class="form-row">
	            <div class="form-group col-md-12">
	                <label >Category</label>
	                <select id="" class="form-control">
	                  	<option selected>Running</option>
	                  	<option>Jumping</option>
	                </select>
	            </div>
	        </div>

	        <div class="form-row">
	            <div class="form-group col-md-6">
	                <label >Class Difficulty</label>
	                <select id="" class="form-control">
	                  	<option selected>Beginner</option>
	                  	<option>Pro</option>
	                </select>
	            </div>

	            <div class="form-group col-md-6">
	                <label >Class Music Style</label>
	                <select id="" class="form-control">
	                  	<option selected>Mindfulness</option>
	                  	<option>Soul</option>
	                </select>
	            </div>
	        </div>
	    </form>
        
        <div class="btn-grp">
            <a href="{{ route('classes.builder.index') }}" class="btn-back"> Back</a>
            <a type="submit" href="{{ route('classes.builder.plan') }}" class="btn-next"><img src="{{ asset('img/next-icon.svg') }}"> Next</a>
        </div>
	</div>
@stop
