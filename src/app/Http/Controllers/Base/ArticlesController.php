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
        $request->rules();
        if (!is_null($request->file())) {
            $request->file('articleImg')->store('images/articles');
        }
    }
}
