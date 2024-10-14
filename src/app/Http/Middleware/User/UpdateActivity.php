<?php

namespace App\Http\Middleware\User;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\Response;

class UpdateActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next):Response
    {
        /**
         * @var User $user
         */

        if (Auth::check())
        {
            $user = Auth::user();
            $user->update([
                'last_activity' => Date::now(),
            ]);
        }

        return $next($request);
    }
}
