<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;
use sis3a_oficial\Models\Ol;
use sis3a_oficial\Models\Tipo_Processo;
use sis3a_oficial\Models\Especie;
use sis3a_oficial\Models\Procurador;
use DB;
use sis3a_oficial\Http\Requests;

class ProcessosController extends Controller
{
    public function showform(){
    	$tipo_processo = Tipo_Processo::all();
    	$ols = Ol::all();
    	$especies = Especie::all();
    	$procuradores = Procurador::all();
    	//DB::insert('insert into procuradores (nome,oab,nit,escritorio,telefone,celular,email,id_ol,id_servidor,ativo) values(?,?,?,?,?,?,?,?,?,?)',['maria procuradora','998877','9.666.5455.444-9','da maria','32828877','774664777','maria@adv.com.br',1,1,1]);
    	return view('processos.incluir',['tipo_processo'=>$tipo_processo,'especies'=>$especies,'ols'=>$ols,'procuradores'=>$procuradores]);
    }

    public function incluir(Request $request){

    }
}
