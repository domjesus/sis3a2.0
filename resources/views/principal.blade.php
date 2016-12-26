<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<title>Sis3A - Sistema de Apoio Administrativo na APS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/jquery-ui-1.9.2-custom.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css" />

<link rel="stylesheet" href="css/dataTables.min.css" type="text/css" />
<link href="css/ddsmoothmenu.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/docs.min.css" type="text/css" />
<link rel="stylesheet" href="css/fixedColumns.css" type="text/css" />


<script type="text/javascript" src="js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery-ui-192-custom.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/jquery.mask.js">     </script> 
<script type="text/javascript" src="js/dataTable.js"></script>
<script type="text/javascript" src="js/dataTable_dateUK.js"></script>
<script src='js/fixedColumns.js'></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>

</head>
<body>
<img src="img/loading.gif" hidden='true' id='loader'/>
<?php 

//CLASSE PARA CRIAR PASTAS DO OL
//$verifica = new verifica_pastas();
//$existe_pasta_ol = $verifica->ja_existe();
/*
if(!$existe_pasta_ol){
	echo "<script>$(function(){ $.blockUI({message:'Aguarde, criando pastas...',timeout:5000}); });</script>";
	$verifica->cria_pasta_ol();
	$verifica->cria_pastas();
	echo "<script>$(function(){ $.blockUI({message:'Pastas criadas',timeout: 5000}); });</script>";
}
*/	
//var_dump($v);
//$verifica->cria_pastas();

?>

<div id='tudo' class='tudo'>

<div id='main' class='main'>
 <div id='header' class='header'>
   <strong style='font-size: 12px; padding-left: 16px;' title='Sistema de Apoio Administrativo na APS'><p style='color: white;'>Sis3A - <?php echo "NOME NA SESSION - OL NA SESSION"; ?></p></strong>
 </div><!--  FIM DA DIV HEADER -->
	   <div id='logon' class='logon'>
	     <strong><span style='color: white'>Logado como:</span></strong>
	     <a href='principal.php?rota=alt_senha' title='Clique para alterar sua senha!' id='alt_senha'>
	      <spam class='glyphicon glyphicon-user btn-info btn-sm'> NOME PUXADO DA SESSION</spam>
	     </a>	   
	     <a href='Encerrar_sessao.php' id='btn_sair' title='Encerrar Sessão'>
	      <spam class='btn btn-sm glyphicon glyphicon-off'></spam>
	     </a>
	   </div><!--  FIM DA DIV LOGON -->	   
</div><!--  FIM DA DIV MAIN -->

<div id='contem_menu'>

