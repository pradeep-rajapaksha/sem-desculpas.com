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
        <div class="class-box">
            <div class="cls-top">
                <h2>Aenean et blandit ante</h2>
                <div class="btn-box">
                    <a class="btn-publish-status" href=""><img src="{{ asset('img/icon-published.svg')}}"
                           > Published</a>
                    <a class="btn-details-status" href=""><img src="{{ asset('img/details-drop-icon.svg')}}"> </a>
                </div>
            </div>

            <p>Suspendisse augue quam, ultrices consectetur tellus vel, pretium venenatis nunc. In
                hac habitasse platea dictumst. Nullam varius, metus ac venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget velit. tumst. Nullam varius, metus ac
                venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget veli </p>

            <div class="cls-bottom-details-box">
                <a class="btn-date" href=""><img src="{{ asset('img/icon-calander.svg')}}" > 20
                    January 2021</a>

                <a class="btn-clock" href=""><img src="{{ asset('img/icon-clock.svg')}}" > 32
                    mins</a>

                <a class="btn-beg-stage" href=""><img src="{{ asset('img/icon-beg-stage.svg')}}"
                        > Beginner</a>

                <a class="btn-mindfulness" href=""><img src="{{ asset('img/icon-mindfulness.svg')}}"
                        > Mindfulness</a>
            </div>
        </div>
        <!-- end of one class box  -->

        <!-- ********************************************************** -->

        <!-- start of one class box  -->
        <div class="class-box">
            <div class="cls-top">
                <h2>Aenean et blandit ante</h2>
                <div class="btn-box">
                    <a class="btn-pending-status" href=""><img src="{{ asset('img/icon-pending.svg')}}"
                           > Published</a>
                    <a class="btn-details-status" href=""><img src="{{ asset('img/details-drop-icon.svg')}}"> </a>
                </div>
            </div>

            <p>Suspendisse augue quam, ultrices consectetur tellus vel, pretium venenatis nunc. In
                hac habitasse platea dictumst. Nullam varius, metus ac venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget velit. tumst. Nullam varius, metus ac
                venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget veli </p>

            <div class="cls-bottom-details-box">
                <a class="btn-date" href=""><img src="{{ asset('img/icon-calander.svg')}}" > 20
                    January 2021</a>

                <a class="btn-clock" href=""><img src="{{ asset('img/icon-clock.svg')}}" > 32
                    mins</a>

                <a class="btn-beg-stage" href=""><img src="{{ asset('img/icon-beg-stage.svg')}}"
                        > Beginner</a>

                <a class="btn-mindfulness" href=""><img src="{{ asset('img/icon-mindfulness.svg')}}"
                        > Mindfulness</a>
            </div>
        </div>
        <!-- end of one class box  -->

        <!-- ********************************************************** -->

        <!-- start of one class box  -->
        <div class="class-box">
            <div class="cls-top">
                <h2>Aenean et blandit ante</h2>
                <div class="btn-box">
                    <a class="btn-draft-status" href=""><img src="{{ asset('img/icon-draft.svg')}}"
                           > Draft</a>
                    <a class="btn-details-status" href=""><img src="{{ asset('img/details-drop-icon.svg')}}"> </a>
                </div>
            </div>

            <p>Suspendisse augue quam, ultrices consectetur tellus vel, pretium venenatis nunc. In
                hac habitasse platea dictumst. Nullam varius, metus ac venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget velit. tumst. Nullam varius, metus ac
                venenatis bibendum, ante diam
                ultricies dolor, id eleifend sapien enim eget veli </p>

            <div class="cls-bottom-details-box">
                <a class="btn-date" href=""><img src="{{ asset('img/icon-calander.svg')}}" > 20
                    January 2021</a>

                <a class="btn-clock" href=""><img src="{{ asset('img/icon-clock.svg')}}" > 32
                    mins</a>

                <a class="btn-beg-stage" href=""><img src="{{ asset('img/icon-beg-stage.svg')}}"
                        > Beginner</a>

                <a class="btn-mindfulness" href=""><img src="{{ asset('img/icon-mindfulness.svg')}}"
                        > Mindfulness</a>
            </div>
        </div>
        <!-- end of one class box  -->

        <!-- ********************************************************** -->
    </div>
@stop
