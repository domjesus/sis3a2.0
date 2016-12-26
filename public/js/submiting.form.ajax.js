$("form").ajaxForm({

  	beforeSend: function(){
      $.blockUI({message:"Aguarde..."});
		},
		success: function(data,textStatus,jqXHR){
		     var st = jqXHR.responseText;
          //$("#status").attr({class:"bg-success"}).text(st);
          //$("input[type='text'], select,input[type='submit'],input[type='password'").attr("disabled","true");
          
          $('body').append(st);
                  
		},
		complete:function(){
			$.unblockUI();
			
		},
		error: function(jqXHR,textStatus,errorThrown){
		 var st = jqXHR.responseText;
		 //$("#status").attr({class:"alert alert-danger"}).text("Erro!"+st);
      
         //$(this).parent().append('<pre>'+st+'</pre>');
         $('body').append(st);
         //alert(st);
		}
	});