<div id="smoothmenu1" class="ddsmoothmenu">
<ul>
 <li><a href="principal.php"><spam class='glyphicon glyphicon-home'></a></spam></li>
 
  <li><a href="#"><spam class='glyphicon glyphicon-folder-open'></spam> Processos</a>
   <ul>
    <li><a href="principal.php?rota=incluir"><spam class='glyphicon glyphicon-plus-sign'></spam> Incluir</a></li>    
    <li><a href='#'><span class='glyphicon glyphicon-th'></span> Represados</a>
     <ul>
	  <li>
	   <a href="principal.php?rota=represados"><spam class='glyphicon glyphicon-th-list'></spam> Individual</a>
	  </li>
	  <li>
 	   <a href="principal.php?rota=represados_geral"><spam class='glyphicon glyphicon-th'></spam> Geral</a>
	  </li>
	  <li><a href="principal.php?rota=rep_por_usuario"><spam class='glyphicon glyphicon-list-alt'></spam> Por usuario</a></li>
	  <li>
 	   <a href="principal.php?rota=relatorio_capa"><spam class='glyphicon glyphicon-book'></spam> Gerar Capa NB</a>
   	  </li>
   	  <li>
 	   <a href="principal.php?rota=represados_gera_lista"><spam class='glyphicon glyphicon-book'></spam> Gerar Lista</a>
   	  </li>   	     	     	     	  
	</ul>
	
	<li>
   	   <a href='#'><spam class='glyphicon glyphicon-list-alt'></spam> Exigências</a>
   	   <ul>
   	   <li>
   	     <a href='principal.php?rota=exigencias_consultar'>Consultar/Excluir</a>
   	    </li>
   	    <li>
   	      <a href="docs/manual exigencia.pdf" target='_blank'> Manual</a>
   	    </li>
   	    
   	   </ul>
		
    
  
   </li>
   <li><a href="principal.php?rota=ConsultaConcluidos"><spam class='glyphicon glyphicon-folder-close'></spam> Concluidos</a></li>
   <li><a href="principal.php?rota=consulta_historico"><spam class='glyphicon glyphicon-road'></spam> Hist&oacute;rico</a></li>
   
   
   
   <li><a href='#'><spam class='glyphicon glyphicon-plus'></spam> Procuradores</a>
   <ul>
    <li><a href="principal.php?rota=incluir_procurador">Incluir</a></li>
	<li><a href='principal.php?rota=consultar_alterar_procs'>Consultar/alterar</a></li>	
   </ul>   
   
   <li><a href='#'><spam class='glyphicon glyphicon-shopping-cart'></spam> Carga</a>

   <ul>
    <li><a href='principal.php?rota=carga_incluir'>Incluir</a>
    </li>
    <li><a href='principal.php?rota=carga_alterar_consultar_excluir'>Alterar/Consultar</a>
    </li>    
   </ul>
  </li>
  
  <li><a href='#'><spam class='glyphicon glyphicon-file'></spam> Fundamentacao</a>

   <ul>
    <li><a href='principal.php?rota=fund_incluir'>Incluir</a>
    </li>
    <li><a href='principal.php?rota=fund_alterar'>Alterar/Excluir</a>
    </li>    
   </ul>
  </li>
   
   
   </li>    
  
  <li>
	 <a href='#'><spam class='glyphicon glyphicon-envelope'></spam> AR's</a>
	 <ul>
	  <li>
	   <a href='principal.php?rota=cadastrar_ar'>Cadastrar</a>
	  </li>
	  <li>
	   <a href='principal.php?rota=ar_consultar'> Consultar</a>
	  </li>	  
	  
	  <li>
	   <a href='principal.php?rota=informar_codigo_ar'>Informar Código - AR</a>
	  </li>
	  <li>
	   <a href='principal.php?rota=excluir_ar'>Excluir registro</a>
	  </li>
	 </ul>	 
    </li>  
	
	<li>
	 <a href='#'><spam class='glyphicon glyphicon-dashboard'></spam> Utilidades</a>
	 
	 <ul>
	  <li>
	   <a href='extras/recols.php' target="_blank">Compara Recolhimentos</a>
	  </li>
	  <li>
	   <a href='extras/multipla.php' target="_blank">Multipla Ativ.</a>
	  </li>
	  <li>
	   <a href='extras/calcula_diferenca.php' target="_blank">Calcula Compl.</a>
	  </li>
	  <li>
	   <a href='src/despacho.php' target="_blank">Gerador de Despacho</a>
	  </li>
	  
	  <li>
	   <a href='src/soma_gfip.php' target="_blank">Somador de GFIP's</a>
	  </li>
	             
    
    <li>
	 <a href='#'><spam class='glyphicon glyphicon-envelope'></spam> Despachos</a>
	 <ul>
	  <li>
	   <a href='principal.php?rota=despacho_listar'>Listar/Excluir</a>
	  </li>	  
	 </ul>	 
    </li>      
  </ul>  
</li>

<li>
	   <a href='#'><spam class='glyphicon glyphicon-th-list'></spam> Check List</a>	  
	   <ul>
	   <li>
	     <a href='principal.php?rota=check_list_efetuar'>Efetuar</a>
	    </li>
	    <li>
	     <a href='principal.php?rota=check_list_incluir'>Cadastrar</a>
	    </li>
	    <li>
	     <a href='principal.php?rota=check_list_consultar'>Consultar/Excluir</a>
	    </li>
	    <li>
	     <a href='docs/manual check-list.pdf' target='_blank'>Manual</a>
	    </li>
	    
	   </ul>
	 </ul>
	 	 
    </li>

