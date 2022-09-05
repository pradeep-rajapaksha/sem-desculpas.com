@extends('layouts.default')

@section('page-heading-content')
    @include('partials.page-heading', ['title' => 'Class Builder', 
        'breadcrumb' => [
            array('label' => 'Home', 'link' => '#'),
            array('label' => 'Class Builder', 'link' => '')
            ], 
        'buttons' => [
            array('label' => 'Create Class', 'classes' => 'btn-create-class', 'link' => route('classes.builder.summary'), 'icon' => asset('img/icon-add.svg'))
            ]
        ])
@stop

@section('content')
    <div class="all-class-builders">

        <!-- start of one class box  -->
        {{-- <div class="class-box">
            <div class="cls-top">
                <h2>Aenean et blandit ante</h2>
                <div class="btn-box">
                    <a class="btn-pending-status" href="#"><img src="{{ asset('img/icon-pending.svg')}}"
                           > Published</a>
                    <a class="btn-details-status" href="#"><img src="{{ asset('img/details-drop-icon.svg')}}"> </a>
                </div>
            </div>

            <p>Suspendisse augue quam, ultrices consectetur tellus vel, pretium venenatis nunc. In
                hac habitasse platea dictumst. Nullam varius, metus ac venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget velit. tumst. Nullam varius, metus ac
                venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget veli </p>

            <div class="cls-bottom-details-box">
                <a class="btn-date" href="#"><img src="{{ asset('img/icon-calander.svg')}}" > 20
                    January 2021</a>

                <a class="btn-clock" href="#"><img src="{{ asset('img/icon-clock.svg')}}" > 32
                    mins</a>

                <a class="btn-beg-stage" href="#"><img src="{{ asset('img/icon-beg-stage.svg')}}"
                        > Beginner</a>

                <a class="btn-mindfulness" href="#"><img src="{{ asset('img/icon-mindfulness.svg')}}"
                        > Mindfulness</a>
            </div>
        </div> --}}
        <!-- end of one class box  -->

        <!-- ********************************************************** -->
        @foreach ($data as $key => $class)
            <!-- start of one class box  -->
            <div class="class-box">
                <div class="cls-top">
                    <h2>{{ $class['classNickname'] ?? '' }}</h2>
                    <div class="btn-box">
                        @if (isset($class['Status']) && $class['Status'] == strtolower(\App\Models\Classes::PUBLISHED) )
                            <a class="btn-publish-status"><img src="{{ asset('img/icon-published.svg')}}"> 
                                {{ \App\Models\Classes::PUBLISHED }}
                            </a>
                        @elseif (isset($class['Status']) && $class['Status'] == strtolower(\App\Models\Classes::DRAFT) )
                            <a class="btn-publish-status"><img src="{{ asset('img/icon-draft.svg')}}"> 
                                {{ \App\Models\Classes::DRAFT }}
                            </a>
                        @elseif (isset($class['Status']) && $class['Status'] == strtolower(\App\Models\Classes::PENDING) )
                            <a class="btn-publish-status"><img src="{{ asset('img/icon-pending.svg')}}"> 
                                {{ \App\Models\Classes::PENDING }}
                            </a>
                        @elseif (isset($class['Status']) && $class['Status'] == strtolower(\App\Models\Classes::REJECTED) )
                            <a class="btn-publish-status"><img src="{{ asset('img/icon-rejected.svg')}}"> 
                                {{ \App\Models\Classes::REJECTED }}
                            </a>
                        @else
                            <a class="btn-publish-status"><img src="{{ asset('img/icon-draft.svg')}}"> Draft</a>
                        @endif
                        <a class="btn-details-status" href="#" role="button" id="dropdown-{{$key }}" data-toggle="dropdown" aria-expanded="false"><img src="{{ asset('img/details-drop-icon.svg')}}"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-{{$key }}">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>

                <p>{{ $class['classDescription'] ?? '' }}</p>

                <div class="cls-bottom-details-box">
                    <a class="btn-date" href="#"><img src="{{ asset('img/icon-calander.svg')}}" > {{ date('j F Y', strtotime($class['classDate'] ?? null)) }}</a>

                    <a class="btn-clock" href="#"><img src="{{ asset('img/icon-clock.svg')}}" > {{ str_replace('m', 'mins ', str_replace('s', 'secs ', ($class['classTime'] ?? '0m0s'))) }} </a>

                    <a class="btn-beg-stage" href="#"><img src="{{ asset('img/icon-beg-stage.svg')}}"> {{ $class['fitnessLevel'] ?? '' }}</a>

                    <a class="btn-mindfulness" href="#"><img src="{{ asset('img/icon-mindfulness.svg')}}"> {{ $class['categoryName'] ?? '' }}</a>
                </div>
            </div>
            <!-- end of one class box  -->
        @endforeach

        <!-- ********************************************************** -->

        <!-- start of one class box  -->
        {{-- <div class="class-box">
            <div class="cls-top">
                <h2>Aenean et blandit ante</h2>
                <div class="btn-box">
                    <a class="btn-draft-status" href="#"><img src="{{ asset('img/icon-draft.svg')}}"
                           > Draft</a>
                    <a class="btn-details-status" href="#"><img src="{{ asset('img/details-drop-icon.svg')}}"> </a>
                </div>
            </div>

            <p>Suspendisse augue quam, ultrices consectetur tellus vel, pretium venenatis nunc. In
                hac habitasse platea dictumst. Nullam varius, metus ac venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget velit. tumst. Nullam varius, metus ac
                venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget veli </p>

            <div class="cls-bottom-details-box">
                <a class="btn-date" href="#"><img src="{{ asset('img/icon-calander.svg')}}" > 20
                    January 2021</a>

                <a class="btn-clock" href="#"><img src="{{ asset('img/icon-clock.svg')}}" > 32
                    mins</a>

                <a class="btn-beg-stage" href="#"><img src="{{ asset('img/icon-beg-stage.svg')}}"
                        > Beginner</a>

                <a class="btn-mindfulness" href="#"><img src="{{ asset('img/icon-mindfulness.svg')}}"
                        > Mindfulness</a>
            </div>
        </div> --}}
        <!-- end of one class box  -->

        <!-- ********************************************************** -->
    </div>
@stop
