 <div id="gravanb" class="gravanb">

<input type='hidden' name='_token' value='{{csrf_token()}}' />
   <label>
    Tipo Processo:
   </label>
   <select name='id_tipo_processo' id='id_tipo_processo'>";
    <option value='0'>Selecione...</option>
    @foreach($tipo_processo as $tipo)
     <option value='{{$tipo->id}}' title='{{$tipo->abreviado}}'>{{$tipo->nome}}</option>     
    @endforeach
    @if(session('nivel_acesso') >= 2)
      <option value='incluir'>Incluir</option> 
    @endif
   </select>
   <br>
   <label>Especie</label>
   <select id='id_especie' name='id_especie'>
    <option value='0'>Selecione...</option>
   	@foreach($especies as $especie)
   	 <option value='{{$especie->id}}' title='{{$especie->nome}}'>{{$especie->numero}}</option>
   	@endforeach
    @if(session('nivel_acesso') >= 2)
     <option value='incluir'>Incluir</option> 
    @endif
 
   </select>
   <br />

 <label>NB: </label>
  <input type="text" id="nb" name="nb" class="nb" placeholder="XXX.XXX.XXX-X" title="NB" maxlength=13 size=15 required></input>
  <spam class='glyphicon glyphicon-play btn btn-info btn-sm' id='recupera_ult_nb' title='Recupera os 6 primeiros números do último NB/Processo cadastrado!'> Recupera</spam>
  <p id='statusNB'></p>  
 <br />
 
 <label>Nome:</label>
  <input placeholder="Nome do Segurado" type="text" id="nome" name="nome" autocomplete="off" class="form-control" required/>
 <br />
  <label>DER</label>
   <input placeholder="DER (somente números)" type="text" id="dt_der" name="dt_der" maxlength=10 class="dt" required></input>
  <br />  <label>DHB:</label>
   <input type="text" id="dt_dhb" name="dt_dhb" maxlength=10 class="dt" value="<?php echo Date('d/m/Y'); ?>" required></input>
  <br />  
  <label>Procurador:</label>
  <select name="id_procurador" id="id_procurador">
    <option value='0'>Selecione...</option>
  	@foreach($procuradores as $procuradores)
    	<option value='{{$procuradores->id}}' title='Escritorio: {{$procuradores->escritorio}} - Telefone: {{$procuradores->telefone}}'>{{$procuradores->nome}}</option>
  	@endforeach
    @if(session('nivel_acesso') >= 2)
     <option value='incluir'>Incluir</option> 
    @endif
  </select>

 <br />
 <label>Status:</label>
  <textarea placeholder="STATUS DO BENEFÍCIO - TEXTO LIVRE" rows="3" cols="30" id="status" name="status" class="txt_gde"></textarea>
 <br />
 
  Tem Exigência: <input type='checkbox' id='exigencia' name='exigencia' title='Marque para "SIM!"'></input><br />
  Tem PPP: <input type='checkbox' id='ppp' name='ppp' title='Marque para "SIM!"'></input><br />
  Tem Rural/J.A.: <input type='checkbox' id='rural' name='rural' title='Marque para "SIM!"'></input>
  <br />
  
 <input type="submit" class="btn btn-default" value="Gravar" onclick="return confirm('Confirma Gravação?');"></input>
 <p id='status_inclusao' style='text-align:center' hidden='true'></p>
 <div id='mob' hidden>
  <p class='alert alert-info'>Dados de Processo do MOB</p>
 </div>
 <div id='portaria04' hidden>
  <p class='alert alert-info'>Dados de Processo da Portaria 04</p>
 </div>

</div>

