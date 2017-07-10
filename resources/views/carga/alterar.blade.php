@extends('layouts.principal')

@section('content')
   <h3><strong><u>Alterar Carga de Processos</strong></u></h3>  
   <form action='/carga/alterar/{{$carga['id']}}' method='post' onsubmit='javascript: return valida(this);'>
   
 @include('carga._form')

    <input type='submit' class='btn btn-info' value='Gravar' onclick='return confirm("Confirma Gravação?")'/>
  
@endsection