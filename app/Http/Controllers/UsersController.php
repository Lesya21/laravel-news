<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile(Request $request)
    {
        $user = User::where('email', $request->user()->email)->first();

        return view('home', [
            'user' => $user
        ]);
    }
}
