<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Article\StoreRequest;
class ArticlesController extends Controller
{
    public function store(StoreRequest $request)
    {
        if (!is_null($request->file())) {
            $file = $request->file('articleImg')->store('images/articles');
            $path = config('app.url')."storage/$file";
            dd($path);
        }
    }
}
