<?php

namespace App\Http\Controllers\v1;

use App\Http\Requests\v1\RegisterRequest;
use App\User;
use App\Http\Controllers\Controller;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('Password Token')->accessToken;

        return response()->json([
            'token' => $token,
            'name' => $request->name,
            'email' => $request->email,
        ], 200);
    }
}
