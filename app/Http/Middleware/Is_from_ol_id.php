<?php

namespace sis3a_oficial\Http\Middleware;

use sis3a_oficial\Models\Processo;


use Closure;

class Is_from_ol_id
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
        $processo = Processo::find($request->id);
        
        $id_ol = $processo->id_ol;
        $id_user = $processo->id_user;
        
         if(false)
          return response()->view('acess_denied');
        
        
        return $next($request);
    }
}
