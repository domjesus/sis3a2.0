<?php
use sis3a_oficial\Models\User;
use sis3a_oficial\Models\Ol;
use sis3a_oficial\Models\Nivel_Acesso;
use sis3a_oficial\Models\Cargo;
use sis3a_oficial\Models\Procurador;
use sis3a_oficial\Models\Processo;;


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
Route::get('/usuarios_incluir/','UsuarioController@showform');
Route::get('/usuarios_listar/','UsuarioController@listar');
Route::get('/usuarios_alterar/{id}',function($id){
 return view('usuarios.alterar',['user'=>User::find($id),'ol'=>Ol::all(),'nivel_acesso'=>Nivel_Acesso::all(),'cargo'=>Cargo::all()]);
});

});//fim do route admin, checa privilegios de acordo com o nivel de acesso
//acesso permitido somente para nivel >=2
Route::get('/processos_represados/','ProcessoController@listar');
Route::get('/processos_incluir/','ProcessoController@showform');
Route::get('/procurador_incluir/','ProcuradorController@showform');
Route::get('/procurador_listar/','ProcuradorController@listar');
Route::get('/altera_senha/{id}',function($id){
 return view('usuarios.alterasenha',['user'=>User::find($id)]);
})->middleware('checkuser');

Route::get('/procurador_incluir/{id}',function($id){
 return view('procuradores.alterar',['procurador'=>Procurador::find($id)]);
});

});
//fim do route group que checa todas as rotas pra ver se o
//usuario esta logado ou nao, se nao tiver, redireciona
//pra '/'
//ate aprender a checar como o Route::auth();

Route::post('/usuarios/incluir/','UsuarioController@incluir');
Route::post('/usuarios_alterar/{id}','UsuarioController@alterar');
Route::post('/processo_incluir','ProcessoController@incluir');
Route::post('/altera_senha/{id}','UsuarioController@altera_senha');
Route::post('/procurador_incluir','ProcuradorController@incluir');
Route::post('/procurador_incluir/{id}','ProcuradorController@alterar');

/**
REQUISICOESAJAXCONTROLLER
ESTE CONTROLLER EH RESPONSAVEL POR FAZER REQUISICOES AJAX,
PARA INCLUIR ESPECIE, PROCURADORES OU TIPO DE PROCESSO, SEM
PRECISAR ACESSAR E/OU IMPLEMENTAR UM FORM PARA TAL INCLUSAO

**/
Route::post('/inclusoes_ajax','RequisicoesAjaxController@incluir');

Route::get('/esqueceu_senha/{matricula}',function($matricula){
 return view('usuarios.esqueceusenha',['matricula'=>$matricula]);
});
Route::post('/esqueceu_senha','UsuarioController@esqueceu_senha');
Route::get('/logout/',function(){
	session()->flush();
	return view('loged_out');
});

//Route::check();