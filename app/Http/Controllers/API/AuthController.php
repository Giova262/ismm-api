<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => '',
            'email' => '',
            'password' => '',
        ]);

        $validateData['password'] = Hash::make($request->password);
        $user = User::create($validateData);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'user' => $user,
            'accessToken' => $accessToken,
        ]);
    }

    public function login(Request $request )
    {
        $loginData = $request->validate([
            'name' => '',
            'email' => '',
            'password' => '',
        ]);

        //return (array)auth() ;

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'credenciales invaliudas'], 422);
        }


        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response([
            'user' => auth()->user(),
            'accessToken' => $accessToken,
        ]);

    }
}
