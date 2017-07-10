@if($carga->ativo)
					 <a href='/carga/alterar/{{$carga->id}}'><spam class='glyphicon glyphicon-upload btn btn-xs btn-default' title='Alterar Carga'></spam></a>
	    			 <a href='/carga/alterar_dev/{{$carga->id}}'><spam class='glyphicon glyphicon-download btn btn-default btn-xs' title='Devolucao'></spam></a>
	    		     <a href='/carga/gera_doc/{{$carga->id}}' target='_blank'><spam class='glyphicon glyphicon-print btn btn-info btn-xs'></spam></a>
	    		     <a href='#' id='inativar'><spam class='glyphicon glyphicon-trash btn btn-danger btn-xs' title='Inativar'></spam></a>
	    		    @else
	    		      <a href='#'><spam class='glyphicon glyphicon-pencil btn btn-info btn-xs' title='Alterar Carga' disabled></spam></a>
	    			 <a href='#'><spam class='glyphicon glyphicon-pencil btn btn-default btn-xs' title='Devolucao' disabled></spam></a>
	    		     
	    		    @endif
