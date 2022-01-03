<?php

namespace App\Http\Controllers;


use App\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $plans = Plan::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('meal.create.index', compact($plans));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store()
    {
//        dd(\request()->all());
        $data = request()->validate([
            'title' => 'required',
            'breakfast' => 'required',
            'lunch' => 'required',
            'dinner' => 'required',
            'snack' => 'required',
        ]);

        auth()->user()->plans()->create([
            'title' => $data['title'],
            'breakfast' => $data['breakfast'],
            'lunch' => $data['lunch'],
            'dinner' => $data['dinner'],
            'snack' => $data['snack'],
        ]);

        return redirect('/profiles/' . auth()->user()->id);
    }


}
