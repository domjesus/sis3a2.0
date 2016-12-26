@extends('layouts.principal')

@section('content')
<table border='1' class='table table-striped' id='tbl_procur'>
	 <thead>
		<th>Nome</th>
		<th>OAB</th>
		<th>NIT</th>
		<th>Escritório</th>
		<th>Telefone</th>
		<th>Celular</th>
		<th>E-mail</th>
		<th>Ativo</th>
		<th>Ações</th>
	</thead>
	<h1>Procuradores Cadastrados

 @foreach($procuradores as $proc)
    
  	<tr>
 		<td>{{$proc->nome}}</td>
 	    <td>{{$proc->oab}}</td>
 	    <td>{{$proc->nit}}</td>
 	    <td>{{$proc->escritorio}}</td>
 	    <td>{{$proc->telefone}}</td>
 	    <td>{{$proc->celular}}</td>
 	    <td>{{$proc->email}}</td>
 	    @if($proc->ativo)
 	     <td>SIM</td>
 	    @else<td>NÃO</td>
 	    @endif

 	    @if($proc->id_servidor == session('id_user'))
 	     @if($proc->ativo)
 	  	  <td><a href='/procurador_incluir/{{$proc->id}}'><spam class='glyphicon glyphicon-pencil btn btn-default btn-sm' title='Alterar'></spam></a></td>    
 	     @endif
 	    @else
 	     <td><a onclick='alert("Somente quem cadastrou pode alterar");' title='Somente quem cadastrou pode alterar!'><spam class='glyphicon glyphicon-pencil btn btn-default btn-sm'  disabled></spam></a></td>
 	    @endif
 	</tr>
 	@endforeach
</table>



<script>
$(function(){
 $("#tbl_procur").dataTable();
});

</script>

@endsection