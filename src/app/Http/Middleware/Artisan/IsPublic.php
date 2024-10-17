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

        if (!$article->is_public)
        {
            if (str_contains($request->route()->getPrefix(), 'api'))
            {
                return \response()->json(['message' => 'No access'], 403);
            }
            return abort(403);
        }
            return $next($request);
    }
}
