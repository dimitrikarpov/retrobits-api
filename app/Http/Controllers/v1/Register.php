<?php

namespace App\Http\Controllers\v1;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

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
