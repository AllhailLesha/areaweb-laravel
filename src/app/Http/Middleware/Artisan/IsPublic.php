<?php

namespace App\Http\Middleware\Artisan;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsPublic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        /**
         * @var Article $article
         */
        $article = $request->route('article');
        return $article->is_public ? $next($request) : abort(403);
    }
}
