<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<title>Sis3A - Sistema de Apoio Administrativo na APS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../../css/jquery-ui-1.9.2-custom.css" type="text/css"></link>
<link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css"></link>
<link rel="stylesheet" href="../../css/bootstrap-theme.min.css" type="text/css"></link>

<!--  -->

<link rel="stylesheet" href="../../css/dataTables.min.css" type="text/css"></link>
<link href="../../css/novo_menu.css" rel="stylesheet"></link>

@push('scripts')
<script type="text/javascript" src="../../js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="../../js/jquery-ui-192-custom.js"></script>
<script type="text/javascript" src="../../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../../js/jquery.form.js"></script>
<script type="text/javascript" src="../../js/jquery.mask.js">     </script> 
<script type="text/javascript" src="../../js/submiting.form.ajax.js"></script>
<script type="text/javascript" src="../../js/dataTable.js"></script>
<script type="text/javascript" src="../../js/sis3a.js"></script>

@endpush

<script type="text/javascript" src="../../js/dataTable_dateUK.js"></script>
<script type="text/javascript" src="../../js/jquery.dropdown.js"></script>
<script type="text/javascript" src="../../js/jquery.dropdownPlain.js"></script>


<!--
OLD MENU
<link href="../css/ddsmoothmenu.css" rel="stylesheet"/>
<script type="text/javascript" src="../js/ddsmoothmenu.js"></script>
-->
@stack('scripts')
</head>
<body>
<div id='loader' hidden='true'>
 <img src="img/loading.gif" id=''/>
 </div>
<div id='tudo' class='tudo'>

<div id='main' class='main'>
 <div id='header' class='header'>
   <strong style='font-size: 12px; padding-left: 16px;' title='Sistema de Apoio Administrativo na APS'><p style='color: white;'>Sis3A - {{session('ol_numero')}}</p></strong>
 </div><!--  FIM DA DIV HEADER -->
	   <div id='logon' class='logon'>
	     <strong><span style='color: white'>Logado como: </span></strong>
	     <a href='/altera_senha/{{session('user_id')}}' title='Clique para alterar sua senha!' id='alt_senha'>
	      <spam class='glyphicon glyphicon-user btn-info btn-sm'> @php $exp = explode(' ',session('user_name')); echo $exp[0]; @endphp</spam>
	     </a>	   
	     <a href='/logout' id='btn_sair' title='Encerrar Sessão'>
	      <spam class='btn btn-sm glyphicon glyphicon-off btn-danger'></spam>
	     </a>
	   </div><!--  FIM DA DIV LOGON -->	   
</div><!--  FIM DA DIV MAIN -->

<div id='contem_menu'>

<div id="page-wrap" class="page-wrap">
<ul id='dropdown' class='dropdown'>
 <li><a href="/home/"><spam class='glyphicon glyphicon-home' accesskey='h'></a></spam></li>
 
  <li><a href="#"><spam class='glyphicon glyphicon-folder-open'></spam> Processos</a>
   <ul>
    
    <li><a href='#'><span class='glyphicon glyphicon-th'></span> Processos</a>
     <ul>
	<li><a href='/processos/incluir/'><spam class='glyphicon glyphicon-plus-sign'></spam> Incluir</a></li>      <li>
 	   <a href='/processos/represados/'><spam class='glyphicon glyphicon-th'></spam> Represados</a>
	  </li>
	  <li><a href="principal.php?rota=rep_por_usuario"><spam class='glyphicon glyphicon-list-alt'></spam> Por usuario</a></li>	  
   	  <li>
 	   <a href="principal.php?rota=represados_gera_lista"><spam class='glyphicon glyphicon-book'></spam> Gerar Lista</a>
   	  </li>   	     	     	     	  
   	  <li><a href="/processos/concluidos"><spam class='glyphicon glyphicon-folder-close'></spam> Condluidos</a></li>
	</ul>
	
	<li>
   	   <a href='#'><spam class='glyphicon glyphicon-list-alt'></spam> Documentos</a>
   	   <ul>
   	   <li>
   	     <a href='#'>Exigencias Consultar/Excluir</a>
   	    </li>
   	    <li>
   	      <a href="#" target='_blank'> Manual</a>
   	    </li>
   	    
   	   </ul>
		
    
  
   </li>
        
   <li><a href='#'><spam class='glyphicon glyphicon-plus'></spam> Procuradores</a>
   <ul>
    <li><a href="/procurador/incluir">Incluir</a></li>
	<li><a href='/procurador/listar/'>Consultar/alterar</a></li>	
   </ul>   
   
   <li><a href='#'><spam class='glyphicon glyphicon-shopping-cart'></spam> Carga</a>

   <ul>
    <li><a href='/carga/ativos/'>Alterar/Consultar</a>
    </li>
        <li><a href='/carga/inativos/'> Inativos</a>
    </li>    
    
   </ul>
  </li>
  
  <li><a href='#'><spam class='glyphicon glyphicon-file'></spam> Fundamentacao</a>

   <ul>
    <li><a href='/fundamentacao/incluir/'> Incluir</a>
    </li>
    <li><a href='/fundamentacao/listar/'> Alterar/Excluir</a>
    </li>    
   </ul>
  </li>
   
   
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
	   <a href='util/texto_SP_2.0.html' target="_blank">SP 2.0</a>
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
</ul>
</li>

