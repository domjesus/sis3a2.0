@if(isset($processo) && $processo->tipo_processo->nome == "MOB")
 <div id='mob'>
@else 
 <div id='mob' hidden='true'>
@endif

 			  <p class='alert alert-info' style='text-align:center; font-size:0.9em'>Dados do MOB</p>

 			  <label>Origem: </label><input type='text' name='origem' id='origem' class='texto_gde' value='{{$processo->origem or ""}}'/> <br />
 			  <label>Local: </label><input type='text' name='local' id='local' class='texto_pq' value='{{$processo->local or ""}}'/> <br />
 			  <label>SIPPS: </label><input type='text' name='cmd_sipps' id='cmd_sipps' class='texto_pq' maxlength='9' value='{{$processo->local or ""}}'/> <br />
 			  <label>Status: </label>
 			  <select id='mobstatus' name='mobstatus_id'>
 		       <option value='0'>Selecione...</option>

 			   @foreach($mobstatus as $mobst)
 			        @if(!isset($processo))
	 			 	 <option value='{{$mobst->id}}'>{{$mobst->nome}}</option>      			    
 			        @elseif($mobst->id == $processo->mobstatus_id)
				      <option value='{{$mobst->id}}' selected>{{$mobst->nome}}</option>     
     				@else
					 <option value='{{$mobst->id}}'>{{$mobst->nome}}</option>     
     				@endif
     		   @endforeach

 			   @if(session('nivel_acesso') >= 2)
     			<option value='incluir'>Incluir</option> 
    		   @endif
    		  </select>
 			  <br>
 			  <textarea rows='3' cols='50' name='resumo' id='resumo' size='60'>{{$processo->resumo or ""}}</textarea> <br />
 			  <label>Ultima Prov.: </label><input type='text' name='dt_ult_prov' id='dt_ult_prov' @if(isset($processo)) value='{{ TrataDatas::hasDate($processo->dt_ult_prov) }}' @endif/> <br />
 			  <label>Resumo Prov.: </label><textarea rows='3' cols='50' name='resumo_ult_prov' id='resumo_ult_prov'>{{$processo->resumo_ult_prov or ""}}</textarea> <br /> 			  
 			  <label>Dt Ciencia/Prox. Tarefa: </label><input type='text' name='dt_ciencia_prox_tarefa' id='dt_ciencia_prox_tarefa' @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_ciencia_prox_tarefa)}}' @endif/> <br />
 			  <label>Prazo Nova Prov.: </label><input type='text' name='prazo_nova_prov' id='prazo_nova_prov' size='2' maxlength='2' value='{{$processo->prazo_nova_prov or ""}}'/> <br />
 			  <label>Despacho Prox. Tarefa: </label><textarea rows='3' cols='50' name='despacho_proxima_tarefa' id='despacho_proxima_tarefa' size='60'>{{$processo->despacho_proxima_tarefa or ""}}</textarea> <br />
 			  
 			  <div id='div_opcoes'>
 			    <p>Opções</p>
 			  <label class='lbl_ext'>Digitalizado: </label>
 			  <select id='digitalizado' name='digitalizado'>
 			  	@if(isset($processo) && $processo->digitalizado)
 			      <option value='0'>NAO</option>
 			      <option value='1' selected>SIM</option> 			   	 
 			 	  <input type='text' name='dt_digitalizado' id='dt_digitalizado' placeholder='Data da Digitalizacao' @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_digitalizado)}}' @endif/>
 			  
 			    @else
 			      <option value='0' selected>NAO</option>
 			   	  <option value='1'>SIM</option> 			   
 			   	  <input type='text' name='dt_digitalizado' id='dt_digitalizado' hidden='true' placeholder='Data da Digitalizacao'/>
 			  
 			  	@endif
 			   
 			  </select>
 			  
 			  <label class='lbl_ext'>Apenso: </label>
 			  <select id='apenso' name='apenso'>
 			   @if(isset($processo) && $processo->apenso)
 			      <option value='0'>NAO</option>
 			      <option value='1' selected>SIM</option> 			   	 
 			      <input type='text' name='nb_apenso' id='nb_apenso' value='{{$processo->nb_apenso or ""}}'/>
 			  
 			    @else
 			      <option value='0' selected>NAO</option>
 			   	  <option value='1'>SIM</option> 			   
 			   	  <input type='text' name='nb_apenso' id='nb_apenso' hidden='true' value='{{$processo->nb_apenso or ""}}'/>
 			  
 			  	@endif
 			  </select>
 			  <input type='text' name='nb_apenso' id='nb_apenso' hidden='true' value='{{$processo->nb_apenso or ""}}'/>
 			  
 			  <label class='lbl_ext'>Siscalc: </label> 			  
 			  <select id='sicalc' name='sicalc'>
 			   @if(isset($processo) && $processo->sicalc)
 			      <option value='0'>NAO</option>
 			      <option value='1' selected>SIM</option> 			   	 
 			    @else
 			      <option value='0' selected>NAO</option>
 			   	  <option value='1'>SIM</option> 			   
 			  	@endif
 			  </select>
 			   		
			  <label class='lbl_ext'>Siafi: </label> 			  
 			  <select id='siafi' name='siafi'>
 			   @if(isset($processo) && $processo->siafi)
 			      <option value='0'>NAO</option>
 			      <option value='1' selected>SIM</option> 			   	 
 			    @else
 			      <option value='0' selected>NAO</option>
 			   	  <option value='1'>SIM</option> 			   
 			  	@endif
 			  </select>
 			  <br />
 			  <label class='lbl_ext'>Cadin: </label> 			  
 			  <select id='cadin' name='cadin'>
 			   @if(isset($processo) && $processo->cadin)
 			      <option value='0'>NAO</option>
 			      <option value='1' selected>SIM</option> 			   	 
 			    @else
 			      <option value='0' selected>NAO</option>
 			   	  <option value='1'>SIM</option> 			   
 			  	@endif
 			  </select>
 			   		
 			  <label class='lbl_ext'>Sobrestado: </label> 			   
 			  <select id='demanda_sobrestada' name='demanda_sobrestada'>
 			   @if(isset($processo) && $processo->demanda_sobrestada)
 			      <option value='0'>NAO</option>
 			      <option value='1' selected>SIM</option> 			   	 
 			      <input type='text' name='sobrestado_motivo' id='sobrestado_motivo' placeholder='Motivo' value='{{$processo->sobrestado_motivo or ""}}'/>
 			  	  <input type='text' name='sobrestado_prazo' id='sobrestado_prazo' maxlength='4' size='4' placeholder='Prazo' value='{{$processo->sobrestado_prazo or ""}}'/>
			  
 			    @else
 			      <option value='0' selected>NAO</option>
 			   	  <option value='1'>SIM</option> 			   
 			  	  <input type='text' name='sobrestado_motivo' id='sobrestado_motivo' hidden='true' placeholder='Motivo' value='{{$processo->sobrestado_motivo or ""}}'/>
 			  	  <input type='text' name='sobrestado_prazo' id='sobrestado_prazo' maxlength='4' size='4' hidden='true' placeholder='Prazo' value='{{$processo->sobrestado_prazo or ""}}'/>
			  
 			  	@endif
 			  </select>
 			  
 			   		
 	   		  <label class='lbl_ext'>Edital: </label> 			   
 			  <select id='edital' name='edital'>
 			   @if(isset($processo) && $processo->edital)
 			      <option value='0'>NAO</option>
 			      <option value='1' selected>SIM</option> 			   	 
 			      <input type='text' name='dt_edital' id='dt_edital' placeholder='Motivo' @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_edital)}}' @endif/> 			  
 			    @else
 			      <option value='0' selected>NAO</option>
 			   	  <option value='1'>SIM</option> 			   
 			   	  <input type='text' name='dt_edital' id='dt_edital' hidden='true' placeholder='Motivo' @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_edital)}}' @endif/> 			  
 			  	@endif
 			  </select>
 			  
			  <label class='lbl_ext'>Demanda Concluida: </label> 			   
 			  <select id='demanda_concluida' name='demanda_concluida'>
 			   @if(isset($processo) && $processo->demanda_concluida)
 			      <option value='0'>NAO</option>
 			      <option value='1' selected>SIM</option> 			   	 
 			    @else
 			      <option value='0' selected>NAO</option>
 			   	  <option value='1'>SIM</option> 			   
 			  	@endif
 			  </select><br />
 			  </div>
 			</div>
