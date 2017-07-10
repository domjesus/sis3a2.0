@extends('layouts.principal')

@section('content')

 <table class='table'>
 	<thead>
  		<tr>
  			<th>
  			 NOME
  			</th>
  			<th>
  		     NB
  		    </th>
  		    <th>
  		     DER
  		    </th>
  		    <th>
  		     DHB
  		    </th>
  		    <th>
           TIPO
          </th>
          <th>
           ESP
          </th>
          
          <th>
  		     USUARIO
  		    </th>
          <th>
            ACAO
          </th>
  		</tr>
  	</thead>
  	<tbody>
  
 @foreach($processos as $processo)
  		<tr id='{{$processo->id}}'>
  			<td>{{$processo->nome}}</td>
  			<td>{{$processo->nb}}</td>
  			<td>{{TrataDatas::hasDate($processo->dt_der)}}</td>
  			<td>{{TrataDatas::hasDate($processo->dt_dhb)}}</td>
        <td title='{{$processo->tipo_processo->nome}}'>{{$processo->tipo_processo->abreviado}}</td>
        <td>{{$processo->especie->numero}}</td>
        <td>{{$processo->user->nome}}</td>
        <td>          
            <a href='#' id='reativar'><spam class='glyphicon glyphicon-pencil btn btn-info btn-xs' title='Reativar'></spam</a>
        </td>
  		</tr>
 @endforeach
  	</tbody>
  </table>

 @stack('scripts')
 <script>
   $(function(){
   	$("table").dataTable();

    $(document).on('click','#reativar',function(){
      id = $(this).parent().parent().attr('id');
      $.post('/processo_reativar/'+id,{'_token':'{{csrf_token()}}' },function(resposta){
        alert(resposta);
      });//end post
    });//end event


 });

 </script>
@endsection