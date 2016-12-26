<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;

use sis3a_oficial\Http\Requests;
use DB;

use sis3a_oficial\Models\Tipo_Processo;
use sis3a_oficial\Models\Procurador;
use sis3a_oficial\Models\Especie;


class RequisicoesAjaxController extends Controller
{
    public function incluir(Request $request){
     $resposta = "";

	 

     switch($request->table){
      case 'tipo_processos':
      DB::insert("insert into $request->table(nome,abreviado) values(?,?)",[$request->nome,$request->campo2]);
      $tipos = Tipo_Processo::all();

      foreach($tipos as $tipos)
      	$resposta .= "<option value='$tipos->id' title='$tipos->abreviado'>$tipos->nome</option>";
      $resposta .= "<option value='incluir'>Incluir</option>";
      break;

      case 'especies':
      DB::insert("insert into $request->table(numero,nome) values(?,?)",[$request->nome,$request->campo2]);
      $especies = Especie::all();

      foreach($especies as $especies)
      	$resposta .= "<option value='$especies->id' title='$especies->nome'>$especies->numero</option>";
      
      $resposta .= "<option value='incluir'>Incluir</option>";
      break;

      case 'procuradores':
      DB::insert("insert into $request->table(nome,telefone,id_ol,id_servidor,ativo) values(?,?,?,?,?)",[$request->nome,$request->campo2,session('id_ol'),session('id_user'),1]);
      $procuradores = Procurador::all();

      foreach($procuradores as $procuradores)
      	$resposta .= "<option value='$procuradores->id'>$procuradores->nome</option>";

      $resposta .= "<option value='incluir'>Incluir</option>";
      break;
    }//FIM DO SWITCH
    echo $resposta;
     
    }
}
