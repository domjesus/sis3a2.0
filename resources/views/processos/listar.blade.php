@extends('layouts.principal')

@section('content')
 <table class='table'>
 	<thead>
  		<tr>
  			<th>
  			 NOME
  			</th>
  			<th>
  		     NB
  		    </th>
  		    <th>
  		     DER
  		    </th>
  		    <th>
  		     DHB
  		    </th>
  		    <th>
  		     USUARIO
  		    </th>
  		</tr>
  	</thead>
  	<tbody>
  
 @foreach($processos as $processo)
  		<tr>
  			<td><a href='/processos_incluir/{{$processo->id}}'>{{$processo->nome}}</a></td>
  			<td>{{$processo->nb}}</td>
  			<td>{{Date('d/m/Y',strtotime($processo->dt_der))}}</td>
  			<td>{{Date('d/m/Y',strtotime($processo->dt_dhb))}}</td>
  			<td>{{$processo->user->nome}}</td>
  		</tr>
 @endforeach
  	</tbody>
  </table>

 @stack('scripts')
 <script>
   $(function(){
   	$("table").dataTable();
   });
 </script>
@endsection