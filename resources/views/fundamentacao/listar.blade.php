@extends('layouts.principal')

@section('content')

<h1>Fundamentacoes Cadastradas</h1>
<table border='1' class='table table-striped'>
	 <thead>
		<th>Nome</th>
		<th>Fund.</th>
		<th>Tipo</th>
		<th>Despacho</th>
		<th>Ações</th>
	</thead>

 @foreach($fundamentacoes as $fund)    
  	<tr>
 		<td>{{$fund->nome}}</td>
 	    <td>{{$fund->txt_fundamentacao}}</td>
 	    @if($fund->abrangencia)
 	     <td>LOCAL</td>
 	    @else
 	     <td>GERAL</td>
 	    @endif
 	    @if($fund->despacho)
 	     <td>CONCESSAO</td>
 	    @else
 	     <td>INDEFERIMENTO</td>
 	    @endif
 	    
 	    @if($fund->id_user == session('id_user'))
 	     @if($fund->ativo)
 	  	 <td>
 	     	<a href='/fundamentacao/alterar/{{$fund->id}}'><spam class='btn btn-default btn-xs glyphicon glyphicon-pencil' title='Alterar'></spam></a>
 	     	<a href='/fundamentacao/excluir/{{$fund->id}}'><spam class='btn btn-danger btn-xs glyphicon glyphicon-trash'></spam></a>
 	     </td>
 	     @endif
 	    @else
 	    <td>
 	    	<a onclick='alert("Somente quem cadastrou pode alterar");'><spam  class='glyphicon glyphicon-pencil btn btn-default btn-xs' disabled></spam></a>
 	    	<a onclick='alert("Somente quem cadastrou pode excluir");'><spam  class='btn btn-danger btn-xs glyphicon glyphicon-trash' disabled></spam></a>
 	    </td>
 	    @endif
 	</tr>
 	@endforeach
</table>

@stack('scripts')
<script>
$(function(){
 $("table").dataTable();
});

</script>

@endsection