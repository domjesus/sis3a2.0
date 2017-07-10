{{-- 
//GERAR DOCUMENTO DE CARGA DE PROCESSO PARA PROCURADOR ASSINAR.
//require_once("../util/dompdf/dompdf-master/dompdf_config.inc.php");

//header('Content-Type: text/html; charset=utf-8');
--}}
<!doctype html> 
<html> 
    <head>           
  <style>
#main{
text-align:center;
}
#identif{
font-size: 20px;
}

#comunica{
margin:10px;
width:85%;
font-size: 20px;
text-align: justify;
}

#tudo{
 margin:10px;
 width:100%;
 height: 95%;
}

#rodape{
botton: 0;
position: absolute;
text-align: center;
font-size:13;
}
</style>

    </head> 
  <body>

<div id='tudo'>
<div id='main'>
<img src='../img/previdencia_pequeno.jpg' />
<h3>{{$carga->ol->nome}} - {{$carga->ol->numero}}<br / >
{{Date('d/m/Y')}} 
</h3>
</div>

<h2 style='text-align:center'>Carga de Processo para Advogado Constitu&iacute;do</h2>
<p>Fundamentação Legal: Artigo 699 da IN 77/2015</p>
<div id='identif'>
 <fieldset>
  <legend>
   Segurado
  </legend>
 <label><strong>Nome: </strong><label>{{$carga->processo->nome}}<br>
 <label><strong>NB: </strong><label>{{$carga->processo->nb}}<br>
  </fieldset>
  
  <fieldset>
   <legend>
    Procurador
   </legend>
 <label><strong>Nome: </strong><label>{{$carga->procurador->nome}}<br> 
 <label><strong>OAB: </strong><label>{{$carga->procurador->oab}}<br> 
  </fieldset>
</div>

<div id='comunica'>

</div>

<fieldset>
 <legend>
  Termo de compromisso na carga
 </legend>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Nesta data fa&ccedil;o carga do processo citado acima ao (a) advogado(a) constitu&iacutedo(a), conforme procura&ccedil;&atildeo anexa ao processo em quest&atilde;o.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Certifico que o processo administrativo cont&eacute;m _____ folhas numeradas e rubricadas, por mim conferidas.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
O(a) procurador(a) compromete-se a devolver o processo tal qual se encontra, em perfeitas condi&ccedil;&otilde;es no prazo de <u><strong><bold>10(DEZ) dias<bold></strong></u>.
<br>
Data: _____/______/________
<br>
Assinatura Procurador: _____________________________      <br><br>Assinatura do servidor: _____________________________
 </fieldset>

<br>
 
 <fieldset>
 <legend>
  Na devolu&ccedil;&atilde;o
 </legend>
 Nesta data o Processo Administrativo de n&uacute;mero citado acima, FOI DEVOLVIDO pelo procurador Sr(a) {{$carga->procurador->nome}}, OAB: {{$carga->procurador->oab}}<br>
  Certifico que o processo administrativo cont&eacute;m _____ folhas, todas devidamente numeradas e rubricadas, por mim conferidas.
<br>
  Data: _____/______/________
<br>

Assinatura Procurador: _____________________________      <br>Assinatura do servidor: _____________________________
																									
 </fieldset>
</div>

<div id='rodape'>

<p style='font-size: 12px; font-weight: bold;'>{{$carga->ol->endereco}}</p>
</div>

	</body>
</html>