<li><a href="#"><spam class='glyphicon glyphicon-cog'></spam> Manuten&ccedil;&atilde;o</a>
  <ul>
  
  <li><a href="#">Administra&ccedil;&atilde;o</a>
      <ul>
	    <li><a href="">Usu&aacute;rio</a>
		 <ul>
		  <li> 
		   <a href='/usuarios/incluir/'>Incluir</a>
		  </li>
		  <li>
		   <a href='/usuarios/listar/'>Alterar/excluir</a>
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
	  <li>
	    <a href='/portaria04_listar/'><spam class='glyphicon glyphicon-search'></spam> Consultar/Alterar</a>
      </li>
	  	  <li>
	    <a href='#'><spam class='glyphicon glyphicon-envelope'></spam> Cartas</a>
		<ul>
		 <li>
		  <a href='/portaria04/cartas/convocacao/'>Convocação</a>
		 </li>
		 <li>
		  <a href='/portaria04/cartas/decisao/'>Decisão</a>
		 </li>
		</ul>
      </li>
	  <li>
	    <a href='/portaria04/status/'><spam class='glyphicon glyphicon-pencil'></spam>Alterar Status</a>
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
	    <a href='#' onclick="alert('Módulo desabilitado!');">Excluir n&atildeo comparecidos</a>
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
   <a href='/comunicados_incluir/'><spam class='glyphicon glyphicon-plus-sign'></spam> Incluir</a>
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

    <li>
	 <a href='#'><spam class='glyphicon glyphicon-eye-open'></spam> MOB</a>
	 <ul>
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
	     <li>
	      <a href='principal.php?rota=mob_relatorio&flag=parcelamento'><spam class='glyphicon glyphicon-info-sign'></spam> Parcelamento</a>
	     </li>
	    </ul>
	  </li>
	 </ul>	 
    </li>


</ul>
<!--  FIM DA UL 'DROPDOWN' QUE GERENCIA O MENU-->

     
<br style="clear: left" />

</div><!--  FIM DA DIV MENU-->
</div><!--  FIM DA DIV CONTEM MENU -->

<div id='conteudo' class='conteudo'>  

 <!--
<div id='quick_search_div'>
 <strong><p>Pesquisa Rápida</p></strong>
 <input type='text' name='quick_search_name' id='quick_search_name' placeholder='Informe o nome...' size=50/> OU <input type='text' name='quick_search_nb' id='quick_search_nb' placeholder='NB: 000.000.000-0' />
 <input type='button' class='btn btn-info btn-md' value='Enviar' id='quick_search_btn' />
 <p id='quick_search_p' class='alert alert-warning' hidden='true'/>
</div>
<br />

<div id='atalhos'> 
 
 
</div>

<div id='news' class='news' title=''>
 <a href='#' name='fecha_tudo' class='fecha_tudo' title='Fecha tudo'><spam class='glyphicon glyphicon-off btn btn-xs'></spam></a>
 <a href='#' name='mostra_div_child' class='mostra_div_child'>Mostrar</a>
 
  
 <div id='news_child' class='news_child'>
  <a href='#' name='fecha_div_child' class='fecha_div_child' title='Fecha este componente'><spam class='glyphicon glyphicon-off btn btn-xs'></spam></a>
  <marquee direction="up" width="100%" behavior="slice" scrolldelay="250" onmouseover="this.stop();" onmouseout="this.start();" height='90%'>
   <spam>Clique sobre o link para detalhar</spam>
   <br />
  </marquee>
 </div> 
 -->

 @yield('content')
 
 
</div> <!--fim da div conteudo -->
<div id='aux_footer' class='aux_footer'>
      <div id='footer' class='footer'>
       <div class="container">
        <p class="text-muted">INSS - Instituto Nacional do Seguro Social - APS Canela - 19.022.020  - Desenvolvido por <a href="mailto:wandeir.souza@inss.gov.br">Wandeir Carneiro</a></p>
      </div>      
	 </div><!--fim da div footer -->
 
 
 <div id='div_copy'>   
   <p id='copy'> &copy; Todos os direitos reservados - 2016 - V2.0</p>   
 </div> 
 </div><!--fim da div aux footer -->  
</div> <!--fim da div tudo -->

</body> 
</html>