<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Show the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $uid = auth()->user()->id;

        $user = User::where('user_id', $uid);

        return view('settings')->with('user', $user);
    }

    // public function security() {
    //     $uid = auth()->user()->id;

    //     $user = User::where('user_id', $uid);

    //     return view('settings')->with('user', $user);
    // }

    public function update(Request $request) {
        $uid = auth()->user()->id;

        dd($request);
        // User::where('user_id', $uid)
    }
}
