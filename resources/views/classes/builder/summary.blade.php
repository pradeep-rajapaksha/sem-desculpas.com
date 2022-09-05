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

	    <form action="{{ route('classes.builder.summary.next') }}" method="post" id="classes-builder-summary-form">
	    	@csrf
	    	
	        <div class="form-row">
	          	<div class="form-group col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
	            	<label >Class Name</label>
	            	<input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
	            	<small class="text-danger">{{ $errors->first('name') }}</small>
	          	</div>
	        </div>

	        <div class="form-row">
	            <div class="form-group col-md-12 {{ $errors->has('description') ? ' has-error' : '' }}">
	              	<label >Class Description</label>
	              	<textarea class="form-control" id="description" name="description" rows="3">{{old('description')}}</textarea>
	              	<small class="text-danger">{{ $errors->first('description') }}</small>
	            </div>
	        </div>

	        <div class="form-row">
	            <div class="form-group col-md-12 {{ $errors->has('category') ? ' has-error' : '' }}">
	                <label >Category</label>
	                <select id="category" name="category" class="form-control">
		                {{-- <option selected>Running</option> --}}
	                	@foreach ($categories as $category)
		                  	<option {{ old('category') == $category['title'] ? 'selected' : '' }} 
		                  		value="{{ $category['title']}}">{{ $category['title']}}</option>
	                	@endforeach
	                </select>
	                <small class="text-danger">{{ $errors->first('category') }}</small>
	            </div>
	        </div>

	        <div class="form-row">
	            <div class="form-group col-md-6 {{ $errors->has('difficulty') ? ' has-error' : '' }}">
	                <label >Class Difficulty</label>
	                <select id="difficulty" name="difficulty" class="form-control">
	                  	<option {{ old('difficulty') == 'Beginner' ? 'selected' : '' }} >Beginner</option>
	                  	<option {{ old('difficulty') == 'Pro' ? 'selected' : '' }} >Pro</option>
	                </select>
	                <small class="text-danger">{{ $errors->first('difficulty') }}</small>
	            </div>

	            <div class="form-group col-md-6 {{ $errors->has('musicStyle') ? ' has-error' : '' }}">
	                <label >Class Music Style</label>
	                <select id="musicStyle" name="musicStyle" class="form-control">
	                  	{{-- <option selected>Mindfulness</option> --}}
	                  	@foreach ($musicTypes as $type)
	                  		<option {{ old('musicStyle') == $type['title'] ? 'selected' : '' }} 
	                  			value="{{ $type['title']}}">{{ $type['title']}}</option>
	                  	@endforeach
	                </select>
	                <small class="text-danger">{{ $errors->first('musicStyle') }}</small>
	            </div>
	        </div>
	    </form>
        
        <div class="btn-grp">
            <a href="{{ route('classes.builder.index') }}" class="btn-back"> Back</a>
            <button onclick="$('#classes-builder-summary-form').submit();" type="submit" href="{{ route('classes.builder.plan') }}" class="btn-next"><img src="{{ asset('img/next-icon.svg') }}"> Next</button>
        </div>
	</div>
@stop
