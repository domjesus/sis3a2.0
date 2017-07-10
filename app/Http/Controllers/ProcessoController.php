<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;
use sis3a_oficial\Models\Ol;
use sis3a_oficial\Models\Tipo_Processo;
use sis3a_oficial\Models\Especie;
use sis3a_oficial\Models\Procurador;
use sis3a_oficial\Models\Processo;
use sis3a_oficial\Models\MobStatus;
use sis3a_oficial\Models\Portaria04Status;
use sis3a_oficial\Models\Portaria04ConcPericia;
use sis3a_oficial\Models\User;

//use sis3a_oficial\Http\Middleware\util\dompdf\dompdf_master\dompdf_config.inc;


use DB;

use sis3a_oficial\Http\Requests;
use sis3a_oficial\Http\Middleware\util\povoaObj;

class ProcessoController extends Controller
{

    public function showform(){
    	$tipo_processo = Tipo_Processo::all();
    	$ols = Ol::all();
    	$especies = Especie::all();
    	$procuradores = Procurador::all()->where('id_ol',session('id_ol'))->where('ativo','1');        
        $mobstatus = MobStatus::all();
    	//DB::insert('insert into procuradores (nome,oab,nit,escritorio,telefone,celular,email,id_ol,id_servidor,ativo) values(?,?,?,?,?,?,?,?,?,?)',['maria procuradora','998877','9.666.5455.444-9','da maria','32828877','774664777','maria@adv.com.br',1,1,1]);
    	
        return view('processos.incluir',['p04concpericia'=>Portaria04ConcPericia::all(),'p04status'=>Portaria04Status::all(),'mobstatus'=>$mobstatus,'tipo_processo'=>$tipo_processo,'especies'=>$especies,'ols'=>$ols,'procuradores'=>$procuradores]);
    }

    public function incluir(Request $request){
        
        $povoa = new povoaObj(new Processo,$request,array(''));
        $model = $povoa->povoa();
        
        $model->__set('id_user',session('id_user'));
        $model->__set('id_ol',session('id_ol'));
        $model->__set('ativo',1);
        
        if(!$model->save())
            return "Erro ao gravar!";

        return "Gravado com Sucesso!";
        
    }

    public function listar(Request $request){
        $processos = Processo::all()->where('id_ol',session('id_ol'))->where('ativo','1'); 
        return view('processos.listar',['processos'=>$processos]);
    }

    public function showFormAltera(Request $request){
        $tipo_processo = Tipo_Processo::all();
        $ols = Ol::all();
        $especies = Especie::all();
        $procuradores = Procurador::all()->where('id_ol',session('id_ol'));
        $mobstatus = MobStatus::all();

        if(Processo::find($request->id)->id_ol != session('id_ol'))
            return redirect('/processos/represados/');

        return view('processos.alterar',['p04concpericia'=>Portaria04ConcPericia::all(),'p04status'=>Portaria04Status::all(),'mobstatus'=>$mobstatus,'tipo_processo'=>$tipo_processo,'especies'=>$especies,'ols'=>$ols,'procuradores'=>$procuradores,'processo'=>Processo::find($request->id)]);
        
    } 

    public function atualiza(Request $request){
        $processo = Processo::find($request->id);

        $povoa = new povoaObj($processo,$request,array(''));
        $model = $povoa->povoa();

        if(!$request->has('exigencia')){
            $model->__set('exigencia',0);
        }
        if(!$request->has('exigencia_cumprida'))
            $model->__set('exigencia_cumprida',0);
        if(!$request->has('ppp'))
            $model->__set('ppp',0);
        if(!$request->has('rural'))
            $model->__set('rural',0);
        if(!$request->has('saiu_aps'))
            $model->__set('saiu_aps',0);

        if(!$model->save())
            return "Erro ao gravar!";

        return "Gravado com Sucesso!";
        

    }  

    public function excluir(Request $request){
        
        $processo = Processo::find($request->id);
        $processo->__set('ativo',0);

        if(!$processo->save())
            return "Erro ao gravar";

        return "Gravado com sucesso!";

    }

    public function exigenciashowForm(Request $request){
        return view('processos.exigencia',['processo'=>Processo::find($request->id)]);
    
    }

    public function concluidos(){
        return view('processos.concluidos',['processos'=>Processo::all()->where('id_ol',session('id_ol'))->where('ativo','0')]);
    }

    public function reativar(Request $request){
        
        $processo = Processo::find($request->id);

        $processo->__set('ativo','1');

        if(!$processo->save())
            return "Erro ao gravar";

        return "Gravado com Sucesso";
    }

    public function exigencias_incluir(Request $request){

        $processo = Processo::find($request->id);
        $user = User::find($processo->id_user);

        return response()->view('processos.exigencia_gera_carta',['processo'=>$processo,'exigencia'=>$request->exigencia_txt,'salvar'=>$request->salvar,'user'=>$user]);




    }
}
