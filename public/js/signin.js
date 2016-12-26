function valida(form){

 status = true;

 if(form.matricula.value == ""){
   alert("Matrícula Vazia!");
   status = false;
 }   
 else if(form.passwd.value == ""){
   alert("Senha Vazia!");
   status = false;
 }

 return status;
 
}

function verifica(campo){
 if(campo.value.length == 7)
 document.getElementById("passwd").focus();
}

function verif_matricula(){
 var st = true;

 if(form_login.matricula.value == ""){
  alert("Preencha a matrícula!");
  st = false;
  form_login.matricula.focus();
  }

 else location.href="reiniciar_senha.php?matricula="+form_login.matricula.value;

 return st;
}

/*
 $(function(){
	
 $("#form_login").ajaxForm({
	 beforeSend:function(){ 
	  //$.blockUI({message:"Aguarde..."}); 
	 },
	 success: function(data,textStatus,jqXHR){
		 alert(st);
		 var st = jqXHR.responseText;
		 
		 $("#status").empty().append(st);
	 },
	 complete:function(){
		 //$.unblockUI();
		 alert('deu'); 
		 },
	 error: function(jqXHR,textStatus,errorThrown){
	 	 var st = jqXHR.responseText;
		 $('body').append(st);
	 } 
 });
 
 });
 */