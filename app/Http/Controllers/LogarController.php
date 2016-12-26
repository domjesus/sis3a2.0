<?php

namespace sis3a_oficial\Http\Controllers;

use Illuminate\Http\Request;

use sis3a_oficial\Http\Requests;
use DB;

class LogarController extends Controller
{
    public function __construct(){
      $this->middleware('logar');
    }

    public function index(Request $request){
    	
    	$this->validate($request,[
    		'matricula'=>'required|min:7',
    		'passwd'=>'required',
        ]);

        //return redirect('home');
    }

    public function messages(){
        return [
            'matricula.min'=>'A matricula deve ter no minimo 7 caracs',
            'passwd.min'=>'Senha: preencha direito',
        ];
    }
    
}
