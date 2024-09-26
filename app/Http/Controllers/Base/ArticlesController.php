<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function create(Request $request)
    {
        $data = [
            'string' => 'test',
            'number' => 333.2,
        ];

        $validator = Validator::make($data, [
            'string' => ['required', 'string', 'max:10'],
            'number' => ['required', 'int', 'max:50'],
        ]);

        $request->validate([
            'title' => [
                'required',
                'string',
                'min:2',
                'max:10'
            ],
            'text' => [
                'required',
                'string',
                'min:1',
                'max:100'
            ],
            'articleImg' => [
                'required',
                'image',
                'mimes:png,svg',
                'max:1000'
            ]
        ]);

        if (!is_null($request->file())) {
            $file = $request->file('articleImg')->store('images/articles');
            $path = config('app.url')."storage/$file";
            dd($path);
        }
    }
}
