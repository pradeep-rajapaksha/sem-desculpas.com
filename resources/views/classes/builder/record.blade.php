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

	@php $musicData = request()->session()->get('class-builder-music-data') ?? []; @endphp
	@php $planData = request()->session()->get('class-builder-plan-data') ?? []; @endphp

	<div class="record-voice-class-section">
	    <h2>Record Voice</h2>

        <div class="record-run-time">
            <h3>Total Time</h3>
            <h4> <img src="{{ asset('img/record-running-icon.svg') }}" id="btn-recording" class=""> <span class="total-record-timer">00:00:00</span></h4>
        </div>

        <form action="{{ route('classes.builder.record.next') }}" method="post" id="classes-builder-record-form" enctype="multipart/form-data">
        	@csrf

	        @foreach ($planData as $key => $plan)
	        	<div class="record-box section-record-box" data-time="{{ $plan['time'] }}">
		            <div class="rec-body">
		                <div class="rec-head">
		                    <h2>{{ $plan['name'] ?? 'Section' }}</h2>
		                    <div class="btn-grp">
		                        <a class="btn-recording d-none" data-length="">Recording</a>
		                        {{-- <h3 >{{ @gmdate("H:i:s", $plan['time']*60) ?? "00:00:00"}}</h3> --}}
		                        <h3 class="section-record-timer-{{$key}}">00:00:00</h3>
		                    </div>
		                </div>

		                <h4><img src="{{ asset('img/icon-clock.svg') }}"> {{ $plan['time'] ?? '00' }} mins</h4>
		                <p>{{ $plan['description'] ?? '' }}</p>
		            </div>

		            <div class="progress">
		                <div class="progress-bar bar-rec section-progress-bar-{{$key}}" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
		            </div>
		        </div>
	        @endforeach
	        <input type="file" class="" name="audio-track" id="audio-track" />
        </form>

	    <div class="btn-grp-pr">
	        <a href="{{ route('classes.builder.music') }}" class="btn-back"> Back</a>
	        <button onclick="$('#classes-builder-record-form').submit();" type="submit" href="{{ route('classes.builder.submit') }}" class="btn-next"><img src="{{ asset('img/next-icon.svg') }}"> Next</button>
	    </div>
	</div>

<p>
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
</p>

	<script src="{{ asset('js/jquery.slim.min.js') }}"></script>
	<script src="{{ asset('js/record-audio.js') }}"></script>
	<script type="text/javascript">
        $(document).ready(function() {
	        var musicData = @php echo @json_encode($musicData); @endphp;
	        var planData = @php echo @json_encode($planData); @endphp;
	        var recorder, player;
            // console.log()
	        @php
	        	$totalTimeMin = @array_sum(array_map(function($section) {
		                                $time = class_time_in_seconds($section['time']);
		                                return $time;
		                            }, $planData)) ?? 0;
	        	// $totalTimeSec = gmdate("H:i:s", $totalTimeMin*60);
	        @endphp
	        var recordingTimerMin = "@php echo $totalTimeMin; @endphp";
	        var recordingTimerSec = "@php echo $totalTimeMin*60; @endphp";

	        var recordingTimer = 0; var totalRecordingTimerId;
	        var totalRecordingTimer = function () {
	        	let __time = new Date(recordingTimer * 1000).toISOString().slice(11, 19);
			  	$('.total-record-timer').text(__time);
			  	recordingTimer ++;
	        }

	        var sectionRecordingTimer = function () {
	        	console.log('sectionRecordingTimer')
	        	return new Promise((resolve, reject) => {
		        	$('.section-record-box').each(function(index) {
						(function(that, i) {
							let _timerSec = $(that).data('time');
				            setTimeout(function() {
				                console.log($(that), i, _timerSec * 1000 * i)
				                // console.log($(that), i)
				        		let _runTimer = setInterval(function() {
						        		if(_timerSec == 0) {
						        			clearInterval(_runTimer);
						        		}
				        				console.log('section-record-box', index, _timerSec)

					        			let __time = new Date(_timerSec * 1000).toISOString().slice(11, 19);
						        		$(that).find('.section-record-timer').text(__time);
						        		_timerSec--;
					        		}, 1000);
				            }, _timerSec * 1000 * i);
				        })(this, index);
		        	})
		        	// resolve()
	        	})
	        }

			$(document).on('click', '#btn-recording', function(event) {
				event.preventDefault();
                sectionRecordingTimer()
				let totalTime = 0
				let planTime = planData.reduce((n, {time}) => n + time*1, 0) // *60
				let sessionTimes = planData.map(({time}) => time)
				console.log(sessionTimes)
			  	let sessionTimer = 'section-record-timer-0'
			  	let sessionProgress = 'section-progress-bar-0'

				let _runTimer = setInterval(async () => {

					let __time = new Date(totalTime * 1000).toISOString().slice(11, 19)
			  		$('.total-record-timer').text(__time)

			  		if(!recorder) {

                        if(!player) {
                            player = new Audio(musicData['music-track']);
                            player.play();
                        }

						recorder = await recordAudio();
                        let r_state = recorder.start();
						console.log('start', r_state);
						$('.record-run-time img').attr('src', '{{ asset('img/record-stop-icon.svg') }}')
						$('.record-run-time img').addClass('recording')
			  		}

					if(totalTime === planTime) {
						if(recorder) {
							recorder.stop().then((output) => {
								console.log(output)
					 			file = new File([output.audioBlob], 'recording.webm', {
										    type: output.audioBlob.type,
										});
					 			// $('input[name="audio-track"]').val(file);
					 			// console.log(file)
					 			const fileInput = document.getElementById('audio-track'); $('input[name="audio-track"]'); //
					 			// console.log(fileInput)
								const dataTransfer = new DataTransfer()
								dataTransfer.items.add(file)
								fileInput.files = dataTransfer.files
					 			console.log(fileInput)

                                // console.log(output.audioBlob.duration + ' seconds');
                                //
							})
                            if(player) {
                                player.pause()
                                player = null;
                            }
							recorder = null;
						}
						clearInterval(_runTimer)
					}

					totalTime++
				}, 1000)
			})
		});
	</script>
@stop
