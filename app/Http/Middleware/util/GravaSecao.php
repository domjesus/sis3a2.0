<?php
namespace sis3a_oficial\Http\Middleware\util;

use Illuminate\Http\Request;

class GravaSecao{

	//GRAVA ESTES DADOS NA SECAO PARA GERENCIAR E
	// POVOAR PAGINAS INTERMEDIARIAS
	public static function grava($matricula,$name,$nivel_acesso,$id_ol,$id_user){
		session(['user_name'=>$name]);
		session(['matricula'=>$matricula]);
		session(['nivel_acesso'=>$nivel_acesso]);
		session(['ol_id'=>$id_ol]);
		session(['user_id'=>$id_user]);
	}
}
?>