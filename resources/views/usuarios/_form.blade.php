
@if (count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
 
<input type='hidden' name='_token' value='{{csrf_token()}}' />
<label>Nome: </label>
  <input type='text' name='nome' id='nome' class='form-control' placeholder='Nome' required/ value='{{$user['nome'] or ""}}'><br />
<label>Matricula</label>
  <input type='text' name='matricula' id='matricula' length=7 maxlength=7 class='form-control' placeholder='Matricula' required value='{{$user['matricula'] or ""}}'></input><br/>
<label>Senha:</label>
  <input type='password' name='passwd' id='passwd' class='form-control' placeholder='Senha' required='true' value='{{ $user['passwd'] or "" }}'></input><br>

<label>Confirme senha: </label>
  <input type='password' name='passwd_confirm' id='passwd_confirm' class='form-control' placeholder='Confirme Senha' required value='{{ $user['passwd'] or "" }}'></input><br />

<label>Nivel de Acesso:</label>
 <select name='nivel_acesso' id='nivel_acesso' required>
     @foreach($nivel_acesso as $nivel)
      @if(isset($user))
        @if($nivel->id == $user['nivel_acesso'])
         <option value='{{$nivel->id}}' selected>{{$nivel->nome}}</option>
        @else      
         <option value='{{$nivel->id}}'>{{$nivel->nome}}</option>
        @endif
       @else
        <option value='{{$nivel->id}}'>{{$nivel->nome}}</option>
       @endif

      
     @endforeach
 </select> <br />
 
  <label>Lotação:</label>
   <select id='id_ol' name='id_ol'>
     <option value='0'>Selecione...</option>
     @foreach($ol as $ol)
     @if(isset($user))
      @if($ol->id == $user['id_ol'])
       <option value='{{$ol->id}}' selected>{{$ol->nome}}</option>
      @else      
       <option value='{{$ol->id}}'>{{$ol->nome}}</option>
      @endif
     @else
      <option value='{{$ol->id}}'>{{$ol->nome}}</option>
     @endif
     
     @endforeach
  </select> <br />
    		
    		<label>id_cargo:</label>
   <select id='id_cargo' name='id_cargo'>
  	 <option value='0'>Selecione...</option>
     @foreach($cargo as $cargo)
      @if(isset($user))
        @if($cargo->id == $user['id_cargo'])
         <option value='{{$cargo->id}}' selected>{{$cargo->nome}}</option>
        @else      
         <option value='{{$cargo->id}}'>{{$cargo->nome}}</option>
        @endif
       @else
        <option value='{{$cargo->id}}'>{{$cargo->nome}}</option>
       @endif
      @endforeach
   </select> <br />


@stack('scripts')
<script>
function valida(form){
 st = true;

 if(form.nome.value==""){
  st = false;
  alert('Preencha o nome!');
  form.nome.focus();
 }

 if(form.matricula.value==""){
  st = false;
  alert('Preencha a matricula!');
  form.matricula.focus();
 }
 
 if(form.passwd.value==""){
  st = false;
  alert('Preencha a senha!');
  form.passwd.focus();
 }

if(form.passwd.value != form.passwd_confirm.value){
 alert("Senhas não são iguais. Verifique!");
 st = false;
 form.passwd_confirm.focus();

}else 

if($("#id_ol").val() == 0){
  alert("id_ol não informado!")
  st = false;
}else 

if($("#id_cargo").val() == 0){
  alert("id_cargo não informado!")
  st = false;
}

 return st;
}
</script>

<style>
input[type='submit']{
 margin-left: 50%;
}

#inc_user{
//background-cid_olor:#ddd;
//border-radius:5px;
width: 550px;
}
form{
//background-cid_olor:#ddd;
//border-radius:5px;
width: 550px;
}
</style>
