         <html>
         
           <head>
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <style>
p{
//text-align:justify;       
}
body{
width: 100%;
}
        
#div_exigências{
 float: left;
 
}       

#identif{
font-size: 15px;
}

#tudo{
 margin:10px;
 width:100%;
 height: 95%;
}
        
#main{
text-align:center;
}
#servidor{

}

#servidor_aux{
position:relative;
width: 100%;
text-align:center;
}


#despacho{
 padding:10px;
 margin-left:35px;
}

#rodape{
botton: 0;
position: absolute;
text-align: center;
font: 13px;
}


ol,li{
 padding-left:20px;
 margin-top:10px;
}
</style>
           </head>

<div id='tudo'>

        <div id='main'>
         <img src='/img/previdencia_pequeno.jpg' />
         <p>Gerência Executiva em Caxias do Sul - 19.022<br />

          {{$processo->ol->nome}}  - {{$processo->ol->numero}}<br />
          
           

          @php 
           $cidade_tmp = explode(' ',$processo->ol->nome)
          @endphp
          
          
          @if(count($cidade_tmp) == 1)
           {{$cidade_tmp[1]}}
          @elseif(count($cidade_tmp > 2 ))
           @for($i = 1; $i < count($cidade_tmp); $i++)
            {{ $cidade_tmp[$i]}}
           @endfor
          @else $processo->ol->nome
          @endif
          -RS - 
          {{Date('d/m/Y')}}</p>
          
          <h3>Carta de Exigências</h3>
         </div>

          
            <div id='identif'>      
            <fieldset style='width: 450px;border-radius:5px'>
            <legend>
             Segurado(a)
            </legend>
            <p><label><strong>Nome: </strong></label>{{$processo->nome}}<br />
            <label><strong>E/NB: </strong></label>{{$processo->especie->numero}}/{{$processo->nb}}</p>
          </fieldset>
         </div>

        <body>
                <div id='div_exigências'>
                 <p>Fundamentação Legal: Art. 40 da Lei 9784 de 29 de Janeiro de 1999, Art. 678, § 1º da Instrução Normativa INSS/PRES de 15 de Janeiro de 2015. <br /><br /> 
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Para darmos andamento ao pedido de benefício em referência, solicitamos comparecer nesta 
                 Agência da Previdência Social de <u><b>segunda a sexta das 07:00 as 17:00</b></u> para apresentar documentos listados abaixo:                  
                 </p>
                
          
         <ol>

         @for($i = 0; $i < count($exigencia); $i++)
            @if($exigencia[$i] != "") 
             <li>{{$exigencia[$i]}}</li>             
            @endif
         @endfor   
        
         
         </ol>        
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comunicamos que caso não seja(m) cumprida(s) a(s) exigência(s) acima, o processo será analisado com a documentação inicialmente apresentada, podendo acarretar o indeferimento do mesmo.
         <br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O prazo para cumprimento da(s) exigência(s) é de <u><b>30 (trinta) dias</b></u> a partir da data da ciência nesta carta.
         <br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Favor apresentar esta carta no ato do comparecimento.
         <br /><br /><br />
         </div>
         Atenciosamente
         
         
         <div id='servidor_aux'> <div id='servidor'>
         _______________________________________
          <p>{{$user->nome}} <br /> {{$user->cargo->nome}} <br />Matr&iacute;cula:{{$user->matricula}}</p></div></div>
         Ciente em ______/______/______ <br /><br /><br /> ________________________________________________ <br />Assinatura
         </div> <!-- FIM DA DIV TUDO -->
        
           @if($salvar)
            EH PRA SALVAR
           @else
            NAO EH PRA SALVAR
           @endif
           </body>

          </html>