@stack('scripts')
<script>
$(function(){
	    $("#digitalizado").change(function(){
		 if($(this).val() > 0)
			 $("#dt_digitalizado").show();
		 else    $("#dt_digitalizado").hide();
		});

	    $("#apenso").change(function(){
			 if($(this).val() > 0)
				 $("#nb_apenso").show();
			 else $("#nb_apenso").hide();      
			});

	    $("#demanda_sobrestada").change(function(){
			 if($(this).val() > 0){
				 $("#sobrestado_motivo").show();
			 	 $("#sobrestado_prazo").show();
			 	$("#dt_sobrestado").show();
			 	
			  }
			 else{
				 $("#sobrestado_motivo").hide().val("");
			 	 $("#sobrestado_prazo").hide().val("");
			 	 $("#dt_sobrestado").hide().val("");
				 }
			});

	    $("#siafi").change(function(){
			 if($(this).val() > 0)
				 $("#siafi_txt").show();			  
			 else
				 $("#siafi_txt").hide();				 
			});

	    $("#cadin").change(function(){
			 if($(this).val() > 0)
				 $("#cadin_txt").show();			  
			 else
				 $("#cadin_txt").hide();				 
			});

	    $("#edital").change(function(){
			 if($(this).val() > 0)
				 $("#dt_edital").show();			  
			 else
				 $("#dt_edital").hide();				 
			});
	    
});
</script>