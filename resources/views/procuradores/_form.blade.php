 	
 	<div id='procuradores'>
 	 <input type='text' name='_token' value='{{csrf_token()}}' hidden='true' />

<label>Nome:</label><input type='text' id='nome' name='nome' class='texto_gde' placeholder='Nome do Procurador' required AUTOFOCUS value='{{$procurador['nome'] or ''}}'/><br />
<label>OAB:</label> <input type='text' id='oab' name='oab' class='texto_pq' placeholder='OAB' maxlength=7 value='{{$procurador['oab'] or ''}}'/><br />
<label>Nit:</label> <input type='text' id='nit' name='nit' class='texto_md' placeholder='NIT' value='{{$procurador['nit'] or ''}}'/><br />
<label>Escritório:</label> <input type='text' id='escritorio' name='escritorio' class='texto_md' placeholder='Escritório' value='{{$procurador['escritorio'] or ''}}'></input><br />
<label>Telefone:</label><input type='text' id='telefone' name='telefone' class='texto_md' placeholder='Nr de Telefone' required value='{{$procurador['telefone'] or ''}}'></input><br />
<label>Celular:</label><input type='text' id='celular' name='celular' class='texto_md' placeholder='Nr de Telefone Celular' value='{{$procurador['celular'] or ''}}'></input><br />
<label>E-mail:</label><input type='email' id='email' name='email' class='texto_md' placeholder='E-mail' value='{{$procurador['email'] or ''}}'></input><br />
<p id='status' />

</div>

<style>

form{
background-color:#ddd;
border-radius:5px;
width: 550px;
height: 450;
}

label{
 float: left;
 width: 90px;
 margin-top: 6px;
}
br{
 clear: left;
}
</style>
@stack('scripts')
<script>

$(function(){	
/*
$('#nome').val('ALGUM PROCURADOR');
$('#oab').val('44333');
$('#nit').val('2.333.444.555-9');
$('#escritorio').val('do proprio advogado');
$('#telefone').val('54 32821330');
$('#celular').val('54 999823499');
$('#email').val('adv@adv.com.br');
*/
 	
 $("#celular").mask('(00) 00000-0000');
 $("#telefone").mask('(00) 0000-0000');
 $("#nit").mask("0.000.000.000-0");

 $("input[type='text'], input[type='email']").keyup(function(){	 
	 if($(this).attr("type") == 'email')
		 $(this).val($(this).val().toLowerCase());
	 else $(this).val($(this).val().toUpperCase()); 
 });
});
</script>