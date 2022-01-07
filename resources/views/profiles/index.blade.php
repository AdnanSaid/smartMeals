@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}"
                     class="rounded-circle w-100"
                     alt="">
            </div>

{{--            <div class="col-3 p-5">--}}
{{--                <img src="/storage/{{$user -> profile -> image}}"class="rounded-circle w-100" alt="">--}}
{{--            </div>--}}

            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">

                    <div class="d-flex align-items-center pb-3">

                        <div class="h4">{{ $user->username }}</div>

                        @if(!Auth::user()->isFriendWith($user))

                            <form action="{{route('user.befriend', ['user'=>$user->name])}}" method="post">
                                @csrf
                                <button type="submit"
                                        class="bg-transparent pl-3"
                                        style="border: none;
                                    color:  #2a9055;
                                    outline: none" >
                                    Follow Fellow Foodie
                                </button>
                            </form>

                        @else

                            <form action="{{route('user.unfriend', ['user'=>$user->name])}}" method="post">
                                @csrf
                                <button type="submit"
                                        class="bg-transparent pl-3"
                                        style="border: none;
                                    color:  #2a9055;
                                    outline: none" >
                                    Unfollow :(
                                </button>
                            </form>

                        @endif


                        <form method="POST" action="/profile/{{ $user->username }}/follow">
                            @csrf
                        </form>

                    </div>

                    @can('update', $user->profile)
                        <!DOCTYPE html>
                        <html>
                        <head>
                            <style>
                                .dropbtn {
                                    background-color: #fff;
                                    color: Black;
                                    padding: 16px;
                                    font-size: 16px;
                                    border: none;
                                    cursor: pointer;
                                }

                                .dropdown {
                                    position: relative;
                                    display: inline-block;
                                }

                                .dropdown-content {
                                    display: none;
                                    position: absolute;
                                    right: 0;
                                    background-color: #fff;
                                    min-width: 160px;
                                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                    z-index: 1;
                                }

                                .dropdown-content a {
                                    color: black;
                                    padding: 12px 16px;
                                    text-decoration: none;
                                    display: block;
                                }

                                .dropdown-content a:hover {background-color: #fff;}

                                .dropdown:hover .dropdown-content {
                                    display: block;
                                }

                                .dropdown:hover .dropbtn {
                                    background-color: #fff;
                                }
                            </style>
                        </head>
                        <body>

                        <div class="dropdown" style="float:right;">
                            <button class="dropbtn">Post</button>
                            <div class="dropdown-content">
                                <a href="/post/create">Add New Image</a>
                                <a href="/recipes/create">Add New Recipe</a>
                                <a href="#">Add New MealPlan</a>
                                <a href="#">Add New Blog</a>
                            </div>
                        </div>

                        </body>
                    @endcan

                </div>

                @if (Auth::user()->can('update', $user->profile))
{{--                @can('update', $user->profile)--}}
                    <a href="/profile/{{ $user->id }}/edit"
                       style="color: lightskyblue">
                        Edit Profile</a>
                @endif
{{--                @endcan--}}


                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                    <div class="pr-5">
                        <strong>0</strong>
                        <a href="/followers/{{$user->username}}">followers</a>
                    </div>
                    <div class="pr-5">
                        <strong>0</strong>
                        <a href="/followers/{{$user->username}}">following</a>
                    </div>
                </div>

                <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? 'Chef Title'}}</div>
                <div>{{ $user->profile->description ?? 'Who Are You' }}</div>
                <div><a href="#">{{ $user->profile->url ?? 'N/A' }}</a></div>
            </div>
        </div>

        <div class="tabs">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#recipes" class="nav-link active" style="color: #2a9055" data-toggle="tab">Recipes</a>
                </li>
                <li class="nav-item">
                    <a href="#meals" class="nav-link" style="color: #2a9055" data-toggle="tab">Meal Plans</a>
                </li>
                <li class="nav-item">
                    <a href="#posts" class="nav-link" style="color: #2a9055" data-toggle="tab">Posts</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="recipes">
                    <div class="row pt-5">
                        @foreach($user->recipes as $recipe)
                            <div class="col-4 pb-4">
                                <a href="/r/{{ $recipe->id }}">
                                    <img src="/storage/{{ $recipe->image }}" class="w-100">
                                    <p>
                    <span class="font-weight-bold">
                        <a href=""></a>
                        <span class="font-weight-bold">{{ $recipe->title }}</span>
                    </span> {{ $recipe->description }}
                                    </p>
                                    <p>

                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="tab-pane fade" id="meals">
                    <h4 class="mt-2">Meal Plan tab content</h4>

                    <div class="row pt-5">
                        <p>Add Meal Plan posts when section complete</p>
                    </div>
                </div>

                <div class="tab-pane fade" id="posts">
                    <div class="row pt-5">
                        @foreach($user->posts as $post)
                            <div class="col-4 pb-4">
                                <a href="/p/{{ $post->id }}">
                                    <img src="/storage/{{ $post->image }}" class="w-100">
                                    <p>
                    <span class="font-weight-bold pl-3">
                        <a href=""></a>
                    </span> {{ $post->caption }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>

@endsection



