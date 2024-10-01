<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\User\InfoRequest;

class UsersController extends Controller
{
    public function getUser(InfoRequest $request)
    {
        $request->rules();

        if (isset($request->file()['userAvatar'])) {
           $request->file('userAvatar')->store('images/users/avatars');
        }

        if (isset($request->file()['userResume'])) {
            $request->file('userResume')->store('images/users/resume');
        }

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
