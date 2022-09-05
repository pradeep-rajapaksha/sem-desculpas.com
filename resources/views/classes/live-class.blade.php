@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Live Classes Archived', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Live Classes', 'link' => '#'),
            array('label' => $data['classNickname'] ?? 'Archived', 'link' => ''),
			], 
		'buttons' => []
		])
@stop

@section('page-analytic-box')
	<div class="analytic-box">
	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-users.svg') }}"> Total Class Users </h3>
	        <h5>{{ $totalUsers }}</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-users.svg') }}">Current Class users </h3>
	        <h5>{{ $currentUsers }}</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-clock-white.svg') }}"> Total Class time </h3>
	        <h5>{{ $totalTime }}</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-heart.svg') }}"> Total class interactions </h3>
	        <h5>{{ $totalInteraction }}</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-task-completed.svg') }}"> Completed </h3>
	        <h5>{{ $completed }}</h5>
	    </div>
    </div>
@stop

@section('content')
	<div class="live-message-archive">
        <div class="row">
            <div class="col-md-6 ">
                <div class="leaderboard">
                    <h4>Leaderboard</h4>

                    <ul class="nav nav-pills " id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="bycompleted-tab" data-toggle="pill"
                                href="#bycompleted" role="tab" aria-controls="bycompleted"
                                aria-selected="true">By # completed</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                href="#pills-profile" role="tab" aria-controls="pills-profile"
                                aria-selected="false">By Total Class Time </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="leaderboard-tabContent">
                        <div class="tab-pane fade show active" id="bycompleted" role="tabpanel"
                            aria-labelledby="bycompleted-tab">
                            @php $key = 0; @endphp
                            @if (isset($data['classUsers']))
                                @foreach(collect($data['classUsers'])->sortBy('completedAt')->reverse()->toArray() as $user)
                                    <!-- one board box -->
                                    <div class="board-box">
                                        <div class="number">
                                            <h1>{{ str_pad($key+1, 2, '0', STR_PAD_LEFT) }}. </h1>
                                        </div>

                                        <div class="icon">
                                            <img src="{{ Avatar::create($user['name'])->toBase64() }}">
                                        </div>

                                        <h3>{{ $user['name'] }}</h3>

                                        <h5>{{ date('H:i:s', class_time_in_seconds($user['time'])) }}</h5>
                                    </div>
                                    <!-- end board box -->
                                    @php $key++; @endphp
                                @endforeach
                            @endif
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            @php $key = 0; @endphp
                            @if (isset($data['classUsers']))
                                @foreach(collect($data['classUsers'])->sortBy('time')->reverse()->toArray() as $user)
                                    <!-- one board box -->
                                    <div class="board-box">
                                        <div class="number">
                                            <h1>{{ str_pad($key+1, 2, '0', STR_PAD_LEFT) }}. </h1>
                                        </div>

                                        <div class="icon">
                                            <img src="{{ Avatar::create($user['name'])->toBase64() }}">
                                        </div>

                                        <h3>{{ $user['name'] }}</h3>

                                        <h5>{{ date('H:i:s', class_time_in_seconds($user['time'])) }}</h5>
                                    </div>
                                    <!-- end board box -->
                                    @php $key++; @endphp
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="interaction-chat">
                    <h4>Interactions</h4>

                    <div class="chat-head">
                        <h3>Class Chat</h3>
                    </div>

                    <div class="chat-box">
                        @php $key = 0; @endphp
                        @if (isset($data['interactions']))
                            @foreach (collect($data['interactions'])->sortBy('datetime')->toArray() as $interaction)
                                <div class="incoming-mesg">
                                    <div class="head">
                                        <div class="icon">
                                            <img src="{{ Avatar::create($interaction['name'] ?? '')->toBase64() }}">
                                        </div>

                                        <h5>{{ $interaction['name'] ?? '' }}</h5>
                                        <h6>{{ date('d M Y - H:i A', strtotime($interaction['datetime'] ?? '')) }}</h6>
                                    </div>

                                    <div class="body">
                                        <p>{{ $interaction['interaction'] ?? '' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        {{-- <div class="outgoing-mesg">
                            <div class="head">
                                <h6>10 Feb 2022  - 08:26 AM</h6>
                                <h5>You</h5>
                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-4.svg') }}">
                                </div>
                            </div>

                            <div class="body">
                                <p>Great!!!</p>
                            </div>
                        </div> --}}

                        {{-- <div class="incoming-mesg">
                            <div class="head">
                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-1.svg') }}">
                                </div>

                                <h5>Leonie Wormald</h5>
                                <h6>10 Feb 2022  - 08:26 AM</h6>
                            </div>

                            <div class="body">
                                <p>😀😀😀</p>
                            </div>
                        </div> --}}
                    </div>

                    <div class="chat-submit">
                        <form method="post" action="{{ route('classes.interaction-store', $data['classId']) }}">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="interaction" aria-label="Text input with segmented dropdown button">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary"> Send </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
