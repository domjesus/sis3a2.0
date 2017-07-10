   <input type='text' name='_token' value='{{csrf_token()}}' hidden></input>
   <label>NB:</label> <input type='text' id='nb' name='nb' class='texto_md' placeholder='XXX.XXX.XXX-X' title='NB' maxlength=13 size=15 autofocus='off' required value='{{$processo->nb or ""}}' readonly='true' />
   </input><p id='st_nb'></p><br />
   <label>Nome:</label><input type='text' id='nome' name='nome' class='texto_gde' placeholder='Nome do Segurado' size=50 required value='{{$processo->nome or ""}}' readonly='true'></input><br />
   
   <label>Procurador:</label>
    <select id='id_procurador' name='id_procurador' >
     <option value='0'>Selecione...</option>
     @foreach($procuradores as $procurador)
       
       @if(isset($carga))
        @if($carga->procurador->id == $procurador->id)
         <option value='{{$procurador->id}}' selected>{{$procurador->nome}}</option>
        @else
         <option value='{{$procurador->id}}'>{{$procurador->nome}}</option>
        @endif
       @elseif(isset($processo))
        @if($processo->procurador->id == $procurador->id)
         <option value='{{$procurador->id}}' selected>{{$procurador->nome}}</option>
        @else
         <option value='{{$procurador->id}}'>{{$procurador->nome}}</option>
        @endif
       @endif
     @endforeach   
    </select>  
    
    <br />
    

    @if(isset($processo) && ($processo->procurador->oab == ""))
     <p class='alert alert-danger'>Atencao! Este procurador nao eh advogado. Caso seja, verifique o cadastro do(a) mesmo(a)!</p>
     <a href='/procurador/incluir/{{$processo->procurador->id}}' class='glyphicon glyphicon-pencil btn btn-mds btn-info'></a> 
    @else 
      <label>Data da Carga:</label><input type='text' id='dt_carga' name='dt_carga' @if(isset($carga)) value="{{TrataDatas::hasDate($carga->dt_carga)}}" @else value="{{Date('d/m/Y')}}" @endif></input>
    @endif
   <br />
    @if(isset($flag))
     <label>Devolucao:</label><input type='text' id='dt_devolucao' name='dt_devolucao' @if(isset($carga)) value="{{TrataDatas::hasDate($carga->dt_devolucao)}}" @else value="{{Date('d/m/Y')}}" @endif></input>  
    @endif
    <br />
   <p id='status' />
@stack('scripts')	

<script>
function valida(form){	 
	status = true;

	if(form.dt_carga.value == "")
 	  {
 	  	alert("Data da carga nao informada!");
 	  	var status = false;
 	  }
 	else if(form.dt_devolucao.value == "")
 	  {
 	  	alert("Data da devolucao nao informada!");
 	  	var status = false;
 	  }
 	

 	  return status;
}



$(function(){
 
 $("input[name^='dt_carga']").datepicker({
  beforeShowDay: $.datepicker.noWeekends
 }); 
 
 $("#dt_devolucao").datepicker({
	 minDate: $("#dt_carga").val(),
 });
 
});//FIM DO FUNCTION



</script>

<style>
label{
 float: left;
 width: 120px;
 padding-top: 6px;
}
form{
 background-color: #ddd;
 height: 250px;
 width: 550px;
 border-radius: 6px;
}
br{
clear: left;
}
#nb{
float: left;
}
</style>