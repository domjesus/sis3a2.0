@extends('layouts.principal')


@section('content')
<table>
	<thead>
		<tr>
			<th>NOME</th>
			<th>CPF</th>
			<th>MATRICULA</th>
			<th>NIVEL</th>
			<th>OL</th>
			<th>ACOES</th>
		</tr>
	</thead>
	<tbody>

@foreach($users as $user)
      <tr id='{{$user->id}}'>
      	<td>{{$user->nome}}</td>
      	<td>{{$user->cpf}}</td>
      	<td>{{$user->matricula}}</td>
      	<td>{{$user->nivel->nome}}</td>
      	<td title='{{$user->ol->numero}}'>{{$user->ol->nome}}</td>
      	<td>
      		<a href='/usuarios/alterar/{{$user->id}}'><spam class='glyphicon glyphicon-pencil btn btn-default btn-xs' title='Alterar'></spam></a>
      		@if($user->ativo)
      		 <a href='#' id='inativar'><spam class='glyphicon glyphicon-trash btn btn-danger btn-xs' title='Inativar'></spam></a>
      		@else
      		 <a href='#' id='reativar'><spam class='glyphicon glyphicon-trash btn btn-danger btn-xs' disabled title='Inativar'></spam></a>
      		@endif
      	</td>

      </td>
 @endforeach
	</tbody>
 </table> 

 @stack('scripts')
 <script>
  $(function(){
  	$('table').dataTable();

  	$(document).on('click','#inativar',function(){
      id = $(this).parent().parent().attr('id');
      /*
      $.post('/usuario/inativar/'+id,{'_token':'{{csrf_token()}}' },function(resposta){
        alert(resposta);
      });//end post
*/
	alert(id);
    });//end event


  });
 </script>
 
@endsection