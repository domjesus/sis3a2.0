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
  
  
   $("select[id^='id_tipo_processo']").on('change',function(){
  
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

$("#nb").mask('000.000.000-0');

 $("#nb").blur(function(){
 
  var valida = validaNB(document.getElementById("nb"));
 	 	 
  if(!valida)
   $("#statusNB").attr({"class":"erro"}).text("NB Incorreto!");

 });

 $("input[name^='dt']").datepicker().mask('00/00/0000');

  $("input[type='text'],textarea").on('blur',function(){
    $(this).val($(this).val().toUpperCase());
    
  });


 
 $("#nome").val('jose do teste da silva');
 $("#tipo_processos").val(1);
 $("#especies").val(1);
 $("#procuradores").val(1);
 $("#nb").val("167.746.081-1");

});