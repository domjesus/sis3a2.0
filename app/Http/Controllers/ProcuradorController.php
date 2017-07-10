<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;

use sis3a_oficial\Http\Requests;
use sis3a_oficial\Models\Procurador;
use sis3a_oficial\Http\Middleware\util\povoaObj;


class ProcuradorController extends Controller
{
    public function showform(){
    	return view('procuradores.incluir');
    }
    public function incluir(Request $request){

    	$povoa = new povoaObj(new Procurador,$request,array(''));
    	$model = $povoa->povoa();
        $model->__set('id_ol',session('id_ol'));
        $model->__set('id_user',session('id_user'));
        $model->__set('ativo',1);

    	if(!$model->save())
    		return "Erro ao gravar!";

        return "Gravado com Sucesso!";

    }

    public function alterar(Request $request){
    	$procurador = Procurador::find($request->id);

        $povoa = new povoaObj($procurador,$request,array(''));
    	$model = $povoa->povoa();
		
		if(!$model->save())
    		return "Erro ao gravar!";

        return "Gravado com Sucesso!";
    
    }


    public function listar(){
    	$procuradores = Procurador::all()->where('id_ol',session('id_ol'));
    	return view('procuradores.listar',['procuradores'=>$procuradores]);
    }

    public function inativar(Request $request){

        $procurador = Procurador::find($request->id);

        $procurador->__set('ativo',0);

        if(!$procurador->save())
            return "Erro ao gravar!";

        return "Gravado com Sucesso!";
    
    	
    }
}
