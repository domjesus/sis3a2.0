<?php

namespace sis3a_oficial\Http\Middleware;

use Closure;

class AdminChecker
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
        if(session('nivel_acesso') < 2)
            return response()->view('acess_denied');

        return $next($request);
    }
}
