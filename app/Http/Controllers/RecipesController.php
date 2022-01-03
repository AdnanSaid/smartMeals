<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RecipesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $recipes = Recipe::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('recipes.index', compact($recipes));
    }

    public function create()
    {
        $subcategories = Subcategory::all();
        return view ('recipes.create', compact('subcategories'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => ['required', 'image'],
            'subcategories_id' => [],
            'prep_time' => ['required', 'date_format:H:i'],
            'cook_time' => ['required', 'date_format:H:i'],
//                'servings' => 'required',
//                'difficulty' => 'required',
//                'calorie' => 'integer',
//                'fat' => 'integer',
//                'saturates' => 'integer',
//                'carbs' => 'integer',
//                'sugars' => 'integer',
//                'fibre' => 'integer',
//                'protein' => 'integer',
//                'salt' => 'integer',
            'ingredients' => 'required',
            'steps' => 'required',
        ]);

        $imagePath = request('image')->store('recipes', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->recipes()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath,
            'subcategories_id' => $data['subcategories_id'],
            'prep_time' => $data['prep_time'],
            'cook_time' => $data['cook_time'],
            'ingredients' => $data['ingredients'],
            'steps' => $data['steps'],
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect('/profiles/' .auth()->user()->id);
    }

}
