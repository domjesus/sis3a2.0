<?php
namespace sis3a_oficial\Http\Middleware;

use Closure;
use sis3a_oficial\Models\User;
use DB;
use sis3a_oficial\Http\Middleware\util\GravaSecao;
use sis3a_oficial\Models\Ol;


class Logar{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
public function handle($request, Closure $next){
        //DB::insert('insert into users (matricula,nome,passwd,nivel_acesso,id_ol,id_cargo) values(?,?,?,?,?,?)',['1563654','wandeir carneiro','1234','2',1,2]);
		$dados_user = array();
        $user = User::where([ 
                    ['passwd',md5($request->passwd)],
                    ['matricula',$request->matricula]
                ])->get();
        foreach($user as $user){
            $dados_user['nome']         = $user->nome;
            $dados_user['nivel_acesso'] = $user->nivel_acesso;
            $dados_user['id_ol']        = $user->id_ol;
            $dados_user['id_user']      = $user->id; 
        }
        //$user = DB::select('select * from users where matricula = ? and passwd = ?',[$request->matricula,$request->passwd]);
                
        if(count($user) > 0){
          $ol = Ol::find($dados_user['id_ol']);
          GravaSecao::grava($request->matricula,$dados_user['nome'],$dados_user['nivel_acesso'],$dados_user['id_ol'],$dados_user['id_user'],$ol['numero'],$ol['nome']);
          return view('home',['user'=>$user,'ol'=>$ol]);
        }
        else return view('index',['login_error'=>true,'matricula'=>$request->matricula,'passwd'=>$request->passwd]);

        //return $next($request);

	}
}

?>