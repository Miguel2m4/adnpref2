$(document).ready(function(){

	$('.bloquear').live('click',function(){
		id= $(this).prop('id');
		if($(this).is(':checked'))
			accion ='si'
		else
			accion ='no';
		$.post('libs/acc_listar',{opc:'bloquear',cod:id,accion:accion});
	})

	$('.activar').live('click',function(){
		id= $(this).prop('id');
		if($(this).is(':checked'))
			accion ='no'
		else
			accion ='si';
		$.post('libs/acc_listar',{opc:'activar',cod:id,accion:accion});
	})

	$('.edita').live('click',function(){
		id = $(this).prop('id')
		$('<form action="editar-inmueble" method="POST">' +
   				 '<input type="hidden" name="id" value="' + id+ '">' +
   		'</form>').appendTo('body').submit();
	})

	$('.ligar').live('click',function(){
		id = $(this).prop('id')
		$('<form action="ligar" method="POST">' +
   				 '<input type="hidden" name="id" value="' + id+ '">' +
   		'</form>').appendTo('body').submit();
	})

	$('.deslig').live('click',function(){
		id = $(this).prop('id');
		data ={opc:'desligar',id_arren:id};
		$.post('libs/acc_inmueble',data).done(function(){
		    $('#fondo').remove();
			$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
			$('#fondo').append("<div class='rp' style='display: none; text-align: center' id='rp'><span>Inmuebles Desligado</span></div>");
			setTimeout(function() {
	        	$('#fondo').fadeIn('fast',function(){
	            $('#rp').animate({'top':'350px'},50).fadeIn();
	         	});
	        }, 400);
	        setTimeout(function() {
	            $("#rp").fadeOut();
	            $('#fondo').fadeOut('fast');
	        }, 2500);
	        setTimeout(function() {
	            $('#filtrar').submit();
	        }, 3000);
		})
	})

})