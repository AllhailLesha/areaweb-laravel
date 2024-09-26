<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function create(Request $request)
    {
        $file = $request->file('articleImg')->store('images/articles');
        $path = config('app.url')."storage/$file";
        dd($path);
    }
}