<li><a href="#"><spam class='glyphicon glyphicon-cog'></spam> Manuten&ccedil;&atilde;o</a>
  <ul>
  
  <li><a href="#">Administra&ccedil;&atilde;o</a>
      <ul>
	    <li><a href="principal.php?rota=incUsuario">Incluir Usu&aacute;rio</a>
		 <ul>
		  <li> 
		   <a href='principal.php?rota=inc_Usuario'>Incluir</a>
		  </li>
		  <li>
		   <a href='principal.php?rota=alt_exc_user'>Alterar/excluir</a>
		  </li>		  
		 </ul>		   
		</li>	
		
		<li>
		 <a href='#'>Estatisticas</a>
		   <ul>
		    <li>
			 <a href="principal.php?rota=acessos">Estat&iacute;sticas</a>		   
			</li>
			<li>
			<a href="principal.php?rota=acessos_detalhado">Por Usuario</a>
			</li>
		   </ul>		   
		   <li><a href='#'>Implanta&ccedil;&otilde;es</a>
			<ul>
			 <li>
			  <a href='principal?rota=implantacoes'>Listar</a>
			 </li>
		   
			</ul>
		   </li>
		</li>		
		<li><a href='#'>Novidades</a>
		 <ul>
		  <li>
		   <a href='principal.php?rota=news_incluir'>Incluir</a>		  
		  </li>
		  <li>
		   <a href='principal.php?rota=news_listar_excluir'>Alterar/Excluir</a>		  
		  </li>
		 </ul>
		</li>
	  </ul>
  </li>
  
  <li><a href="#">Configurar APS</a>
		 <ul>
		  <li> <a href='principal.php?rota=habilitar_modulo'>Habilitar módulos</a>
		  </li>		  
		 </ul>
		</li>  
  
  <li><a href='#'>Paginas</a>
	   <ul>
	    <li>
		 <a href='principal.php?rota=paginas_acessadas'>Consultar</a>
		</li>
	   </ul>
	  </li>
	  <li><a href='#'>CEP</a>
	   <ul>
	    <li><a href='principal.php?rota=cep&tipo=alterar'>Alterar</a>
	    </li>
	    <li><a href='principal.php?rota=cep&tipo=incluir'>Incluir</a>
	    </li>
	   </ul>
	  </li>
  </ul>  
</li>


<li><a href="#"><spam class='glyphicon glyphicon-thumbs-up'></spam> Sugest&otilde;es</a>
 <ul>
  <li><a href='principal.php?rota=sugestoes_incluir'> Incluir</a>   
  </li>
  <li><a href='principal.php?rota=sugestoes_listar'> Listar</a>   
  </li>
 </ul>
</li>

<li><a href="#"><spam class='glyphicon glyphicon-folder-open'></spam> Portaria 04</a>
    <ul>
	  <li><!-- <a href='principal.php?rota=portaria04'><spam class='glyphicon glyphicon-plus-sign'></spam> Incluir</a> NOVA TELA DE FORM PRA INCLUIR REGISTRO-->
	   <a href='principal.php?rota=portaria_04_incluir'><spam class='glyphicon glyphicon-plus-sign'></spam> Incluir</a> 
      </li>
	  <li>
	    <a href='principal.php?rota=portaria04_consultar'><spam class='glyphicon glyphicon-search'></spam> Consultar/Alterar</a>
      </li>
	  	  <li>
	    <a href='#'><spam class='glyphicon glyphicon-envelope'></spam> Cartas</a>
		<ul>
		 <li>
		  <a href='principal.php?rota=portaria04_convocacao'>Convocação</a>
		 </li>
		 <li>
		  <a href='principal.php?rota=portaria_04_carta_decisao'>Decisão</a>
		 </li>
		</ul>
      </li>
	  <li>
	    <a href='principal.php?rota=portaria04_status'><spam class='glyphicon glyphicon-pencil'></spam>Alterar Status</a>
      </li>
      <li>
	    <a href='principal.php?rota=portaria04_excluir'><spam class='glyphicon glyphicon-trash'></spam>Excluir Registro</a>
      </li>
      
      <li><a href='#'><spam class='glyphicon glyphicon-list'></spam>Relatorios</a>
       <ul>
        <li>
         <a href='principal.php?rota=portaria04_relatorios&tipo=status'>Por Status</a>
        </li>
        <li>
         <a href='principal.php?rota=portaria04_relatorios&tipo=pericia'>Por Decis&atilde;o da Per&iacute;cia</a>
        </li>
        
        
        <li>
         <a href='#'>Por Datas</a>        
         <ul>
          <li>
            <a href='principal.php?rota=portaria04_relatorios&tipo=data_dcb'>Por DCB</a>
          </li>
          <li>
            <a href='principal.php?rota=portaria04_relatorios&tipo=data_convocacao'>Por Dt Convoca&ccedil;&atilde;o</a>
          </li>
          
          <li>
            <a href='principal.php?rota=portaria04_relatorios&tipo=data_rev_permitida'>Por Dt Revis&ccedil;&atilde;o Permitida</a>
          </li>
         </ul>
         
         
        </li>
        <a href='principal.php?rota=portaria04_relatorios&tipo=conjunto'>Conjunto</a>
       </ul>
      </li>
	</ul>
</li>

