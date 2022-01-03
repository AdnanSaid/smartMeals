<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AcquaintancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('acquaintances.index');
    }

    public function friendList(User $user) {
        $user->getAllFriendships();

        return view("/followers/{$user->id}");
    }
}
