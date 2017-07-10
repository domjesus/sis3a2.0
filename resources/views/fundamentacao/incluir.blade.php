
@extends('layouts.principal')

 @section('content')

 <h3>Incluir Fundamentacao</h3>
 <form action='/fundamentacao/incluir/' method='post' onsubmit='return valida()'>
   @include('fundamentacao._form')
 <input type='submit' value='Gravar' id='btn_enviar' class='btn btn-default' onclick='return confirm(\"Confirma inclusão?\");'></input>
 </form>
 @endsection 