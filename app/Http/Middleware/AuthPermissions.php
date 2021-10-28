<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->path() == "login" && !session('id_user'))
        {
            return $next($request);
        }
        elseif ($request->path() == "register" && !session('id_user'))
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
