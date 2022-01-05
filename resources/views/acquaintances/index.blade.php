@extends('layouts.app')

@section('content')

    <html>

    <head>
        <style>
            .center {
                text-align: center;
            }

        </style>
    </head>

    <body>
    <div class="container">

        <div>

            <div class="center" >
                <img src="{{ asset('js/friendsfoodies.jpg') }}"
                     class="rounded-circle w-50"
                     alt="">
            </div>

        </div>

        <div class="tabs">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#followers"
                       class="nav-link active"
                       style="color: #2a9055"
                       data-toggle="tab">Followers</a>
                </li>
                <li class="nav-item">
                    <a href="#following"
                       class="nav-link"
                       style="color: #2a9055"
                       data-toggle="tab">Following</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="followers">
                    <div class="row pt-5">

                    </div>

                </div>

                <div class="tab-pane fade" id="following">
                    <div class="row pt-5">
=                      <span class="text-dark">{{ $friends }}</span>
                    </div>
                </div>

            </div>

    </div>

    </div>

    </body>

    </html>
@endsection
