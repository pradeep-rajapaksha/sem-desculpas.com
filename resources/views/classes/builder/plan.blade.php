@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Class Builder', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Class Builder', 'link' => '#'),
            array('label' => 'Plan Your Class', 'link' => ''),
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
                <div class="time-active">
                    <div class="inner-time">
                        <img src="{{ asset('img/dots-horizonral-icon.svg') }}">
                    </div>
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

	<div class="plan-class">
	    <div class="accordion" id="accordionExample">
	        <div class="card">
	            <div class="card-header">
	                <h3 class="head-title"><img src="{{ asset('img/section-list-item.svg') }}"> Section 01</h3>

	                <div class="btn-grp">
	                    <a href="" class="delete-btn-icon">
	                        <img src="{{ asset('img/icon-delete.svg') }}">
	                    </a>
	                    <button class="btn btn-dropdwn" type="button" data-toggle="collapse"
	                        data-target="#section1" aria-expanded="true">
	                        <img src="{{ asset('img/icon-drop-dow.svg') }}">
	                    </button>
	                </div>
	            </div>

	            <div id="section1" class="collapse show" data-parent="#accordionExample">
	                <div class="card-body">
	                    <form>
	                        <div class="form-row">
	                            <div class="form-group col-md-12">
	                                <label>Class Name</label>
	                                <input type="text" class="form-control" id="classname">
	                            </div>
	                        </div>

	                        <div class="form-row">
	                            <div class="form-group col-md-12">
	                                <label>Section Description </label>
	                                <textarea class="form-control" id="exampleFormControlTextarea1"
	                                    rows="3"></textarea>
	                            </div>
	                        </div>

	                        <div class="form-row">
	                            <div class="form-group col-md-6">
	                                <label>Section Time (mins)</label>
	                                <select id="" class="form-control">
	                                    <option selected>20</option>
	                                    <option>30</option>
	                                </select>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>

	        <div class="card">
	            <div class="card-header">
	                <h3 class="head-title"><img src="{{ asset('img/section-list-item.svg') }}"> Section 02</h3>

	                <div class="btn-grp">
	                    <a href="" class="delete-btn-icon">
	                        <img src="{{ asset('img/icon-delete.svg') }}">
	                    </a>
	                    <button class="btn btn-dropdwn" type="button" data-toggle="collapse"
	                        data-target="#section2" aria-expanded="true">
	                        <img src="{{ asset('img/icon-drop-dow.svg') }}">
	                    </button>
	                </div>
	            </div>

	            <div id="section2" class="collapse " data-parent="#accordionExample">
	                <div class="card-body">
	                    <form>
	                        <div class="form-row">
	                            <div class="form-group col-md-12">
	                                <label>Class Name</label>
	                                <input type="text" class="form-control" id="classname">
	                            </div>
	                        </div>

	                        <div class="form-row">
	                            <div class="form-group col-md-12">
	                                <label>Section Description </label>
	                                <textarea class="form-control" id="exampleFormControlTextarea1"
	                                    rows="3"></textarea>
	                            </div>
	                        </div>

	                        <div class="form-row">
	                            <div class="form-group col-md-6">
	                                <label>Section Time (mins)</label>
	                                <select id="" class="form-control">
	                                    <option selected>20</option>
	                                    <option>30</option>
	                                </select>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- start of add new section section  -->
	    <div class="new-class-add">
	        <a href="#"><img src="{{ asset('img/icon-add-section.svg') }}"> Add new section </a>
	    </div>
	    <!-- End of add new section section  -->

	    <div class="btn-grp-pr">
	        <a href="{{ route('classes.builder.summary') }}" class="btn-back"> Back</a>
	        <a type="submit" href="{{ route('classes.builder.music') }}" class="btn-next"><img src="{{ asset('img/next-icon.svg') }}"> Next</a>
	    </div>
	</div>
@stop
