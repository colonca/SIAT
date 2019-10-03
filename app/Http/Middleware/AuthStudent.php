<?php

namespace App\Http\Middleware;

use Closure;

class AuthStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(session()->has('estudiante')){
            return redirect('login/estudiante');
        }

        return $next($request);
    }
}
