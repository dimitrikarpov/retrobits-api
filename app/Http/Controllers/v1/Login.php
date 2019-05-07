<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\v1\LoginRequest;
use App\Http\Controllers\Controller;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = auth()->user();

            return response()->json([
                'token' => $user->createToken('Password Token')->accessToken,
                'name' => $user->name,
                'email' => $user->email,
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
