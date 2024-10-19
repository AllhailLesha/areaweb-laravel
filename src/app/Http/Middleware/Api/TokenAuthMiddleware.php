<?php

namespace App\Http\Middleware\Api;

use App\Models\Token;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TokenAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $token = Token::query()->where('token', $token)->first();


        if (!is_null($token))
        {
            return $next($request);
        }

        Auth::setUser($token->user);

        return response()->json([
            "message" => "for viewing article authorisation"
        ], 403);
    }
}