<li><a href="#"><spam class='glyphicon glyphicon-question-sign'></spam> Per&iacute;cias</a>
    <ul>
	 <li><a href='#'>Perícias Geral</a>
	 <ul>	  
	  <li><a href='principal.php?rota=pericias'>Listar</a></li>	  	 
	 </ul>	 
	 </li>
	 
	 <li>
	  <a href='#'>Perícias Paralelas</a>
	  <ul>	   	   
	   <li>
	    <a href='principal.php?rota=pericia_paralela'>Incluir</a>
	   </li>
	   <li>
	    <a href='principal.php?rota=listar_pericias_paralelas'>Listar</a>
	   </li>
	   <li>
	    <a href='principal.php?rota=gera_ciencia'>Ciência</a>
	   </li>	   
	  </ul>
	 </li> 
	 
	  <li>
	      <a href='#'>Arquivo</a>
		  <ul>
		    <li>
			 <a href='principal.php?rota=pericias_env_arquivo'>Enviar</a>
			</li>
			<li>
			 <a href='principal.php?rota=pericias_processa_arquivo'>Processar</a>
			</li>
		  </ul>		
      </li>	  	  
	  <li>
	    <a href='principal.php?rota=excluir_pericia'>Excluir registro</a>
	  </li>
	  <li>
	    <a href='principal.php?rota=excluir_nao_comp'>Excluir n&atildeo comparecidos</a>
	  </li>
	  <li>
	    <a href='principal.php?rota=consulta_pericias'>Consultar</a>
	  </li>
	  <li>
	    <a href='principal.php?rota=cad_ausencia'>Cadastrar Aus&ecircncia</a>
	  </li>	  
	</ul>
	
</li>

<li>
<a href='#'><spam class='glyphicon glyphicon-envelope'></spam> Comunicados</a>
 <ul>
  <li>
   <a href='principal.php?rota=comunicados'><spam class='glyphicon glyphicon-plus-sign'></spam> Incluir</a>
  </li>
  
  <li>
   <a href='#'><spam class='glyphicon glyphicon-upload'></spam> Enviar arquivo</a>
   <ul>
    <li>
	 <a href='principal.php?rota=enviar_comunicado&tipo=carta'>Carta</a>
	</li>
	<li>	 
	 <a href='principal.php?rota=enviar_comunicado&tipo=oficio'>Oficio</a>
	</li>
	<li>
	 <a href='principal.php?rota=enviar_comunicado&tipo=memo'>Memo</a>
	</li>
   </ul>
  </li>  
    
  <li>
   <a href='principal.php?rota=consultar_comunicados'><spam class='glyphicon glyphicon-remove-circle'></spam> Consultar/Excluir Arquivo</a>
  </li>
  
  <li>
   <a href='#'><spam class='glyphicon glyphicon-book'></spam> Consultar Inativos</a>
   <ul>
    <li>
	 <a href='principal.php?rota=comunicados_inativos'> Consultar</a>
	</li>	
   </ul>
  </li>  
  
 </ul>
</li>

</ul>

<ul>
    <li>
	 <a href='#'><spam class='glyphicon glyphicon-eye-open'></spam> MOB</a>
	 <ul>
	  <li>
	   <a href='principal.php?rota=mob_cadastrar'><spam class='glyphicon glyphicon-plus'></spam> Cadastrar</a>
	  </li>
	  <li>
	   <a href='principal.php?rota=mob_consultar'><spam class='glyphicon glyphicon-info-sign'></spam> Consultar</a>
	  </li>
	  <li>
	   <a href='principal.php?rota=mob_alterar'><spam class='glyphicon glyphicon-info-sign'></spam> Alterar/Excluir</a>
	  </li>	  
	  <li>
	   <a href='principal.php?rota=mob_inativos'><spam class='glyphicon glyphicon-book'></spam> Inativos</a>
	  </li>
	   <li><a href='#'><spam class='glyphicon glyphicon-eye-open'></spam> Relat&oacute;rios</a>
	    <ul>	     
	     <li>
	      <a href='principal.php?rota=mob_relatorio&flag=prazo_vencido'><spam class='glyphicon glyphicon-info-sign'></spam> Prazo</a>
	     </li>
	     <li>
	      <a href='principal.php?rota=mob_relatorio&flag=sobrestado'><spam class='glyphicon glyphicon-info-sign'></spam> Sobrestado</a>
	     </li>
	     <li>
	      <a href='principal.php?rota=mob_relatorio&flag=edital'><spam class='glyphicon glyphicon-info-sign'></spam> Edital</a>
	     </li>
	    </ul>
	  </li>
	 </ul>	 
    </li>
    </ul>
     
