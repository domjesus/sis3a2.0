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
          @if($processo->ativo)
           
            <a href='/processos/alterar/{{$processo->id}}'><spam class='glyphicon glyphicon-pencil btn btn-info btn-xs'></spam</a>
            <a href='#'><spam id='inativar' class='glyphicon glyphicon-trash btn btn-danger btn-xs' title='Excluir/Inativar Processo!'></spam></a>
            <a href='#'><spam id='utils' class='glyphicon glyphicon-print btn btn-success btn-xs' title='Utilitarios!'></spam></a>
            <div id='div_utils' title='Utilitarios!'></div>
           
          @else
           
            <a href='#'><spam class='glyphicon glyphicon-pencil btn btn-info btn-xs' disabled='disabled'></spam</a>
            <a href='#' disabled='disabled'><spam id='inativar' class='glyphicon glyphicon-trash btn btn-danger btn-xs' title='Excluir/Inativar Processo!' disabled='disabled'></spam></a>
            <a href='#' disabled='disabled'><spam id='utils' class='glyphicon glyphicon-print btn btn-success btn-xs' title='Utilitarios!' disabled='disabled'></spam></a>
            <div id='div_utils' title='Utilitarios!'></div>
           @endif
        </td>
  		</tr>
 @endforeach
  	</tbody>
  </table>

 @stack('scripts')
 <script>
   $(function(){
   	$("table").dataTable();

    $(document).on('click','#utils',function(){
      id = $(this).parent().parent().parent().attr('id');
      //alert(id);
      $("#div_utils").dialog()
       .append("<a href='/carga/incluir/"+id+"' class='btn btn-info btn-xs'>Carga</a>")
       .append("<a href='/processo/exigencia/"+id+"' class='btn btn-warning btn-xs'>Exigencia</a>")
       .append("<a href='/atividade_especial/"+id+"' class='btn btn-default btn-xs'>Ativ. Especial</a>")
       .append("<a href='/certifica_original/"+id+"' class='btn btn-info btn-xs'>Analise J.A.</a>").append("<a href='/exigencia_incluir/"+id+"' class='btn btn-warning btn-xs'>Cert. Original</a>")
       .append("<a href='/capa_processo/"+id+"' class='btn btn-default btn-xs'>Capa</a>");

    
   });

    $(document).on('click','#inativar',function(){
      id = $(this).parent().parent().parent().attr('id');

      $.post('/processo/excluir/'+id,{'_token':'{{csrf_token()}}' },function(resposta){
        alert(resposta);
      });//end post
    });//end event


 });

 </script>
@endsection