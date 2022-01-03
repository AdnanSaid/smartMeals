<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('{any}', 'AppController@index')
//    ->where('any', '.*')
//    ->middleware('auth')
//    ->name('house');

Route::get('dashboard/profile', 'ProfilesController@show');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

Route::get('/categories', 'CategoryController@index');
Route::get('subcategories/get/{id}', 'RecipesController@getSubCat');

Route::get('/plans/create', 'PlansController@create');
Route::post('/pl', 'PlansController@store');

Route::get('/recipes/create', 'RecipesController@create');
Route::post('/r', 'RecipesController@store');
Route::get('/r/{recipe}', 'RecipesController@show');
Route::delete('/r/{recipe}', 'RecipesController@destroy');

Route::get('/', 'PostsController@index')->name('post.index');
Route::get('/post/create', 'PostsController@create')->name('post.create');
Route::post('/p', 'PostsController@store')->name('post.store');
Route::get('/p/{post}', 'PostsController@show')->name('post.show');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profiles.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::post('/{user:name}/befriend', 'ProfilesController@befriendUser')->name('user.befriend');
Route::post('{user:name}/unfriend', 'ProfilesController@unfriendUser')->name('user.unfriend');

Route::get('/followers/{user}', 'AcquaintancesController@index')->name('acquaintances.index');

});


