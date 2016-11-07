<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(User::all());
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $user->fill($request->except(['username', 'password']));
        $user->save();

        return response()->json($user);
    }
}
