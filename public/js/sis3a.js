//script do sis3a
$(function(){   
   alert('aki');

   $('input[type='text',textarea]').on('keyup',function(){
		antes = $(this).val();
		$(this).val(antes.toUpperCase());

	});
});