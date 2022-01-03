@extends('layouts.app')

@section('content')

    <head>

        <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    <style>

        table {
            margin-left: auto;
            margin-right: auto;

        }
        td {
            width: 4rem;
            height: 4rem;
            border: 1px solid transparent;
            text-align: center;

        }
        th {
            border-color: transparent;
            text-align: center;
        }

        body {
            padding: 1rem;

        }

    </style>

    </head>

    <div class="container">

        <div class="row">
            <div class="col-6">
                <img src="/storage/{{ $recipe->image }}" class="w-100">
            </div>

            <div class="col-4">
                <div>

                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="{{ $recipe->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px;">
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{ $recipe->user->id }}">
                                    <span class="text-dark">{{ $recipe->user->username }}</span>
                                </a>
                                <a href="#" class="pl-3">Follow</a>
                            </div>
                        </div>
                       @if($recipe->user_id == Auth::id())
                        <div class="pl-3">
                            <form action="/r/{{$recipe->id}}" enctype="multipart/form-data" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <hr>

                    <p>
                    <span class="font-weight-bold">
                        <span class="font-weight-bold">{{ $recipe->title }}</span>
                    </span> {{ $recipe->description }}
                    </p>

                    <p>
                        <tr>
                            <span class="font-weight-bold">
                            <th>Prep Time</th>
                            </span>
                            <span style="color: deepskyblue">
                            <td>{{$recipe->prep_time}}</td>
                            </span>
                        </tr>

                        <tr>
                            <span class="font-weight-bold">
                            <th>Cook Time</th>
                            </span>
                            <span style="color: deepskyblue">
                                <td>{{$recipe->cook_time}}</td>
                            </span>
                        </tr>
                    </p>

                    <p>
                    <span class="font-weight-bold">
                        <a>
                            Nutrition Data
                        </a>
                    </span>
                    </p>

                    <p>

                        <span class="font-italic">

                        <tr>
                            <td>Calorie</td>
                            <td>Fat</td>
                            <td>Saturates</td>
                            <td>Carbs</td>
                            <td>Sugars</td>
                            <td>Fibre</td>
                            <td>Protein</td>
                            <td>Salt</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        </span>

                    </p>

                    <p>
                        <span class="font-weight-bold">
                            <a>
                                Ingredients
                            </a>
                        </span>
                    </p>

                    <p>
                        <span class="font-weight-bold">
                        </span>
                        <?=str_replace(',', '<br />', $recipe->ingredients)?>
                    </p>

                    <p>
                        <span class="font-weight-bold">
                            <a>
                                Methods
                            </a>
                        </span>
                    </p>

                    <p>
                        <span class="font-weight-bold">
                        </span>
                        <?=str_replace(',', '<br />', $recipe->steps)?>
                    </p>

                </div>
            </div>


        </div>

    </div>


@endsection

