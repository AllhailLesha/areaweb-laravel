<?php

namespace App\Http\Controllers\Auth\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\LoginRequest;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.manager.login');
    }

    public function login(LoginRequest $request)
    {
        if (Manager::wherePhone($request->input('phone'))->first()->is_active) {
            if (Auth::guard('manager')->attempt($request->validated(), true))
            {
                return redirect(route('home'));
            } else
            {
                return redirect()->back()->withErrors(['auth_error' => "Incorrect credentials"]);
            }
        } else {
            return redirect()->back()->withErrors(['auth_error' => "Ваш аккаунт деактивирован. Обратитесь в поддержку."]);
        }
    }

    public function logout()
    {
        Auth::guard('manager')->logout();
        return redirect(route('home'));
    }
}
