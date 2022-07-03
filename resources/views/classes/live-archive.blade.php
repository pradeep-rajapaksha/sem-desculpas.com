@extends('layouts.default')

@section('page-heading-content')
	@include('partials.page-heading', ['title' => 'Live Classes Archived', 
		'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Live Classes', 'link' => '#'),
            array('label' => 'Archived', 'link' => ''),
			], 
		'buttons' => []
		])
@stop

@section('page-analytic-box')
	<div class="analytic-box">
	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-users.svg') }}"> Total Class Users </h3>
	        <h5>125</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-users.svg') }}">Current Class users </h3>
	        <h5>6</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-clock-white.svg') }}"> Total Class time </h3>
	        <h5>1:03:12:20</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-heart.svg') }}"> Total class interactions </h3>
	        <h5>162</h5>
	    </div>

	    <div class="info-box">
	        <h3> <img src="{{ asset('img/icon-task-completed.svg') }}"> Completed </h3>
	        <h5>86</h5>
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
                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>01. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-1.svg') }}">
                                </div>

                                <h3>Braydon Wells</h3>

                                <h5>48</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>02. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-2.svg') }}">
                                </div>

                                <h3>Adeel Conway</h3>

                                <h5>39</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>03. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-3.svg') }}">
                                </div>

                                <h3>Leonie Wormald</h3>

                                <h5>28</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>04. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-4.svg') }}">
                                </div>

                                <h3>Billy Pierce</h3>

                                <h5>26</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>05. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-5.svg') }}">
                                </div>

                                <h3>Tessa Nguyen</h3>

                                <h5>22</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>06. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-6.svg') }}">
                                </div>

                                <h3>Kien Malone</h3>

                                <h5>16</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>07. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-7.svg') }}">
                                </div>

                                <h3>Darren Albert</h3>

                                <h5>17</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>08. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-8.svg') }}">
                                </div>

                                <h3>Marlie Kemp</h3>

                                <h5>17</h5>
                            </div>
                            <!-- end board box -->
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>01. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-1.svg') }}">
                                </div>

                                <h3>Braydon Wells</h3>

                                <h5>48</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>02. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-2.svg') }}">
                                </div>

                                <h3>Adeel Conway</h3>

                                <h5>39</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>03. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-3.svg') }}">
                                </div>

                                <h3>Leonie Wormald</h3>

                                <h5>28</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>04. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-4.svg') }}">
                                </div>

                                <h3>Billy Pierce</h3>

                                <h5>26</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>05. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-5.svg') }}">
                                </div>

                                <h3>Tessa Nguyen</h3>

                                <h5>22</h5>
                            </div>
                            <!-- end board box -->

                            <!-- one board box -->
                            <div class="board-box">
                                <div class="number">
                                    <h1>06. </h1>
                                </div>

                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-6.svg') }}">
                                </div>

                                <h3>Kien Malone</h3>

                                <h5>16</h5>
                            </div>
                            <!-- end board box -->
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
                        <div class="incoming-mesg">
                            <div class="head">
                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-1.svg') }}">
                                </div>

                                <h5>Leonie Wormald</h5>
                                <h6>10 Feb 2022  - 08:26 AM</h6>
                            </div>

                            <div class="body">
                                <p>Hi the lesson went well thank you</p>
                            </div>
                        </div>

                        <div class="outgoing-mesg">
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
                        </div>

                        <div class="incoming-mesg">
                            <div class="head">
                                <div class="icon">
                                    <img src="{{ asset('img/chat-user-icons/user-1.svg') }}">
                                </div>

                                <h5>Leonie Wormald</h5>
                                <h6>10 Feb 2022  - 08:26 AM</h6>
                            </div>

                            <div class="body">
                                <p>😀 😀 😀 </p>
                            </div>
                        </div>
                    </div>

                    <div class="chat-submit">
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary">Action</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
