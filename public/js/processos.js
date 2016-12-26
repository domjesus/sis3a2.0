function valida(form){
   
  st = true;

 if(form.id_tipo_processo.value == 0){
  st = false;
  alert('Tipo de Processo nao informado!');
  form.id_tipo_processo.focus();
 }
 else if(form.id_especie.value == 0){
  st = false;
  alert('Especie nao informada!');
  form.id_especie.focus();
 }
 else if(!validaNB(document.getElementById("nb"))) 
 { 
  st = false;  
  alert("NB incorreto!");
 }
 else if(form.id_procurador.value == 0){
  st = false;
  alert('Procurador nao informado!');
  form.id_procurador.focus();
 }
 
 return st;

}

$(function(){
  $("#nb").val("167.746.081-1");
  $("select").on('change',function(){
   if($(this).val() == 'incluir'){
    select = $(this);
    tablenome = $(this).attr('name');
    var campo1, campo2;
       
    switch(tablenome){
      case 'id_tipo_processo':
       campo1 = prompt('Digite o nome do tipo por exteno. ex: RECURSO ou REVISAO ou RECONHECIMENTO INICIAL' );
       campo2 = prompt('Digite o nome abreviado ex: RECINI ou REV ou REC');
      break;
      case 'id_especies':
       campo1 = prompt('Digite o numero da id_especie');       
       campo2 = prompt('Digite o nome da id_especie');
      break;
      case 'id_procurador':
       campo1 = prompt('Digite o nome do procurador');
       campo2 = prompt('Digite o numero do telefone');
      break;
      
    }
    if((campo1 == "") || (campo2 == ""))
      alert("Atencao! Foi fornecida informacao em branco!");
    else 
    $.post('/inclusoes_ajax',{'table':tablenome,'nome':campo1,'campo2':campo2,'_token':'{{csrf_token()}}' },function(resposta){
      select.empty().append(resposta);
    }); 
   }
   
  });

  $('#id_tipo_processo').on('change',function(){
    tipot = $('#id_tipo_processo option:selected').text();
    
    if(tipot == 'MOB'){
      $("#mob").show();    
      $("#portaria04").hide();
    } 
    else if(tipot == 'PORTARIA04'){
      $("#portaria04").show();
      $("#mob").hide();
    }
    else{
      $("#portaria04").hide();
      $("#mob").hide();
    } 

   tipo = $(this).val();

   if(tipo == 4){
     $("#nb").attr("size","30").mask('00.000.000.0.00000/00-0');
     $("#id_especie").val(18);
   }
   else if(tipo == 1){
     $("#nb").attr("size","15").mask('000.000.000-0');
     $("#id_especie").val(20);
     }   
   else if(tipo == 2){
     $("#nb").attr("size","15").mask('000.000.000-0');
     $("#id_especie").val(2);
     }
   else if(tipo == 3){
     $("#nb").attr("size","15").mask('000.000.000-0');
     $("#id_especie").val(19);
     }
   else if(tipo == 5){     
       $("#nb").attr("size","30").mask('00000.000000/0000-00');
       $("#id_especie").val(20);    
     }

  });

alert('jq');

$("#nb").mask('000.000.000-0');

 $("#nb").blur(function(){
 
  var valida = validaNB(document.getElementById("nb"));
 	 	 
  if(!valida)
   $("#statusNB").attr({"class":"erro"}).text("NB Incorreto!");

 });

 $("input[name^='dt']").datepicker();

 $("#recupera_ult_nb").on("click",function(){
  $.post("ajax/manter_beneficio",{flag: "recupera_ult_nb"},function(resposta){
   if(resposta != "")
	   $("#nb").val(resposta);
       $("#nb").focus();
   //alert(resposta);
  });
 });   

 $("#nome").val('jose do teste da silva');
 $("#id_tipo_processo").val(1);
 $("#id_especie").val(1);
 $("#id_procurador").val(1);
 
});

