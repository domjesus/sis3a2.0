<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reinicialização de passwd</title>
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="../css/bootstrap-theme.min.css" type="text/css" />
<link href="../css/sticky-footer-navbar.css" rel="stylesheet">

<script>

function validaCPF () {

if (vercpf(document.getElementById('cpf').value)) 
  {
   return true;
  }
 else 
  {
   errors="1";
   if (errors) 
    alert('CPF Não válido!');
   document.retorno = (errors == '');
   return false;
  }
}//FIM DA FUN��O VERIFICACPF


function vercpf (cpf) 
 {
  if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
   return false;

  add = 0;

  for (i=0; i < 9; i ++)
   add += parseInt(cpf.charAt(i)) * (10 - i);
   rev = 11 - (add % 11);
   if (rev == 10 || rev == 11)
   rev = 0;
   if (rev != parseInt(cpf.charAt(9)))
   return false;
   add = 0;
   for (i = 0; i < 10; i ++)
   add += parseInt(cpf.charAt(i)) * (11 - i);
   rev = 11 - (add % 11);
   if (rev == 10 || rev == 11)
   rev = 0;
   if (rev != parseInt(cpf.charAt(10)))
   return false; 

//   alert("O CPF INFORMADO � V�LIDO.");
   
   return true;
}//FIM DA FUN��O VERCPF


function validapasswd(){

 var st = true;
 var passwd = document.getElementById("passwd").value;
 var passwd_confirm = document.getElementById("passwd_confirm").value;

  if(passwd != passwd_confirm){
   alert("Senhas não são iguais! Verifique!");
   st = false;
   document.getElementById("passwd").value = "";
   document.getElementById("passwd_confirm").value = "";
   document.getElementById("passwd").focus();
  }
  else if(passwd == "123"){
	  alert("Senha não permitida!");
      st = false;
  }
  else if(document.getElementById("passwd").value < 6){
  	alert("Senha muito pequena!");
    st = false;
  }

 return st;   

}

function valida(){
  return (validaCPF() && validapasswd());
}

</script>
</head>

<body>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Sis3A/Reinicialização de passwd</a>
          </div>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>


<form action = "/esqueceu_senha/" method="post" onsubmit="return valida(this);">
<input type='hidden' name='_token' value='{{csrf_token()}}' />
<div id="dados" style="text-align: center">
 <label>Matricula:</label><input type='text' size='10' maxlength='10' class='form-control' name='matricula' id='matricula' value='{{$matricula}}' readonly='true'/>

 <br><label>CPF:<input type="text" name="cpf" size="12" maxlength="11" id="cpf" placeholder="000.000.000-00" required class='form-control'></input></label>
 <br>
 <label>Senha: <input type="password" name="passwd" id="passwd" class="form-control" required/></label>
 <br>
 <label>Confirme senha: <input type="password" name="passwd_confirm" id="passwd_confirm" class="form-control" required/></label>

 <br><input type="submit" value="Gravar" class="btn btn-danger"/>
<br><br><a class="btn btn-default" href="/">Voltar para Login</a>
</form>

</div>
</body>
</html>

