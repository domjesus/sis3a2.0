@extends('layouts.principal')

@section('content')

	<table class='table table-condensed'>
		<thead>
			<tr>
				<th>
					NOME
				</th>
				<th>
					NB
				</th>
				<th>
					PROCURADOR
				</th>
				<th>
					CARGA
				</th>
				<th>
					DEVOLUCAO
				</th>
				<th>
					ACAO
				</th>
			</tr>
		</thead>
		<tbody>
			
	  @foreach($cargas as $carga)
	    	<tr id='{{$carga->id}}'>
	    		<td>
	    			{{$carga->processo->nome}}
	    		</td>
	    		<td>
	    			{{$carga->processo->nb}}
	    		</td>
	    		<td>
	    			{{$carga->procurador->nome}}
	    		</td>
	    		<td>
	    			{{TrataDatas::hasDate($carga->dt_carga)}}
	    		</td>
	    		<td>
	    			{{TrataDatas::hasDate($carga->dt_devolucao)}}
	    		</td>
	    		<td>
	    			@if(isset($ativos))
	    			 @include('carga.ativos')
	    			@else
	    			 @include('carga.inativos')
	    			@endif
	    		</td>
	    	</tr> 	   
	  @endforeach
	  	</tbody>
	</table>

@stack('scripts')

<script>
$(document).on('click','#inativar',function(){
      id = $(this).parent().parent().attr('id');
      
      $.post('/carga/excluir/'+id,{'_token':'{{csrf_token()}}' },function(resposta){
        alert(resposta);
      });//end post
    });//end event

$(document).on('click','#reativar',function(){
      id = $(this).parent().parent().attr('id');
      
      $.post('/carga/reativar/'+id,{'_token':'{{csrf_token()}}' },function(resposta){
        alert(resposta);
      });//end post
    });//end event

</script>
@endsection


