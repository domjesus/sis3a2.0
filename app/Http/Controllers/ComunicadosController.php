<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;

use sis3a_oficial\Http\Requests;
use sis3a_oficial\Models\ComunicadoTipo;
use sis3a_oficial\Models\Comunicado;
use sis3a_oficial\Http\Middleware\util\TrataDatas;

class ComunicadosController extends Controller
{
    public function showForm(){

    	return view('comunicados.incluir',['comunicados_tipos'=>ComunicadoTipo::all()]);
    }

    public function incluir(Request $request){
    	$comunicado = new Comunicado;

    	$comunicado->__set('id_comunicado_tipo',$request->id_comunicado_tipo);
    	$comunicado->__set('dt_comunicado',TrataDatas::convertDateToUs($request->data));
    	$comunicado->__set('destino',$request->destino);
    	$comunicado->__set('id_user',session('id_user'));
    	$comunicado->__set('id_ol',session('id_ol'));
    	$comunicado->__set('ativo',1);

    	$file = $request->file;

    	$file->move('docs','meudoc.pdf');

    	if(!$comunicado->save())
    		return "Erro ao salvar!";

    	return "Gravado com sucesso!";

    }

    public function listar(){

    }

    public function ajax(Request $request){
    	var_dump($request->all());
    }


}
