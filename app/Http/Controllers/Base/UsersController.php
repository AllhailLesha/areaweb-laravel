<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UsersController extends Controller
{
    public function getUser(Request $request)
    {
        $request->validate([
            'userName' => ['required', 'string', 'max:100'],
            'userAge' => ['required', 'integer', 'max:100'],
            'userCountry' => ['required', 'string', 'max:30'],
            'userHobby' => ['required', 'string', 'max:150'],
            'userAbout' => ['nullable', 'string', 'max:300'],
            'userAvatar' => ['required', 'image', 'mimes:png,jpeg,jpg', 'max:2048'],
            'userResume' => ['required', 'file', 'mimes:pdf', 'max:1024'],
        ]);

        $user = [
            'name' => $request->input('userName'),
            'age' => $request->input('userAge'),
            'country' => $request->input('userCountry'),
            'hobby' => $request->input('userHobby'),
            'about' => $request->input('userAbout'),
        ];
        return view('pages.userInfo', $user);
    }
}
