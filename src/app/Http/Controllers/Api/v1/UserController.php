<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\LoginRequest;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {

        if (!Auth::attempt($request->validated()))
        {
            return response()->json([
                "message" => "invalid email",
            ], 401);
        }

        $token = auth()->user()->createToken('api:token');

        return [
            'token' => $token->plainTextToken,
        ];
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
    }
}
