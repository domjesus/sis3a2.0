<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;

use sis3a_oficial\Http\Requests;
use DB;

use sis3a_oficial\Models\Tipo_Processo;
use sis3a_oficial\Models\Procurador;
use sis3a_oficial\Models\Especie;
use sis3a_oficial\Models\ComunicadoTipo;


class RequisicoesAjaxController extends Controller
{
    public function incluir(Request $request){

     $resposta = ""; 

     switch($request->table){
      case 'tipo_processos':
      DB::insert("insert into tipo_processos(nome,abreviado) values(?,?)",[$request->nome,$request->campo2]);
      $tipos = Tipo_Processo::all();

      foreach($tipos as $tipos)
        $resposta .= "<option value='$tipos->id' title='$tipos->abreviado'>$tipos->nome</option>";
      $resposta .= "<option value='incluir'>Incluir</option>";
      break;

      case 'especies':
      DB::insert("insert into especies(numero,nome) values(?,?)",[$request->nome,$request->campo2]);
      $especies = Especie::all();

      foreach($especies as $especies)
        $resposta .= "<option value='$especies->id' title='$especies->nome'>$especies->numero</option>";
      
      $resposta .= "<option value='incluir'>Incluir</option>";
      break;

      case 'procuradores':
      DB::insert("insert into procuradores(nome,telefone,id_ol,id_user,ativo) values(?,?,?,?,?)",[$request->nome,$request->campo2,session('id_ol'),session('id_user'),1]);
      $procuradores = Procurador::all()->where('id_ol',session('id_ol'))->where('ativo','1');

      foreach($procuradores as $procuradores)
        $resposta .= "<option value='$procuradores->id'>$procuradores->nome</option>";

      $resposta .= "<option value='incluir'>Incluir</option>";
      break;

     case 'mobstatus':
      DB::insert("insert into mobstatus(nome) values(?)",[$request->nome]);
      $mobstatus = DB::select('select * from mobstatus');

      foreach($mobstatus as $mobs)
        $resposta .= "<option value='$mobs->id'>$mobs->nome</option>";

      $resposta .= "<option value='incluir'>Incluir</option>";
      break;


      case 'p04status':
      DB::insert("insert into p04status(nome) values(?)",[$request->nome]);
      $p04status = DB::select('select * from p04status');

      foreach($p04status as $p04status)
        $resposta .= "<option value='$p04status->id'>$p04status->nome</option>";

      $resposta .= "<option value='incluir'>Incluir</option>";
      break;

      case 'p04concpericia':
       DB::insert("insert into p04concpericia(nome) values(?)",[$request->nome]);
       $p04concpericia = DB::select('select * from p04concpericia');

       foreach($p04concpericia as $p04concpericia)
        $resposta .= "<option value='$p04concpericia->id'>$p04concpericia->nome</option>";

       $resposta .= "<option value='incluir'>Incluir</option>";
      break;

      case 'comunicadostipos':

       $com_tipo = new ComunicadoTipo;
       
       $com_tipo->__set('nome',$request->nome);
       $com_tipo->__set('id_ol',session('id_ol'));
       $com_tipo->__set('id_user',session('id_user'));
       $com_tipo->__set('ativo',1);
             
       $com_tipo->save();
      
       $comunicadostipos = ComunicadoTipo::all();

       foreach($comunicadostipos as $ctp)
        $resposta .= "<option value='$ctp->id'>$ctp->nome</option>";

       $resposta .= "<option value='incluir'>Incluir</option>";

      break;



    }//FIM DO SWITCH
    //$resposta = 'alguma resposta no controller';
    echo $resposta;
     
    }
}
