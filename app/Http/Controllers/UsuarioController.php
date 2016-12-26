<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;
use sis3a_oficial\Http\Requests;
use DB;
use sis3a_oficial\Http\Middleware\util\povoaObj;
use sis3a_oficial\Models\User;
use sis3a_oficial\Models\Ol;
use sis3a_oficial\Models\Cargo;
use sis3a_oficial\Models\Nivel_Acesso;


class UsuarioController extends Controller
{

	private $excluded_fields;

    public function listar(Request $request){
    	
        return view('usuarios.listar',['users'=>DB::select('select * from users')]);	
    }

    public function showform(Request $request){
    	return view('usuarios.incluir',['ol'=>Ol::all(),'nivel_acesso'=>Nivel_Acesso::all(),'cargo'=>Cargo::all()]);
    }

    public function incluir(Request $request){
    	
    	$this->validate($request,[
    		'matricula'=>'required|min:7',
    		'passwd'=>'required|min:6',
    		'cpf'=>'min:11',
        ]);

	   	$excluded_fields[] = 'passwd_confirm';
    	$povoa = new povoaObj(new User,$request,$excluded_fields);
    	$model = $povoa->povoa();
        
    	if(!$model->save())
    		return "Erro ao gravar!";

        return "Gravado com Sucesso!";
        
    }

    public function alterar(Request $request){

    	$excluded_fields[] = 'pass"wd_confirm';
        
                $usuario = User::find($request->id);
                $povoa_model = new povoaObj($usuario,$request,$excluded_fields);
                
                $model = $povoa_model->povoa();
        
                if(!$model->save())
                    return "Erro ao gravar!";
        
                return "Alterado com Sucesso!";
                    
            }
        
            public function altera_senha(Request $request){
        
                $senha_atual = User::find($request->id)->value('passwd');
                
                if($senha_atual != md5($request->input('passwd')))
                    return "Senha atual nao confere";

                $user = User::find($request->id);
                $user->__set('passwd',md5($request->input('passwd_new')));
                if($user->save()){
                    session()->flush();
                    return ("Alterado com sucesso! Faca logon novamente!");                    
                }

                return "Erro na atualizacao!";
            }

            public function esqueceu_senha(Request $request){
                $id_user = User::where('matricula',$request->input('matricula'))->value('id');
                
                $user = User::find($id_user);

                if(!$user)
                    return "Usuario nao encontrado";

                $user->__set('cpf',$request->input('cpf'));
                $user->__set('passwd',md5($request->passwd));

                if ($user->save()){
                    //session()->flush();
                    return ("Alterado com sucesso! Faca logon novamente! <a href='/'>Voltar</a>");                    
                }
        
                return "Erro na atualizacao!";

            }

/** 
  Messages customizeds
  @return array
**/    
    public function messages(){
    	return [
    		'matricula.min'=>'A matricula deve ter no minimo 7 caracs',
    		'cpf.min'=>'CPF preencha direito',
    	];
    }
}