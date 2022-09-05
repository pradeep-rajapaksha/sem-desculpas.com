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

    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

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

        <div class="spootify-auth-box">
            <a href="#" class="btn btn-outline-light btn-lg" id="spootify-auth-link">Authorize for <img src="{{ asset('img/logo-spotify.svg') }}" alt="Spotify"></a>
        </div>

        <div class="spootify-search-box">
            <div class="head-title">
                <h2>Search for your music on</h2>
                <img src="{{ asset('img/logo-spotify.svg') }}">
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Sarch Spotify Tracks..."
                    aria-label="Sarch Spotify Tracks..." autocomplete="off" aria-describedby="button-addon2"
                    name="keyword" id="spootify-keyword" data-toggle="dropdown">
                <div class="input-group-append">
                    <button class="btn btn-search" type="button" id="button-addon2"><img
                            src="{{ asset('img/icon-search.svg') }}"></button>
                </div>
                <div class="dropdown-menu w-100 search-options">
                    <a class="dropdown-item pending-item" href="#">Pending...</a>
                </div>
            </div>
        </div>

        <div class="tracks-section-display">
            <form action="{{ route('classes.builder.music.next') }}" method="post" id="classes-builder-music-form" enctype="multipart/form-data">
                @csrf
                <div class="track-box-wrapper d-none">
                    <div class="track-box">
                        <div class="head">
                            <h3 class="head-title"><img src="{{ asset('img/section-list-item.svg') }}"> <span>Track</span></h3>

                            <div class="btn-grp">
                                {{-- <a href="#" class="btn btn-play mr-3">Play</a> --}}
                                <a href="#" class="btn btn-upload mr-0" for="music-track-input">Upload Music</a>
                                <a href="#" class="btn btn-delete">
                                    <img src="{{ asset('img/icon-delete.svg') }}">
                                </a>
                            </div>
                        </div>

                        <div class="body-track">
                            <h4 class="track-artist">Twin Forks</h4>
                            <h5 class="track-name">Can’t be broken</h5>
                            <h6 class="track-album">Album Name</h6>
                        </div>
                    </div>
                    <!-- end of a track box -->
                </div>
    		    <div class="btn-grp-pr">
                    <input type="hidden" name="track-artist" id="track-artist-input" />
                    <input type="hidden" name="track-name" id="track-name-input" />
                    <input type="hidden" name="track-album" id="track-album-input" />
                    <input type="file" name="music-track" id="music-track-input" class="d-none" accept="audio/*" />
    		        <a href="{{ route('classes.builder.plan') }}" class="btn-back"> Back</a>
                    <button onclick="$('#classes-builder-music-form').submit();" type="submit" href="{{ route('classes.builder.record') }}" class="btn-next"><img src="{{ asset('img/next-icon.svg') }}"> Next</button>
    		    </div>
            </form>
        </div>
	</div>

    <script src="{{ asset('js/spotify-web-api.js') }}"></script>
    <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
    <script type="text/javascript">

        @php
            $spotify = request()->session()->get('spotify-auth-data') ?? null; @endphp

        @if ($spotify && isset($spotify['access_token']) && isset($spotify['expires_at']) && $spotify['expires_at'] >= strtotime('now'))
            $(document).find('.spootify-auth-box').css({'display': 'none'})
            $(document).find('.spootify-search-box').css({'display': 'block'})
            $(document).find('.track-box-wrapper').css({'display': 'block'})

            var spotifyApi = new SpotifyWebApi();
            spotifyApi.setAccessToken("{{$spotify['access_token'] ?? ''}}");
        @else
            $(document).find('.spootify-auth-box').css({'display': 'block'})
            $(document).find('.spootify-search-box').css({'display': 'none'})
            $(document).find('.track-box-wrapper').css({'display': 'none'})

            $(document).ready(function() {
                var client_id = '09598fccec6844a8afd5a8ece39cba49';
                var redirect_uri = "{{ url()->current() }}";

                var state = Date.now().toString(36);
                localStorage.setItem('stateKey', state);
                // console.log(state, redirect_uri);

                var scope = 'user-read-private user-read-email';

                var url = 'https://accounts.spotify.com/authorize';
                url += '?response_type=token';
                url += '&client_id=' + encodeURIComponent(client_id);
                url += '&scope=' + encodeURIComponent(scope);
                url += '&redirect_uri=' + encodeURIComponent(redirect_uri);
                url += '&state=' + encodeURIComponent(state);

                $('#spootify-auth-link').attr('href', url);
            });

            let url = window.location.href;
            let authorize = url.split("#")[1].split("&").reduce(function(result, param) {
                  var [key, value] = param.split("=");
                  result[key] = value;
                  return result;
                }, {});

            window.fetch("{{ route('utility.spotify-auth') }}", {
                    method: "post",
                    headers: {"Content-Type": "application/json", "X-CSRF-TOKEN" : "{{csrf_token()}}"},
                    body: JSON.stringify(authorize),
                })
                .then((response) => { console.log(response) })
                .catch((err) => { console.log(err) });
        @endif

        $(document).ready(function() {
            var tracks;
            var track;
            var audio;

            $('input[name="keyword"').keyup(function (event) {
                let keyword = $(this).val();

                spotifyApi.searchTracks(keyword, { limit: 10 }).then(
                  function (data) {
                    if(data?.tracks?.items) {
                        // console.log('Search by ' + keyword, data?.tracks?.items);
                        tracks = data?.tracks?.items;

                        let trackBoxHtml = '';
                        let trackOptionsHtml = '';
                        data.tracks.items.forEach((item, index) => {
                            let artists = item.artists.map((artist) => artist.name)
                            // console.log('artists >>>', artists?.toString())
                            trackOptionsHtml += `<a class="dropdown-item spootify-search-item" href="#" data-track="${item}" data-source="${item.preview_url}" data-trackid="${item.id}" data-uri="${item.uri}">${item.name} - ${item?.album?.name}</a>`;
                        })
                        $('.search-options').html(trackOptionsHtml);
                    }
                  },
                  function (err) {
                    console.error(err);
                    if(err.status === 401 && window.confirm("Your Spotify authorization has been expired! Click `Ok` to reauthorize.")) {
                        window.fetch("{{ route('utility.spotify-auth.forget') }}", {
                            method: "delete",
                            headers: {"Content-Type": "application/json", "X-CSRF-TOKEN" : "{{csrf_token()}}"},
                        })
                        .then((response) => {
                            window.location.href = window.location.origin + window.location.pathname;
                        })
                        .catch((err) => { console.log(err) });
                    }
                  }
                );
            });

            $(document).on('click', '.spootify-search-item', function(event) {
                event.preventDefault();

                if(audio) {
                    audio.pause();
                }

                let trackId = $(this).data('trackid');
                track = tracks.find((tr) => tr.id == trackId);
                // console.log(track)

                if(track) {
                    // $('#spootify-keyword').val($(this).text());
                    $('#spootify-keyword').val(`${track.name} - ${track?.album?.name}`);

                    let artists = track.artists.map((artist) => artist.name);
                    $('.track-artist').text(artists);
                    $('.track-name').text(track?.name);
                    $('.track-album').text(track?.album?.name);

                    $('input[name="track-artist"]').val(artists);
                    $('input[name="track-name"]').val(track?.name);
                    $('input[name="track-album"]').val(track?.album?.name);

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    $('.track-box-wrapper').css({'display': 'block'});
                    $('.track-box-wrapper').removeClass('d-none');
                }
            });

            $(document).on('click', '.btn-play', function(event) {
                event.preventDefault();
                if(track && track.preview_url) {
                    console.log(track);
                    if(audio) { // playing
                        audio.pause();
                    }
                    audio = new Audio(track.preview_url);
                    audio.play();
                }
            });

            $(document).on('click', '.btn-upload', function(event) {
                event.preventDefault();
                $('input[name="music-track"]').trigger('click');
            });

            $(document).on('click', '.btn-delete', function(event) {
                event.preventDefault();
            });
        });
    </script>
@stop
