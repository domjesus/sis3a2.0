<?php

namespace sis3a_oficial\Http\Middleware;

use Closure;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /**
     TODAS AS REQUISICOES PASSAM POR ESTE MIDDLEWARE 
     O QUAL VERIFICA SE ESTA LOGADO
    */
    public function handle($request, Closure $next)
    {
        if(!session()->has('user_name'))
            return redirect('/');


        return $next($request);
    }
}
