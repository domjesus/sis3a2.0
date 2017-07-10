
@extends('layouts.principal')

@section('content')
<div id='alt_senha'>
<form id='frm_altera_senha' onsubmit="return valida(this);" action="/senha/altera/{{$user['id']}}" method="post">
<input type='hidden' name='_token' value='{{csrf_token()}}' />
<fieldset><legend>Alterar Senha</legend></fieldset>

<input type='text' hidden='true' name='passwd_atual' id='passwd_atual' value='{{$user['passwd']}}'>

<table class="table">
<tr align='center'>
<td>Nome</td>
<td><input type='text' lenght = 50 name='nome' id='nome' READONLY='true' value = '{{$user['nome']}}'  class="form-control"></input></td>
</tr>
<tr align='center'>
<td>Matricula:</td>
<td><input type='text' lenght = 7 name='matricula' id='matricula' length=7 maxlength=7 READONLY='true' value='{{$user['matricula']}}' class="form-control"> </input> </td>
</tr>

<tr align='center'>
<td>Senha atual: </td>
<td><input type='password' name='passwd' id='passwd' class="form-control" ></td>
</tr>
<tr align='center'>
<td>Nova Senha: </td>
<td><input type='password' name='passwd_new' id='passwd_new' class="form-control" ></td>
</tr>
<tr align='center'>
<td>Repita Nova Senha: </td>
<td><input type='password' name='passwd_new_confirm' id='passwd_new_confirm' class="form-control" ></td>
</tr>
<tr align='center'>
<td colspan='2'><input type='submit' value='Gravar' class='btn btn-danger' onclick='javascript: return confirm("Confirma Alteração?")'></td>
</tr>
</table>
<p id='status' />
</form>
</div>

<script>

function valida(form){

var status = true;

 if(form.passwd.value == ""){
  alert('Senha Atual não pode ser vazia!');
  status = false;
 }

 else if(form.passwd_new.value == ""){
  alert('Senha Nova não pode ser vazia!');
  status = false;
 }
 else if(form.passwd_new_confirm.value != form.passwd_new.value){
  alert('Senha nova e confirmação não são iguais!');
  status = false;
 }
 
 return status;

}

</script>

<style>
div{
background-color: #ddd;
}

</style>
@endsection	