<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSignUpDataStore;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function signup(UserSignUpDataStore $request)
    {
        User::create([
           'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return response()->json([
            'message' => 'Successfully created user!'
        ], Response::HTTP_CREATED );
    }

    public function login()
    {

    }
}
