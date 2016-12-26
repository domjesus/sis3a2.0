@extends('layouts.principal')
	@section('content')
	
	<fieldset>
 	 <legend>Alterar Procurador</legend>
	</fieldset>
	<form action='/procurador_incluir/{{$procurador['id']}}' method='post' >
	@include('procuradores._form')
	<input type='submit' value='Alterar' class='btn btn-info' onclick='return confirm(\"Confirma inclusão?\");'></input>

	 </form>
	@endsection