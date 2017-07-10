@extends('layouts.principal')

@section('content')
   
   <form action="/comunicados_incluir/" method="post" enctype="multipart/form-data" onsubmit="return valida(this);">

    <h2>Incluir Comunicados</h2>
    @include('comunicados._form')
    <br>
    <input type="submit" value="Gravar" class='btn btn-danger' onclick="return confirm('Confirma inclusao?')" id='enviar'/>
   </form>
   
 @stack('scripts')
 <script>

 $(function(){
 	//alert('jq na inc');

  $("select").on('change',function(){
   if($(this).val() == 'incluir'){
    sel = $(this);
    tablenome = $(this).attr('id');
    //alert(tablenome);

       campo1 = prompt('Digite o nome do comunicado');
	$.post('/inclusoes_ajax/',{'table':tablenome,'nome':campo1,'_token':'{{csrf_token()}}' },function(resposta){
      sel.empty().append(resposta);
      //alert(resposta);
      //$('body').append(resposta);
    });   }//fim do if	
 });
});
 </script>
 <style>
  form{
  	width: 100%;
  	background-color: #dddeff;
  	height: 450px;
  	text-align: center;
  }
 </style>
@endsection