<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function create(Request $request)
    {
        dd($request->only(['title', 'text']));
    }
}
