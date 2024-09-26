<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UsersController extends Controller
{
    public function getUser(Request $request)
    {
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
