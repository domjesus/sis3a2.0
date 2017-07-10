<div id="gravanb" class="gravanb">
<input type='hidden' name='_token' value='{{csrf_token()}}' />
   <label>
    Tipo Processo:
   </label>
   <select name='id_tipo_processo' id='tipo_processos'>
    <option value='0'>Selecione...</option>
    @foreach($tipo_processo as $tipo)
      @if(!isset($processo))
       <option value='{{$tipo->id}}' title='{{$tipo->abreviado}}'>              {{$tipo->nome}}</option>           
      @elseif($tipo->id == $processo->id_tipo_processo)
       <option value='{{$tipo->id}}' title='{{$tipo->abreviado}}' selected>     {{$tipo->nome}}</option>     
      @else
       <option value='{{$tipo->id}}' title='{{$tipo->abreviado}}'>              {{$tipo->nome}}</option>     
     @endif
     @endforeach
    @if(session('nivel_acesso') >= 2)
      <option value='incluir'>Incluir</option> 
    @endif
   </select>
   <br>
   <label>Especie</label>
   <select id='especies' name='id_especie'>
    <option value='0'>Selecione...</option>
   	@foreach($especies as $especie)
     @if(!isset($processo))
      <option value='{{$especie->id}}' title='{{$especie->numero}}'>{{$especie->nome}}</option>     
   	 @elseif($especie->id == $processo->id_especie)
      <option value='{{$especie->id}}' title='{{$especie->numero}}' selected>{{$especie->nome}}</option>     
     @else
      <option value='{{$especie->id}}' title='{{$especie->numero}}'>{{$especie->nome}}</option>     
     @endif
   	@endforeach
    @if(session('nivel_acesso') >= 2)
     <option value='incluir'>Incluir</option> 
    @endif
 
   </select>
   <br />

 <label>NB: </label>
  <input type="text" id="nb" name="nb" class="nb" placeholder="XXX.XXX.XXX-X" title="NB" maxlength=13 size=15 required value='{{$processo->nb or ""}}'></input>
  <spam class='glyphicon glyphicon-play btn btn-info btn-sm' id='recupera_ult_nb' title='Recupera os 6 primeiros números do último NB/Processo cadastrado!'> Recupera</spam>
  <p id='statusNB'></p>  
 <br />
 
 <label>Nome:</label>
  <input placeholder="Nome do Segurado" type="text" id="nome" name="nome" autocomplete="off" class="form-control" required value='{{$processo->nome or ""}}'/>
 
  <label>DER</label>
   <input placeholder="DER (somente números)" type="text" id="dt_der" name="dt_der" maxlength=10 class="dt" required @if(isset($processo)) value='{{ TrataDatas::hasDate($processo->dt_der)}}' @endif ></input>
  <br />  <label>DHB:</label>
   <input type="text" id="dt_dhb" name="dt_dhb" maxlength=10 class="dt" @if(isset($processo)) value='{{TrataDatas::hasDate($processo->dt_dhb)}}' @endif required></input>
  <br />  
  <label>Procurador:</label>
  <select name="id_procurador" id="procuradores">
    <option value='0'>Selecione...</option>
  	@foreach($procuradores as $procuradores)
     @if(!isset($processo))
     <option value='{{$procuradores->id}}' title='{{$procuradores->escritorio}}'>{{$procuradores->nome}}</option>     
    	@elseif($procuradores->id == $processo->id_procurador)
      <option value='{{$procuradores->id}}' title='{{$procuradores->escritorio}}' selected>{{$procuradores->nome}}</option>     
     @else
      <option value='{{$procuradores->id}}' title='{{$procuradores->escritorio}}'>{{$procuradores->nome}}</option>     
     @endif
  	@endforeach
    @if(session('nivel_acesso') >= 2)
     <option value='incluir'>Incluir</option> 
    @endif
  </select>

 <br />
 <label>Status:</label>
  <textarea placeholder="STATUS DO BENEFÍCIO - TEXTO LIVRE" rows="3" cols="30" id="status" name="status" class="txt_gde">{{$processo->status or ""}}</textarea>
 <br />
  
  @if(isset($processo) && $processo->exigencia)
   Tem Exigência: <input type='checkbox' id='exigencia' name='exigencia' title='Marque para "SIM!"' checked></input><br />
   @if($processo->exigencia_cumprida)
    Exigencia cumprida:<input type='checkbox' name='exigencia_cumprida' checked ></input>
   @else
    Exigencia cumprida: <input type='checkbox' name='exigencia_cumprida' ></input>
   <br>
   @endif
  @else 
   Tem Exigência: <input type='checkbox' id='exigencia' name='exigencia' title='Marque para "SIM!"'></input><br />
  @endif

  
  @if(isset($processo) && ($processo->ppp))
   Tem PPP: <input type='checkbox' id='ppp' checked name='ppp' title='Marque para "SIM!"'></input><br />
  @else
   Tem PPP: <input type='checkbox' id='ppp' name='ppp' title='Marque para "SIM!"'></input><br />
  @endif

  @if(isset($processo) && ($processo->rural))
   Tem Rural/J.A.: <input type='checkbox' id='rural' checked name='rural' title='Marque para "SIM!"'></input>
  @else
   Tem Rural/J.A.: <input type='checkbox' id='rural' name='rural' title='Marque para "SIM!"'></input>
  @endif
</div>  

@stack('scripts')
<script>
$(function(){
$(document).on('change','#tipo_processos',function(){
    tipot = $('#tipo_processos option:selected').text().trim();
    
    if(tipot == 'MOB'){
      $("#mob").show(2000);    
      $("#portaria04").hide(2000);
    } 
    else if(tipot == 'PORTARIA04'){
      $("#portaria04").show(2000);
      $("#mob").hide(2000);
    }
    else{
      $("#portaria04").hide(2000);
      $("#mob").hide(2000);
    }

    });
});
</script>

<style>

textarea{
 width: 450px;
}

.dt{
width:150px;
}

br {
clear:left;
}

input{
margin-bottom: 5px;
}

h3{
 margin-left: 230px;  
}
select{
height: 25px;
}

 /*
 form{
  width: 95%;
  height: 90%;
  //background-color: #fffded;
  margin-left: 15px;  
  border-radius: 10px;  
 }
 */
 [class*='texto_gde']
  {
   width:350px;
   float:"left";
   margin-bottom:5px;
   margin-top:5px;   
  }
 br
 { 
 clear:left
 }
 
 label:not(.lbl_ext)
 {
  float:left;
  width: 120px;
  font-weight: bold;
  margin:5px;
 }
 
 input[type='submit']{
  margin-left:150px;  
 }
 #div_opcoes{
  background-color: #ddd;
  border-radius:6px;
  height: 120px;
  padding: 8px;
  text-align: center;
  margin-bottom: 15px;
 }
</style>