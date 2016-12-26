<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;

use sis3a_oficial\Http\Requests;
use sis3a_oficial\Models\Procurador;

class ProcuradoresController extends Controller
{
    public function incluir(Request $request){

    }

    public function listar(){
    	$procuradores = Procurador::all();
    	return view('procuradores.listar',['procuradores'=>$procuradores]);
    }

    public function excluir(){
    	
    }
}
