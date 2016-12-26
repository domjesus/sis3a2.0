@extends('layouts.principal')


@section('content')
 @foreach($users as $user)
  <a href='/usuarios_alterar/{{$user->id}}'>Nome:{{$user->nome}}</a><br>
  CPF:{{$user->cpf}}<br>
  Matricula:{{$user->matricula}}<br>
  Nivel:{{$user->nivel_acesso}}<br>
  ID OL:{{$user->id_ol}}<br>
  Pass:{{$user->passwd}}<br>
 @endforeach
 
@endsection