@extends('layouts.principal')
@section('content')
<h3>Inclusao de Processos</h3>
  @stack('scripts')
  <script type='text/javascript' src='../js/processos.js'></script>
  <form action='/processo_incluir/' method='post' onsubmit='javascript: return valida(this);'>
   @include('processos._form')
  </form>

<style>

textarea{
 width: 450px;
}

.gravanb{ 
 
 //background-color: #e5e5f5;
 border: 1px dotted #999222; 
 width: 600px;
 height:560px;
 border-radius: 6px;    
}

.txt_gde{
 width:450px;
}

.dt{
width:150px;
}

label{
float: left;
width: 100px;
font-weight: bold;
}

br {
clear:left;
}

input{
margin-bottom: 5px;
}

input[type='submit']{
 margin-left:50%;
}
</style>
  
@endsection