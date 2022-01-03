<?php

namespace App\Http\Controllers;

use App\Post;
use App\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $topRatedPosts = Recipe::orderBy('created_at', 'desc')->take(1)
            ->join('subcategories', 'subcategories_id', '=', 'recipes.subcategories_id')
            ->select('recipes.*', 'subcategories.name')
            ->get();

        $recipes = Recipe::orderBy('created_at', 'desc')
            ->get();

        $posts = Post::all();

        return view('home.index', compact('topRatedPosts' ,'recipes', 'posts'));

    }

}
