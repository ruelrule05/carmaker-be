<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (is_null($user))
        {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'Invalid credentials.'
            ], 422);
        }

        if (Hash::check($request->password, $user->password))
        {
            $token = $user->createToken($request->device_name)->plainTextToken;

            return response()->json([
                'success'   =>  true,
                'user'      =>  $user,
                'token'     =>  $token
            ]);
        } else {
            return response()->json([
                'success'   =>  false,
                'message'   =>  'Invalid credentials.'
            ], 422);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($request->has('logout_all'))
        {
            $user->tokens()->delete();
        } else {
            $user->currentAccessToken()->delete();
        }

        return response()->json([
            'success'       =>  true,
            'message'       =>  'You have been logged out.'
        ]);
    }
}
