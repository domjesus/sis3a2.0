@extends('layouts.principal')
@section('content')
<h3>Alteracao de Registro</h3>

	<form action='/processo/atualizar/{{$processo->id}}' method='post'>

 	 @include('processos._form')
	 @include('processos.mob')
	 @include('processos.portaria04')
	
	<input type='submit' value='Alterar' class='btn btn-default' onclick='return confirm("Confirma?");'/>
</form>
@stack('scripts')
<script type='text/javascript' src='../js/processos.js'></script>

@endsection