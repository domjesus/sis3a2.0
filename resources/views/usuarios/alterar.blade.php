@extends('layouts.principal')

@section('content')
<fieldset>
<legend>Alterar Usu&aacuterio</legend>
</fieldset>
 <form id='usuarios' action='/usuarios_alterar/{{$user['id']}}/' method='post' onsubmit='return valida(this);'>
  @include('usuarios._form')
   <input type='submit' value='Alterar' class='btn btn-default' onclick='return confirm("Confirma alteração?")'>
 </form>

@endsection