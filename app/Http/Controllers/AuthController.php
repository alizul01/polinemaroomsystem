<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];
            return response($response, 200);
        } else {
            $response = "Email or password is wrong!";
            return response($response, 422);
        }
    }
}
