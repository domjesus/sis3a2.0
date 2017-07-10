@extends('layouts.principal')

@section('content')

<h3>Carta de exigências</h3>

<form target='_blank' action='/processo/exigencia/incluir/{{$processo->id}}' method='post'>
<div id='div_exig'>
  <input type='hidden' name='_token' value='{{csrf_token()}}' />

 <label>Nome: 
  <input type='text' name='nome' value='{{$processo->nome}}' readonly='readonly' size='35'/>
 </label>
 <br />
 
 <label>Esp/ 
  <input type='text' name='esp' value='{{$processo->especie->numero}}' readonly='readonly' size='2'/>
 </label>
 
 <label>NB: 
  <input type='text' name='nb' value='{{$processo->nb}}' readonly='readonly' size='15'/>  
 </label>
  <input type='button' id='add_linha' value='Adiciona Linha' class='btn btn-danger'/>
 <div id='div_exigencia_texto'>  
  <textarea name='exigencia_txt[]' id='exigencia_txt' rows='3' cols='90' placeholder='Digite o texto da Exigência 1: '></textarea>
  
 </div>
 
 

</div>
<br />
<input type='radio' name='salvar' value='1'>Salvar</input>
<input type='radio' name='salvar' value='0' checked>Exibir</input><br /><br />


<input type='submit' value='Enviar' class='btn btn-success' />
</form>

<style>
 #div_exigencia_texto{  
  
  
 }
 br{
  clear:left;
 }
 #add_linha{
  
 }
 textarea {
	float:left;
}
</style>
@stack('scripts')
<script>
 $(function(){
  var cont = 1;
  $("#add_linha").click(function(){
	  
	  $("#div_exigencia_texto").append("<br /><textarea name='exigencia_txt[]' id='exigencia_txt' rows='3' placeholder='Digite o texto da Exigência: "+(++cont)+"' cols='90'></textarea>");
  });
 });
</script>
@endsection