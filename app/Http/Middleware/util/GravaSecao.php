<?php
namespace sis3a_oficial\Http\Middleware\util;

use Illuminate\Http\Request;

class GravaSecao{

	//GRAVA ESTES DADOS NA SECAO PARA GERENCIAR E
	// POVOAR PAGINAS INTERMEDIARIAS
	public static function grava($matricula,$name,$nivel_acesso,$id_ol,$id_user,$ol_numero,$ol_nome){
		session(['user_name'=>$name]);
		session(['matricula'=>$matricula]);
		session(['nivel_acesso'=>$nivel_acesso]);
		session(['id_ol'=>$id_ol]);
		session(['id_user'=>$id_user]);
		session(['ol_numero'=>$ol_numero]);
		session(['ol_nome'=>$ol_nome]);
	}
}
?>