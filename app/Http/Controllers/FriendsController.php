<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{

    public function index(User $user)
    {
        $friends=$user->getAllFriendships();

        $user = User::all()->pluck('username');

        $profiles = Profile::all();

        return view('acquaintances.index', compact('friends', 'user', 'profiles'));
    }

}
