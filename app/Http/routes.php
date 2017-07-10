<?php

use sis3a_oficial\Models\Procurador;
use sis3a_oficial\Models\User;
use sis3a_oficial\Models\Ol;
use sis3a_oficial\Models\Nivel_Acesso;
use sis3a_oficial\Models\Cargo;




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::post('/logar/','LogarController@index');


Route::group(['middleware'=>'check'],function(){

Route::get('/home/',function(){
	return response()->view('home');
});

	
Route::group(['middleware'=>'admin'],function(){
//ROTAS PRA ADMIN
	Route::get('/usuarios/incluir/','UsuarioController@showform');
	Route::get('/usuarios/listar/','UsuarioController@listar');
	Route::get('/usuarios_alterar/{id}',function($id){
 	 return view('usuarios.alterar',['user'=>User::find($id),'ol'=>Ol::all(),'nivel_acesso'=>Nivel_Acesso::all(),'cargo'=>Cargo::all()]);
	});
});//fim do route admin, checa privilegios de acordo com o nivel de acesso
//acesso permitido somente para nivel >=2
	Route::get('/processos/represados/','ProcessoController@listar');
	Route::get('/processos/incluir/','ProcessoController@showform');
	Route::get('/procurador/incluir/','ProcuradorController@showform');
	

	Route::get('/processo/exigencia/{id}','ProcessoController@exigenciashowform');

	Route::get('/processos/concluidos','ProcessoController@concluidos');

	Route::get('/processos/alterar/{id}','ProcessoController@showFormAltera');
	
	Route::get('/carga/incluir/{id}','CargaController@povoateForm');
	Route::get('/carga/alterar/{id}','CargaController@alterarShowForm');
	Route::get('/carga/alterar_dev/{id}','CargaController@altCargaDevShowForm');
	
	Route::get('/carga/ativos/','CargaController@ativos');
	Route::get('/carga/inativos/','CargaController@inativos');

	Route::get('/procurador/listar/','ProcuradorController@listar');
	Route::get('/senha/altera/',function(){
 	 return view('usuarios.alterasenha',['user'=>User::find(session('id_user'))]);
	})->middleware('checkuser');

	Route::get('/procurador/incluir/{id}',function($id){
 	 return view('procuradores.alterar',['procurador'=>Procurador::find($id)]);
	});

	Route::get('/comunicados/incluir/','ComunicadosController@showForm');
	Route::get('/fundamentacao/incluir/','FundamentacaoController@showForm');
	Route::get('/fundamentacao/listar','FundamentacaoController@listar');
	Route::get('/fundamentacao/alterar/{id}','FundamentacaoController@alterarPovoaForm');
	Route::get('/carga/gera_doc/{id}','CargaController@gera_doc');
});
//fim do route group que checa todas as rotas pra ver se o
//usuario esta logado ou nao, se nao tiver, redireciona
//pra '/'
//ate aprender a checar como o Route::auth();

Route::post('/usuarios/incluir/','UsuarioController@incluir');
Route::post('/usuarios/alterar/{id}','UsuarioController@alterar');
Route::post('/processo/incluir','ProcessoController@incluir');
Route::post('/processo/excluir/{id}','ProcessoController@excluir');
Route::post('/processo/reativar/{id}','ProcessoController@reativar');
Route::post('/carga/reativar/{id}','CargaController@reativar');

Route::post('/altera/senha/{id}','UsuarioController@altera_senha');
Route::post('/procurador/incluir','ProcuradorController@incluir');
Route::post('/procurador/incluir/{id}','ProcuradorController@alterar');
Route::post('/procurador/inativar/{id}','ProcuradorController@inativar');
Route::post('/processo/atualizar/{id}','ProcessoController@atualiza');
Route::post('/carga/incluir/{id}','CargaController@incluir');
Route::post('/carga/alterar/{id}','CargaController@alterar');
Route::post('/carga/excluir/{id}','cargaController@excluir');
Route::post('/comunicados_ajax/','ComunicadosController@ajax');
Route::post('/comunicados/incluir/','ComunicadosController@incluir');
Route::post('/fundamentacao/incluir/','FundamentacaoController@incluir');
Route::post('/fundamentacao_alterar/{id}','FundamentacaoController@alterar');
Route::post('/processo/exigencia/incluir/{id}','ProcessoController@exigencias_incluir');
Route::post('/inclusoes_ajax/','RequisicoesAjaxController@incluir');
/**
REQUISICOESAJAXCONTROLLER
ESTE CONTROLLER EH RESPONSAVEL POR FAZER REQUISICOES AJAX,
PARA INCLUIR ESPECIE, PROCURADORES OU TIPO DE PROCESSO, SEM
PRECISAR ACESSAR E/OU IMPLEMENTAR UM FORM PARA TAL INCLUSAO

**/


Route::get('/esqueceu_senha/{matricula}',function($matricula){
 return view('usuarios.esqueceusenha',['matricula'=>$matricula]);
});
Route::post('/esqueceu_senha','UsuarioController@esqueceu_senha');
Route::get('/logout/',function(){
	session()->flush();
	return view('loged_out');
});

//Route::check();