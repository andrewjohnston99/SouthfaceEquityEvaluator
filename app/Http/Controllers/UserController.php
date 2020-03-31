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
        return view('settings')->with('user', auth()->user());
    }

    // public function security() {
    //     $uid = auth()->user()->id;

    //     $user = User::where('user_id', $uid);

    //     return view('settings')->with('user', $user);
    // }

    /**
     * Change Password and Redirect to Home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->user()->id],
            'userOrganization' => ['max:255'],
        ]);

        User::find(auth()->user()->id)->update(['name'=> ($request->name)]);
        User::find(auth()->user()->id)->update(['email'=> ($request->email)]);
        User::find(auth()->user()->id)->update(['organization'=> ($request->userOrganization)]);

        return redirect('/settings/account');
    }
}
