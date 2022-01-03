<?php

namespace App\Providers;

use App\Category;
use App\Subcategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        View::share('categories', Category::orderBy('name')->get());
//
//        View::share('subcategories', Subcategory::orderBy('name')->get());
    }
}
