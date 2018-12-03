<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('user', compact('user','users'));
    }
    public function listOfUser(){
        $user= null;
        $users = User::where('id', '!=', Auth::id())->get();
        return view('user', compact('user','users'));
    }
    public function follow(Request $request, User $user)
    {
        if($request->user()->canFollow($user)) {
            $request->user()->following()->attach($user);
        }
        return redirect()->back();
    }

    public function unFollow(Request $request, User $user)
    {
        if($request->user()->canUnFollow($user)) {
            $request->user()->following()->detach($user);
        }
        return redirect()->back();
    }
}
