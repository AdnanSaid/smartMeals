@extends('layouts.app')

@section('content')

    <head>

        <style>

            table .button {
                background-color: transparent;
                border: none;
                color: black;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                /*transition-duration: 0.4s;*/
                cursor: pointer;
            }

            table {
                margin-left: auto;
                margin-right: auto;
            }
            td {
                width: 8rem;
                height: 4rem;
                border: 1px solid #ccc;
                text-align: center;
            }
            th {
                background: lightblue;
                border-color: white;
            }

            body {
                padding: 1rem;
            }

        </style>

    </head>

    <body>


    <div class="container">

        <form action="/pl" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">

                <div class="col-8 offset-2">

                    <div class="row pb-3">
                        <h1>Add Meal Plan</h1>
                    </div>

{{--                    <div class="row">--}}

{{--                        <table class="table" >--}}

{{--                            <tr>--}}
{{--                                <td><button class="button-1 button">MON</button></td>--}}
{{--                                <td><button class="button-2 button">TUE</button></td>--}}
{{--                                <td><button class="button-3 button">WED</button></td>--}}
{{--                            </tr>--}}

{{--                            <tr>--}}
{{--                                <td><button class="button-4 button">THURS</button></td>--}}
{{--                                <td><button class="button-5 button">FRI</button></td>--}}
{{--                                <td><button class="button-6 button">SAT</button></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td></td>--}}
{{--                                <td><button class="button-7 button">SUN</button></td>--}}
{{--                                <td></td>--}}
{{--                            </tr>--}}
{{--                        </table>--}}

{{--                    </div>--}}

                    <header>Enter Meal Plan</header>



                    <div class="form-outer">


                                <div class="field">

                                        <label for="caption" class="col-md-4 col-form-label">Title</label>

                                        <input id="title"
                                               type="text"
                                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                               name="title"
                                               value="{{ old('title') }}"
                                               autocomplete="name" autofocus>

                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                        @endif

                                </div>

{{--                                    <label for="caption" class="col-md-4 col-form-label">Day</label>--}}

{{--                                    <select id="days_id"--}}
{{--                                            class="form-control"--}}
{{--                                            name="days_id"--}}
{{--                                            autocomplete="days_id" autofocus>--}}

{{--                                        @foreach($days as $day)--}}
{{--                                            <option value="{{$day -> id}}">{{$day -> name}}</option>--}}
{{--                                        @endforeach--}}

{{--                                    </select>--}}

{{--                                @if ($errors->has('days_id'))--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $errors->first('days_id') }}</strong>--}}
{{--                        </span>--}}
{{--                                    @endif--}}

                                <div class="field">

                                    <label for="caption" class="col-md-4 col-form-label">Breakfast</label>

                                    <input id="breakfast"
                                           type="text"
                                           class="form-control{{ $errors->has('breakfast') ? ' is-invalid' : '' }}"
                                           name="breakfast"
                                           value="{{ old('breakfast') }}"
                                           autocomplete="name" autofocus>

                                    @if ($errors->has('breakfast'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('breakfast') }}</strong>
                                        </span>
                                    @endif

                                </div>

                                <div class="field">

                            <label for="caption" class="col-md-4 col-form-label">Lunch</label>

                            <input id="lunch"
                                   type="text"
                                   class="form-control{{ $errors->has('lunch') ? ' is-invalid' : '' }}"
                                   name="lunch"
                                   value="{{ old('lunch') }}"
                                   autocomplete="name" autofocus>

                            @if ($errors->has('lunch'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lunch') }}</strong>
                        </span>
                            @endif

                                </div>

{{--                                <div class="field">--}}

{{--                            <label for="caption" class="col-md-4 col-form-label">Snack</label>--}}

{{--                            <input id="snack"--}}
{{--                                   type="text"--}}
{{--                                   class="form-control{{ $errors->has('snack') ? ' is-invalid' : '' }}"--}}
{{--                                   name="snack[]"--}}
{{--                                   value="snack3{{ old('snack') }}"--}}
{{--                                   autocomplete="name" autofocus>--}}

{{--                            @if ($errors->has('snack'))--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $errors->first('snack') }}</strong>--}}
{{--                        </span>--}}
{{--                            @endif--}}

{{--                        </div>--}}

                                <div class="field">

                            <label for="caption" class="col-md-4 col-form-label">Dinner</label>

                            <input id="dinner"
                                   type="text"
                                   class="form-control{{ $errors->has('dinner') ? ' is-invalid' : '' }}"
                                   name="dinner"
                                   value="{{ old('dinner') }}"
                                   autocomplete="name" autofocus>

                            @if ($errors->has('dinner'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dinner') }}</strong>
                        </span>
                            @endif

                                </div>

                            <div class="field">

                                <label for="caption" class="col-md-4 col-form-label">Snack</label>

                                <input id="snack"
                                       type="text"
                                       class="form-control{{ $errors->has('snack') ? ' is-invalid' : '' }}"
                                       name="snack"
                                       value="{{ old('snack') }}"
                                       autocomplete="name" autofocus>

                                @if ($errors->has('snack'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('snack') }}</strong>
                        </span>
                                @endif

                            </div>

{{--                                <div class="field">--}}

{{--                                    <label for="caption" class="col-md-4 col-form-label">Snack</label>--}}

{{--                                    <input id="snack"--}}
{{--                                           type="text"--}}
{{--                                           class="form-control{{ $errors->has('snack') ? ' is-invalid' : '' }}"--}}
{{--                                           name="snack[]"--}}
{{--                                           value="snack4{{ old('snack') }}"--}}
{{--                                           autocomplete="name" autofocus>--}}

{{--                            @if ($errors->has('snack'))--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $errors->first('snack') }}</strong>--}}
{{--                        </span>--}}
{{--                            @endif--}}

{{--                                </div>--}}

                                <div class="row pt-4">
                                    <button class="btn btn-primary">Add New Post</button>
                                </div>

                    </div>

                    </div>

                </div>
        </form>
    </div>

    </body>

@endsection
