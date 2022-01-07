<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');
    }

    public function index(User $user, Profile $profile, Recipe $recipe)
    {
        $friends=$user->getFriends();

        return view('acquaintances.index', compact('friends', 'user'));
    }

}
