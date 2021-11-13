<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DoctorAnalystUserPermissions
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
        if (session('role') == 'analyst' || session('role') == 'doctor' || session('role') == 'patient')
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
