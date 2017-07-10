@extends('layouts.principal')
@section('content')
<p class='alert alert-info' style='text-align:center; font-size: 0.9em;'>Inclusao de Processos</p>
  @stack('scripts')
  <script type='text/javascript' src='../../js/processos.js'></script>
  <script>
  $(function(){

   $("select").on('change',function(){
   if($(this).val() == 'incluir'){
    sel = $(this);
    tablenome = $(this).attr('id');
    var campo1, campo2;
       
    switch(tablenome){
      case 'tipo_processos':
       campo1 = prompt('Digite o nome do tipo por exteno. ex: RECURSO ou REVISAO ou RECONHECIMENTO INICIAL' );
       campo2 = prompt('Digite o nome abreviado ex: RECINI ou REV ou REC');
      break;
      case 'especies':
       campo1 = prompt('Digite o numero da especie');       
       campo2 = prompt('Digite o nome da especie');
      break;
      case 'procuradores':
       campo1 = prompt('Digite o nome do procurador');
       campo2 = prompt('Digite o numero do telefone');
      break;

      case 'mobstatus':
       campo1 = prompt('Digite o nome do status');
       campo2 = campo1;
      break;

      case 'p04status':
       campo1 = prompt('Digite o nome do status');
       campo2 = campo1;
      break;

      case 'p04concpericia':
       campo1 = prompt('Digite o nome:');
       campo2 = campo1;
      break;
      
    }

    if((campo1 == "") || (campo2 == ""))
      alert("Atencao! Foi fornecida informacao em branco!");
    else 
      $.post('/inclusoes_ajax/',{'table':tablenome,'nome':campo1,'campo2':campo2,'_token':'{{csrf_token()}}' },function(resposta){
      sel.empty().append(resposta);
      //alert(resposta);
      //$('body').append(resposta);
    }); 
 
   }
   
  });
});
  </script>
  <form action='/processo/incluir/' method='post' onsubmit='javascript: return valida(this);'>
   @include('processos._form')

    @if(!isset($processo))
     @include('processos.mob')
     @include('processos.portaria04')   
    @endif
   
   <input type="submit" class="btn btn-default" value="Gravar" onclick="return confirm('Confirma?');"></input>
   <p id='status_inclusao' style='text-align:center' hidden='true'></p>
  </form>

  
@endsection