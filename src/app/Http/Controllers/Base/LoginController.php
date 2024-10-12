<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated(), true))
        {
            return redirect(route('home'));
        } else
        {
            return redirect()->back()->withErrors(['auth_error' => "Incorrect credentials"]);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
