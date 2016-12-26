
@extends('layouts.principal')
@section('content')

<div>
<fieldset>
 <legend>Incluir Usu&aacuterio</legend>
</fieldset>

<form id='usuarios' action='/usuarios/incluir' method='post' onsubmit='return valida(this);'>    
 @include('usuarios._form')

  <input type='submit' value='Gravar' class='btn btn-default' onclick='return confirm("Confirma gravação?")'></input>

 {{ Form::close()}}

</div>


@endsection
