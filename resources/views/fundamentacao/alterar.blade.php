@extends('layouts.principal')

 @section('content')

 <h3>Alterar Fundamentacao</h3>
 <form action='/fundamentacao/alterar/{{$fund['id']}}' method='post' onsubmit='return valida()'>
   @include('fundamentacao._form')
 <input type='submit' value='Alterar' id='btn_enviar' class='btn btn-default' onclick='return confirm(\"Confirma inclusão?\");'></input>
 </form>
 @endsection 