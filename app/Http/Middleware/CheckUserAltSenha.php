<?php

namespace sis3a_oficial\Http\Middleware;

use Closure;

class CheckUserAltSenha
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
        if(session('user_id') != $request->id)
            return response()->view('acess_denied');

        return $next($request);
    }
}
