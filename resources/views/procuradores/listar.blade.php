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
    
  	<tr id='{{$proc->id}}'>
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
	   <td>
 	  
 	    @if($proc->id_servidor == session('user_id'))
 	     @if($proc->ativo)
 	  	  	<a href='/procurador/incluir/{{$proc->id}}'><spam class='glyphicon glyphicon-pencil btn btn-default btn-xs' title='Alterar'></spam></a>
            <a href='#' id='inativar'><spam  class='glyphicon glyphicon-trash btn btn-danger btn-xs' title='Excluir/Inativar procurador!'></spam></a>
         @else
            <a href='/procurador/incluir/{{$proc->id}}' id='reativar'><spam  class='glyphicon glyphicon-pencil btn btn-default btn-xs' title='Reativar Procurador!'></spam></a>
 	     @endif
 	    @else
 	     <td><a onclick='alert("Somente quem cadastrou pode alterar");' title='Somente quem cadastrou pode alterar!'><spam class='glyphicon glyphicon-pencil btn btn-default btn-sm'  disabled></spam></a></td>
 	    @endif
 	   </td>    
 	 
 	</tr>
 	@endforeach
</table>



<script>
$(function(){
 $("#tbl_procur").dataTable();

	$(document).on('click','#inativar',function(){
      id = $(this).parent().parent().attr('id');

      $.post('/procurador/inativar/'+id,{'_token':'{{csrf_token()}}' },function(resposta){
        alert(resposta);
      });//end post
    });//end event


});



</script>

@endsection