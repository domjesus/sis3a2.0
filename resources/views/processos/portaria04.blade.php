@if(isset($processo) && ($processo->tipo_processo->nome == "PORTARIA04"))
 <div id='portaria04' >
@else <div id='portaria04' hidden='true'>
@endif
 <p class='alert alert-info' style='text-align:center; font-size:0.9em'>Dados da Portaria 04</p>

<label>DN: </label><input type='text' name='dt_nascimento' id='dt_nascimento' placeholder='DN' @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_nascimento)}}' @endif/><br>
<br>
 <input type='button' class='btn btn-info btn-xs' id='showend' value='Mostrar Endereco'/>
 <input type='button' class='btn btn-info btn-xs' id='hideend' value='Esconder Endereco'/>
<br>
<div id='endereco' hidden='true'>
Endereco:
 <br />
 <p id='p_end' hidden='true'></p>
 <input type='text' name='end_cep' id='end_cep' placeholder='CEP' size='10' value='{{$processo->end_cep or ""}}'></input>
 <img src='img/processando.gif' id='img_processando' hidden='true' />
 <input type='text' name='end_rua' id='end_rua' placeholder='RUA' tabindex='0' value='{{$processo->end_rua or ""}}'/>
 <input type='text' name='end_numero' id='end_numero' placeholder='NUMERO' size='4' value='{{$processo->end_rua or ""}}'/>
 <input type='text' name='end_bairro' id='end_bairro' placeholder='BAIRRO' size='15' value='{{$processo->end_bairro or ""}}' /><br>
 <input type='text' name='end_cidade' id='end_cidade' placeholder='CIDADE' size='20' value='{{$processo->end_cidade or ""}}'/>
 <input type='text' id='end_uf' name='end_uf' id='end_uf' value='' placeholder='UF' size='3' maxlength='2' value='{{$processo->UF or ""}}'/>
 </div> 
 <br>
 
<label>Status:</label>
   <select name='p04status_id' id='p04status'>
    <option value='0'>Selecione...</option>

    @foreach($p04status as $pstatus)
      @if(!isset($processo))
       <option value='{{$pstatus->id}}'>{{$pstatus->nome}}</option>           
      @elseif($pstatus->id == $processo->p04status_id)
       <option value='{{$pstatus->id}}' selected>     {{$pstatus->nome}}</option>     
      @else
       <option value='{{$pstatus->id}}' >{{$pstatus->nome}}</option>     
     @endif
     @endforeach
    @if(session('nivel_acesso') >= 2)
      <option value='incluir'>Incluir</option> 
    @endif
   </select>
<br>
 
<label>Data 1&ordf; Convoca&ccedil;&atilde;o: </label>
 <input type="text" id="dt_convocacao" name="dt_convocacao" @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_convocacao)}}' @endif/><br />
<label>C&oacute;digo 1&ordm; AR:</label>
 <input type="text" id="codigo_ar" name="codigo_ar" value='{{$processo->codigo_ar or ""}}'></input><br />

<label>Data 1&ordf; Ci&ecirc;ncia:</label>
 <input type="text" id="dt_ciencia" name="dt_ciencia" @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_ciencia)}}' @endif/> <br />
<label>Data da Per&iacute;cia:</label><input type="text" id="dt_pericia" name="dt_pericia" @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_pericia)}}' @endif/><br />
<label>Conclus&atilde;o da Per&iacute;cia:</label>
<select id="p04concpericia" name="p04concpericia_id">
   <option value='0'>Selecione...</option>

    @foreach($p04concpericia as $p04conc)
      @if(!isset($processo))
       <option value='{{$p04conc->id}}'>{{$p04conc->nome}}</option>           
      @elseif($p04conc->id == $processo->p04concpericia_id)
       <option value='{{$p04conc->id}}' selected>     {{$p04conc->nome}}</option>     
      @else
       <option value='{{$p04conc->id}}' >{{$p04conc->nome}}</option>     
     @endif
     @endforeach
    @if(session('nivel_acesso') >= 2)
      <option value='incluir'>Incluir</option> 
    @endif

</select><br>
<label>DCB:</label><input type="text" id="dt_dcb" name="dt_dcb" @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_dcb)}}' @endif/><br /> 
<label>Revis&atilde;o Permitida:</label><input type="text" id="dt_permite_rev" name="dt_permite_rev" title='Data a partir da qual &eacute; permitida a revis&atilde;o administrativa' @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_permite_rev)}}' @endif/><br />
<label>Observa&ccedil;&otilde;es:</label><textarea rows="3" cols="60" id="observacoes_p04" name="observacoes_p04" maxlength='500'>{{$processo->observacoes_p04 or ""}}</textarea><br />
Quantidade m&aacute;xima de de caracteres: 500<p id="monitor_obs"></p>

</div>

@stack('scripts')
<script>
	$(function(){
	 $("#showend").on('click',function(){
	  $("#endereco").show();
	  $(this).hide();
	  $("#hideend").show();
	});

	$("#hideend").on('click',function(){
	  $("#endereco").hide();
	  $(this).hide();
	  $("#showend").show();
	});

	});
</script>

<style>

#endereco{
 width: 550px;
 height: 100px;
 background-color: #a2cad2;
 position: relative;
 padding: 15px;
 border-radius:6px;
}
#hideend{
	display:none;
}
</style>