<br style="clear: left" />

</div><!--  FIM DA DIV MENU-->
</div><!--  FIM DA DIV CONTEM MENU -->

<div id='conteudo' class='conteudo'>

</div> <!--fim da div conteudo -->
@yield
<div id='aux_footer' class='aux_footer'>
      <div id='footer' class='footer'>
       <div class="container"">
        <p class="text-muted">INSS - Instituto Nacional do Seguro Social - APS Canela - 19.022.020  - Desenvolvido por <a href="mailto:wandeir.souza@inss.gov.br">Wandeir Carneiro</a></p>
      </div>      
	 </div><!--fim da div footer -->
 
 
 <div id='div_copy'>   
   <p id='copy'> &copy; Todos os direitos reservados - 2015</p>   
 </div> 
 </div><!--fim da div aux footer -->  
</div> <!--fim da div tudo -->

</body> 
</html>



<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	method: 'hover',
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

$(function(){
$(document).tooltip();
$.unblockUI();
});

 $(function(){

var tempo = 30; //milisegundos
var ultimo_acesso = "";

 setInterval(function(){
	 var tempo = "";
	 resposta = "";
	 //alert(ultimo_acesso);
	 $.post("src/verifi_acessos.php",{flag:"parcial",time:ultimo_acesso},function(resposta){
		 var resp = resposta.split(",");		 
		 //alert(resp[2]);
		 //alert(ultimo_acesso+"->"+resp[3]);	
		 //alert(ultimo_acesso + "->"+resp);	 		 
		 if(ultimo_acesso != resp[2]){		  		  
		  $("p[class='bg-warning']").removeClass("bg-warning").addClass("bg-success");			 
		  $("#historico_acessos_online").prepend("<p class='bg-warning' style='padding-left: 5px;'>"+resp[0]+ "-> "+resp[1] + "-> " + resp[2]+ " -> "+resp[3]+"</p>");
		  //alert(resp[3]);		  
		  ultimo_acesso = resp[2];
		  //time = ultimo_acesso;		  
		 }		 
	 });	 
 },3000);

 $.post("src/verifi_acessos.php",{flag:"inicial"},function(resposta){
	 $("#historico_acessos_online").empty().prepend(resposta);
	 
 });

 $.post("src/verifi_acessos.php",{flag:"ultimo_acesso"},function(resposta){
	 temp = resposta.split(" ");
	 ultimo_acesso = temp[1];	 	 
 });

 }); 
 

$("a[name^='a_news']").click(function(){
	var tit = $(this).attr("val");

	$("#news_big").empty().append(tit).dialog({
		height:300,
		width: 450,
		modal: true,
		resizable: false,	   
	});	
});

$(function(){

	$("a[name^='fecha_div_child']").click(function(){
		var div = $(this).parent();
		div.hide(2000);
		var nome = div.attr("id");
		if(nome == "news_child")
		 $("#news_child2").css({"width":"100%"});
		else $("#news_child").css({"width":"100%"}); 
	});

	$("a[name^='mostra_div_child']").click(function(){
		$("#news_child").css({"width":"48%"}).show(2000);
		$("#news_child2").css({"width":"48%"}).show(2000);
		
	});

	$("a[name^='fecha_tudo']").click(function(){
		$("#news").fadeOut(2000);
			$("a[name^='mostrar_news']").css({"visibility":"visible"}).addClass("btn btn-info");				
	});

	$("a[name^='mostrar_news']").click(function(){ 
		$("#news").slideDown(2000);
		$("a[name^='mostrar_news']").css({"visibility":"hidden"}); 
	});
	
	
});

</script>


<style type="text/css">


.conteudo{
//background-image: url('img/previdencia_sec.jpg');
background-repeat: no-repeat;
background-position: 50% 50%;
height:500px;
}

.fecha_div_child,.fecha_div_child_2,.mostra_div_child{
 position: relative; 
 float: right;
 background-color: #39b3d7;
 color: white;
 border-radius: 3px;
}

.fecha_tudo{
 float:right;   
 background-color: #a94442;
 color: black;
 margin-left:5px; 
}

.mostrar_news{ 
 //padding-top: 300px;
 bottom: 100px;
 right:100px;
 position: absolute; 
 visibility:hidden; 
 //background-color:#f2dede;
 //color:#a94442;
 color: black;
 border:1px solid transparent #dca7a7;
 border-radius:4px; 
}

#div_aux{
 //height: 270px;  
}

#news{
 margin-top: 150px;
}

</style>