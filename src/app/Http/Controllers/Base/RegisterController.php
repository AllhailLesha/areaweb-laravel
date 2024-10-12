<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }

    public function register(RegisterRequest $request)
    {
        User::create($request->validated());
        return redirect(route('login.form'))->with(['success' => 'Вы успешно зарегестрировались!']);
    }
}
