
@extends('layouts.app')

@section('content')

    <html>

    <head>
        <title>SmartMeals Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <style>

            .content-wrapper {
                margin: 0 auto;
                max-width: 1286px;
            }
            * {
                outline: none;
                box-sizing: border-box;
            }

            .no-gutters {
                margin-right: 0;
                margin-left: 0;
            }

            .no-gutters h2{
                text-align: center;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
            }

            .content-block {
                margin-top: 80px;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
                margin-right: 15px;
                margin-left: -15px;
            }

            .card {
                border-radius: 25px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 800px;
                font-family: arial;
            }

            img {
                border-radius: 25px 25px 0 0;
            }

            .price {
                color: grey;
                font-size: 22px;
            }

            .card button {
                border: none;
                outline: 0;
                padding: 12px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            .card button:hover {
                opacity: 0.7;
            }

            .container {
                padding: 2px 16px;
            }

            .ads {
                float: left;
                width: 50%;
            }

            .ads .card{
                width: 500px;
                margin: 0 0 2.4rem;
            }



            .row .slider-wrapper .slick-slider .owl-carousel .item img {
                width: 450px;
                height: 400px;
            }

            .owl-carousel .item h4 {
                color: #FFF;
                font-weight: 400;
                margin-top: 0;
            }




        </style>

    </head>

    <body>

    <div class="content-wrapper">

        <section>
            <div class="row no-gutters">
                <div class="row content-block">

                    <div class="d-flex align-items-center col-sm-12">


                        <div class="latest-card">
                            <h1>Top Rated Recipe</h1>
                            <div class="card">
                                @foreach($topRatedPosts as $recipe)
                                    <img src="/storage/{{ $recipe->image }}" alt="Highest Rated" style="width:100%">
                                    <div class="container">
                                        <div class="d-flex align-items-center">
                                            <div class="pr-3">
                                                <img
                                                    src="{{ $recipe->user->profile->profileImage() }}"
                                                    class="rounded-circle w-100"
                                                    style="max-width: 40px;">
                                            </div>
                                            <div>
                                                <div class="font-weight-bold">
                                                    <a href="/profile/{{ $recipe->user->id }}">
                                                        <span class="text-dark">{{ $recipe->user->username }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold">
                                                    <a href="/profile/{{ $recipe->user->id }}">
                                                        <span class="text-dark">{{ $recipe->user->username }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="ads pl-3">
                            <div class="row create_recipe card">
                                <div class="container">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="pr-3 text-dark">
                                            <h3>
                                                <a href="/recipes/create"
                                                   style="color: #2a9055"
                                                >Create Your  recipe</a>
                                            </h3>
                                            <hr>
                                            <span>Share your favourite recipe here! </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row create_mealPlan card">
                                <div class="container">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="pr-3 text-dark">
                                            <h3>
                                                <a href="/meal_plan/create"
                                                   style="color: #2a9055"
                                                >Create Your Meal Plan</a>
                                            </h3>
                                            <hr>
                                            <span>Share your favourite meal plan here! </span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>



                    </div>
                </div>
            </div>
        </section>


        <section>

            <div class="latest-recipes content-block">
                <div class="row">
                    <div class="slider-title">
                        <div class="intro-text text-standard">
                            <h2>Latest Recipes</h2>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="slider-wrapper">
                    <span class="priv_arrow"><i class="fas fa-angle-left"></i></span>
                    <div class="owl-carousel owl-theme mt-5">
                        @foreach($recipes as $recipe)
                            <div class="item">
                                <div class="col-4 pb-4">
                                    <a href="/r/{{ $recipe->id }}">
                                        <img src="/storage/{{ $recipe->image }}" style=" width: 350px; height: 300px;">
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </section>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
    <script>
        jQuery(document).ready(function($){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:3
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:3
                    }
                }
            })
        })
    </script>

    </body>

    </html>
@endsection


