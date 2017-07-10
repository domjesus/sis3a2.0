
<div id='incluir'>
 <input type='hidden' name='_token' value='{{csrf_token()}}'/>	
 <label>Nome:</label>
  <input type='text' name='nome' required value='{{$fund['nome'] or ""}}'/>
 <label>Fundamenta&ccedil;&atilde;o:</label>
  <input type='text' name='txt_fundamentacao' id='txt_fundamentacao' value='{{$fund['txt_fundamentacao'] or ""}}' required />
 <label>Tipo:</label>
 <select name='despacho'>
 	@if(isset($fund['despacho']))
 	 @if($fund['despacho'])
 	  <option value='0'>Indeferimento</option>
 	  <option value='1' selected>Concessao</option>
 	 @else
 	  <option value='0' selected>Indeferimento</option>
 	  <option value='1'>Concessao</option>
 	 @endif
 	@else
 	 <option value='0'>Indeferimento</option>
 	 <option value='1'>Concessao</option>
 	@endif
 </select> <br />
@if(session('nivel_acesso') > 1)
<label>Abrangencia:</label>
 <select name='abrangencia'>
 	@if(isset($fund['abrangencia']))
 	 @if($fund['abrangencia'])
 	  <option value='0'>Geral</option>
 	  <option value='1' selected>Local</option>  
 	 @else
 	  <option value='0' selected>Geral</option>
 	  <option value='1'>Local</option>
 	 @endif
 	@else
 	 <option value='0'>Geral</option>
 	 <option value='1'>Local</option>
 	@endif
 	
 </select> <br />
@endif

</div>

<script>

function valida(){

	tipo = $("#despacho").val();
	if(tipo == 0)
	{
	 alert("Informe o tipo!");
	 return false;
	}
	else return true;
	 
}

	 $("input[type='text']").keyup(function(){
		 $(this).val($(this).val().toLowerCase());
	 });
 });
</script>

<style>
 #incluir{
  width:350px;
  background-color: #ddd;
 }
 
 input:hover{
  background-color: gold;
 }
 
label{
float: left;
width: 120px;
font-weight: bold;
}

input[type='text']{
width: 350px;
margin-bottom: 5px;
}

#btn_enviar{
margin-left: 120px;
margin-top: 5px;
}

br{
clear: left;
} 
</style>