<?php

namespace sis3a_oficial\Http\Controllers;


use Illuminate\Http\Request;

use sis3a_oficial\Http\Requests;
use sis3a_oficial\Models\Fundamentacoes;

class FundamentacaoController extends Controller
{
    public function showForm(){
    	return view('fundamentacao.incluir');
    }

    public function incluir(Request $request){
    	
    	$model = new Fundamentacoes;

    	$model->__set('nome',$request->nome);
    	$model->__set('txt_fundamentacao',$request->txt_fundamentacao);
		$model->__set('despacho',$request->despacho);
		
		if($request->has('abrangencia'))
			$model->__set('abrangencia',$request->abrangencia);
		
		$model->__set('id_ol',session('id_ol'));
		$model->__set('id_user',session('id_user'));
		$model->__set('ativo',1);

		$model->save();

		if(!$model->save())
            return "Erro ao gravar!";

        return "Gravado com Sucesso!";
        
    }

    public function listar(Request $request){
    	return view('fundamentacao.listar',['fundamentacoes'=>Fundamentacoes::all()->where('id_ol',session('id_ol'))]);
    }

    public function alterarPovoaForm(Request $request){
    	return view('fundamentacao.alterar',['fund'=>Fundamentacoes::find($request->id)]);
    }

    public function alterar(Request $request){
    	$model = Fundamentacoes::find($request->id);

    	$model->__set('nome',$request->nome);
    	$model->__set('txt_fundamentacao',$request->txt_fundamentacao);
		$model->__set('despacho',$request->despacho);
		
		if($request->has('abrangencia'))
			$model->__set('abrangencia',$request->abrangencia);

		if(!$model->save())
            return "Erro ao gravar!";

        return "Alterado com Sucesso!";

    }

}
