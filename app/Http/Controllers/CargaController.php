<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;
use sis3a_oficial\Models\Procurador;
use sis3a_oficial\Models\Processo;
use sis3a_oficial\Models\Carga;
use sis3a_oficial\Http\Requests;
use sis3a_oficial\Http\Middleware\util\povoaObj;
use sis3a_oficial\Http\Middleware\util\TrataDatas;


class CargaController extends Controller
{
    public function povoateForm(Request $request){
        $processo = Processo::find($request->id);
    	
    	return view('carga.incluir',['processo'=>$processo,'procuradores'=>Procurador::all()->where('id_ol',session('id_ol'))]);
    }

    public function incluir(Request $request){


    	$povoa = new povoaObj(new Carga,$request,array('nb','nome'));
    	$model = $povoa->povoa();

    	$model->__set('id_user',session('id_user'));
        $model->__set('id_ol',session('id_ol'));
        $model->__set('ativo',1);

    	if(!$model->save())
            return "Erro ao gravar!";

        return "Gravado com Sucesso!";
        
    }

    public function alterarShowForm(Request $request){
    	$carga = Carga::find($request->id);
    	
    	$processo = Processo::find($carga['id_processo']); 
    	//echo $id_procurador;
        return view('carga.alterar',['processo'=>$processo,'procuradores'=>Procurador::all()->where('id_ol',session('id_ol')),'carga'=>$carga]);
    }

    public function alterar(Request $request){
    	$carga = Carga::find($request->id);
    	
    	$carga->__set('dt_carga',TrataDatas::convertDateToUs($request->dt_carga));

    	if($request->has('dt_devolucao'))
    		$carga->__set('dt_devolucao',TrataDatas::convertDateToUs($request->dt_devolucao));

    	if(!$carga->save())
     		return "Erro ao gravar!";

        return "Gravado com Sucesso!";
        

    }

    public function altCargaDevShowForm(Request $request){
    	$carga = Carga::find($request->id);
    	$processo = Processo::find($carga['id_processo']);
    	    	
    	return view('carga.alterar',['flag'=>true,'carga'=>$carga,'processo'=>$processo,'procuradores'=>Procurador::all()]);
    }

    public function ativos(){
    	return view('carga.consultar',['ativos'=>true,'cargas'=>Carga::all()->where('id_ol',session('id_ol'))->where('ativo','1')]);
    }

    public function gera_doc(Request $request){
        return view('carga.gera_doc',['carga'=>Carga::find($request->id)]);
    }

    public function excluir(Request $request){
        $carga = Carga::find($request->id);
        $carga->ativo = 0;

        if(!$carga->save())
            return "Erro na gravacao";

        return "Gravado com sucesso!";
    }

    public function reativar(Request $request){
        $carga = Carga::find($request->id);
        $carga->ativo = 1;

        if(!$carga->save())
            return "Erro na gravacao";

        return "Gravado com sucesso!";
    }

    public function inativos(){

        return view('carga.consultar',['cargas'=>Carga::all()->where('id_ol',session('id_ol'))->where('ativo','0')]);

    }
    
}
