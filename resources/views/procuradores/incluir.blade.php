@extends('layouts.principal')
	@section('content')
	<fieldset>
 	 <legend>Incluir Procurador</legend>
	</fieldset>
	<form action='/procurador/incluir' method='post' >
	@include('procuradores._form')
	<input type='submit' value='Gravar' class='btn btn-info' onclick='return confirm(\"Confirma inclusão?\");'></input>
	 </form>
	@endsection