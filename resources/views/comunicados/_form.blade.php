
<div id='comunicados_incluir'>
   <input type='text' name='_token' value='{{csrf_token()}}' hidden></input>
 

<h3>O n&uacutemero ser&aacute; exibido ap&oacutes gravar!</h3>
Tipo:<select id='comunicadostipos' name='id_comunicado_tipo' >
 <option id='0' value='0'>Selecione</option>
 @foreach($comunicados_tipos as $ctp)
  <option value='{{$ctp->id}}'>{{$ctp->nome}}</option>
 @endforeach
 @if(session('nivel_acesso') >= 2)
  <option id='0' value='incluir'>Incluir</option>
 @endif
 
</select>
<br>
Data:
<label><input class='form-control' type="text" id="data" name="data" maxlength=10 value = '{{Date('d/m/Y')}}'></input></label>
<br>
Destino:
<label><input class='form-control' type="text" id="destino" name="destino" size="50" maxlength=50 autofocus/></label>
<br>
<label for="file">Arquivo<input type="file" name="file" id='arquivo'/></label>
</div>
<div id='ultimos_numeros'> 
<p id='monitor_ultimos'></p>
</div>
<br><br><br>

@stack('scripts')
<script type="text/javascript">

$().ready(function(){
  alert('jq no _form');
  $('#data').mask('00/00/0000');
  $("#enviar").attr("disabled", "disabled");
});

$().ready(function(){


$("#data").blur(function(){
 var data = validaData(oficios.data_oficio,oficios.data_oficio.value); 

 if(!data){
  $(this).attr({class : "alert alert-danger"});
  $("#enviar").attr("disabled", "disabled");
  }
 else {
  $(this).attr({class : "form-control"});  
  $("#enviar").attr("disabled", "disabled");
  }

});
 
 $("#destino").blur(function(){
 if( $(this).val() != "")
   $("#enviar").removeAttr("disabled");
 else {  
   $("#enviar").attr("disabled", "disabled");
 }
 }); 
 
});


function valida(form){
 var st = true;

 var data_correta = validaData(form.data,form.data.value); 
 
 if(!data_correta){
  alert("Data incorreta!");    
 }

 if(form.destino.value == "") {
   alert("Destino em branco!");
   st = false;   
  } 
  
  var tipo = form.tipo_comunicado.value;
  if(tipo == 0){
   alert("Selecione o tipo do documento!");
   st = false;
  }   
   
 return(data_correta && st);
 
}


$().ready(function(){
 $("#arquivo").change(function(){
  
  var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
  var ext = filename.substr(-3); //PEGA A EXTENSAO DO ARQUIVO

  var nome_tmp = filename.replace(ext,'')
  var nome = nome_tmp.replace('.','');  

  var nr_comunicado = $("#nr_oficio").val();

  if(ext != "pdf"){
   alert("Extensao do arquivo inválida! Somente PDF!");
   $(this).val("");
  }
 }); 
 });

 
 $().ready(function() {

$("#data").datepicker();

$("#destino").blur(function(){
 var texto = $(this).val();
 $(this).val(texto.toUpperCase());
});

var tempo = 30;
$.post("/comunicados_ajax/",{flag:"recupera_ultimos",_token:'{{csrf_token()}}' },function(resposta){
	 $("#ultimos_numeros").empty().append(resposta+"<p id='monitor_ultimos'></p>");
	});
	
setInterval(function(){
	
	$.post("/comunicados_ajax/",{flag:"recupera_ultimos",_token:{{csrf_token()}} },function(resposta){
		 $("#ultimos_numeros").empty().append(resposta+"<p id='monitor_ultimos'></p>");
		});
	//alert("Atualizado!");	
},30000);


setInterval(function(){

	$("#monitor_ultimos").text("Atualiza em "+(--tempo)+"s. Caso deseje pressione 'F5' para atualizar!");
	if(tempo == 1)
		tempo = 30;
	
},1000);


});      
</script>

<style>
#comunicados_incluir{
 background-color: #dddeee;
 height: 250px;
 align:center;
 text-align:center;
 width: 65%;
 float: left;
}

#ultimos_numeros{
float: left;
width: 30%;
height: 190px;
background-color: #fffeee;
border-radius: 6px;
padding: 6px;
}

#monitor_ultimos{
 position: relative;
 margin-top: 30px;
}
br{
  clear:left;
}
</style>