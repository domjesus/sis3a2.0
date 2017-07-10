@extends('layouts.principal')

@section('content')
 <h3><strong><u>Incluir Carga de Processos</strong></u></h3>  

    <form action='/carga/incluir/{{$processo->id}}' method='post' onsubmit='javascript: return valida(this);'>
     @include('carga._form')
     <input type='text' name='id_processo' value='{{$processo->id}}' hidden />

    @if($processo->tipo_processo->nome == "MOB" || $processo->tipo_processo->abreviado == "MOB")
     <p class='alert alert-danger'>Atencao! Processo do MOB nao pode sair em carga</p>
    @elseif($processo->procurador->oab == "")
     <input type='submit' class='btn btn-info' value='Gravar' disabled='true'/>
    @else
     <input type='submit' class='btn btn-info' value='Gravar' onclick='return confirm("Confirma Gravação?")'/>
    @endif
	
	</form>
@endsection