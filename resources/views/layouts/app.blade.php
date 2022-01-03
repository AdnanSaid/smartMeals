<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-7">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SmartMeals') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

</style>

<body>

<!-- Navigation bar  -->
<div id="navBar">

    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #2a9055;">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand d-flex" href="{{ url('/home') }}">
                <div class="pl-3"><img src= "{{ asset('png/smartMealsLogo.png') }}"
                                       style="height: 100px;"
                                       class="pr-3"></div>

                <div class="pt-5" style="color: whitesmoke;font-size: 28px;">SmartMeals</div>
            </a>


            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar -->

            <div class="collapse navbar-collapse pt-5" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                {{--                        <li class="nav-item active">--}}
                {{--                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
                {{--                        </li>--}}


                <!-- DropDown navbar (will try create a hover button in the future -->

{{--                    <li class="nav-item dropdown pt-2">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Recipes--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item font-weight-bold" href="{{url('/categories')}}">All Recipes</a>--}}
{{--                            @foreach($categories as $category)--}}
{{--                                <a class="dropdown-item" href="#">{{$category -> name}}</a>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </li>--}}

                </ul>




                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Search Bar -->
                        <form class="form-inline my-2 my-lg-0 pb-3">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <!-- DropDown for specific users profiles -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">Profile
                                    </a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>

    </nav>

    <main class="py-4">
        @yield('content')
    </main>

</div>
</body>

</html>

