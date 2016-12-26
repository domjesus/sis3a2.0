<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<style>
 #atualize{
  width: 60%;
  border-radius:10px;
  background-color: #dddfff;
  margin-top: 350px;
  height: 250px;
  margin-left: 20px;
  padding: 6px;
  
 }
</style>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css" />
<link href="css/sticky-footer-navbar.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">
<title>Sis3A - Sistema de Apoio Administrativo na APS</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/signin.js"></script>
<script>
 $(function(){
  $("#matricula").keyup(function(){
    $("#erro").hide(); 
  });
 });

function verif_matricula(){
 var st = true;

 if(form_login.matricula.value == ""){
  alert("Preencha a matrícula!");
  st = false;
  form_login.matricula.focus();
  }

 else location.href="/esqueceu_senha/"+form_login.matricula.value;

 return st;
}

</script>
</head>

<body>
@if (count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<?php

  function verifica_browser(){
  $useragent = $_SERVER['HTTP_USER_AGENT'];
 
  if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'IE';
  } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Opera';
  } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Firefox';
  } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Chrome';
  } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Safari';
  } else {
    // browser not recognized!
    $browser_version = 0;
    $browser= 'other';
  }
 $st;
 if($browser == "IE" && $browser_version <= 9)
  $st = 0; //echo "<script> alert('Atencao! Detectado IE ".$browser_version."! Para melhor funcionamento deste programa, sugerimos a utilizacao de Internet Explorer 10 ou superior ou Mozila/Chrome, versoes atualizadas')</script>";
 else if($browser == "Firefox"){
  if($browser_version <= 25){
    $st = 0; 
   //echo "<script> alert('Atencao! Detectado Mozila Firefox versao ".$browser_version."! Para melhor funcionamento deste programa, sugerimos a utilizacao de versoes atualizadas deste navegador!')</script>";
  }
  else $st = 1;
 } 
 else if ($browser == 'Chrome')
   $st = 1; //echo "<script> alert('Atencao! Navegador detectado: ".$browser." versao: ".$browser_version."! Para melhor funcionamento deste programa, sugerimos a utilizacao de Internet Explorer 10 ou superior ou Mozila/Chrome, versoes atualizadas')</script>";
 
 return $st;
  }
  
  
  if(!verifica_browser())
  //VERIFICA SE O CLIENTE TEM O NAVEGADOR QUE SUPORTE AS FUNCIONALIDES DO SISTEMA.
  {//NÃO TEM
  	echo '
  		<div id="atualize">
  		 <p style="font-size: 20px; text-align: center">Atenção! Este sistema utiliza recursos que somente os navegadores mais modernos suportam. Por favor queira acessar de um dos navegadores mostrados abaixo e caso não os tenha instalado na máquina, é rapidinho, só baixar e instalar!</p>
    		<p>Clique sobre o ícone para ser redirecionado!</p>
    		<img id="img_ie" src="img/ie.png" title="Clique para instalar o IE 11" onclick="alert(\'Atenção! O SIPPS é incompatível com o IE 11!\');" />
    		<img id="img_ff" src="img/firefox.png" title="Firefox versões acima de 25" onclick="alert(\'Redireciona para a página do FF!\');"/>
    		<img id="img_chrome" src="img/chrome.png" title="Chrome versões atualizadas!" onclick=" if(confirm(\'Confirma Download?\')) location.href=\'browsers/ChromeStandaloneSetup.exe\';"/>
  		</div>
  		';
  }
  else 
  {//TEM
?>  	
  	
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
  	<a class="navbar-brand" href="index.php">Sis3A - Sistema de Apoio Administrativo na APS</a>
  	</div>
  	</div><!--/.nav-collapse -->
  	</div><!--/.container-fluid -->
  	</div>  	
  	
  	<form action="/logar" method="post" onsubmit="return valida(this)" class="form-signin" id="form_login">
  	<h2 class="form-signin-heading">Login</h2>
  	<input type="hidden" name="_token" value="{{csrf_token()}}"></input>
  	<input type="text" name="matricula" class="form-control" id="matricula" placeholder="Matricula" onkeyup="verifica(this)" maxlength="7" value="{{$matricula or '' }}" autofocus/>
  	<input type="password" name="passwd" id="passwd" class="form-control" placeholder="Senha" value="{{$passwd or ''}}" required/></td></tr>
  	
  	<!-- <input type="image" src="entrar.jpg" value="Gravar"></input> -->
  	<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
  	
  	<a href="#" onclick="return verif_matricula()">Esqueceu a Senha? Clique aqui!</a>
  	<br /><br /><br /><br />
  	<a href="manual.pdf">Manual do Sistema</a><br /><br />
  	
  	<a href="Firefox29.exe">Instalador do Mozila v29</a>, <a href="Firefox31.exe">Mozila v31</a> ou <a href="Chrome.exe">Google Chrome</a>';
<?php
  }
 
?>
<p id='status'></p>
@if(isset($login_error))
 <p class='alert alert-danger' id='erro'>Usuario e/ou senha invalidos!</p>
@endif
</form>

</body>
</html>