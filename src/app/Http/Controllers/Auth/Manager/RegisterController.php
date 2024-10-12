<?php

namespace App\Http\Controllers\Auth\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\RegisterRequest;
use App\Models\Manager;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.manager.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['name'] = "{$data['lastname']} {$data['firstname']} {$data['surname']}";
        if ($request->input('is_active'))
        {
            $data['is_active'] = 1;
        } else
        {
            $data['is_active'] = 0;
        }

        Manager::create($data);
        return redirect(route('manager-login.form'));
    }
}
