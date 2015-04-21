$(document).ready(function(){
// cargar('%','%','%','%');

// 	$('#filtro1').on('submit',function(e){
// 		e.preventDefault();
// 		cargar($('#codigo').val(),$('#arrenda').val(),'%','%');
// 	})

// 	$('#filtro2').on('submit',function(e){
// 		e.preventDefault();
// 		cargar('%','%',$('#p_ini').val(),$('#p_fin').val());
// 	})

	// function cargar(c,a,i,f)
	// {
	// 	$.getJSON('libs/acc_facturacion',{opc:'cargar',codigo:c,arrenda:a,pini:i,pfin:f}).done(function(data){
	// 		$('#facturas tbody').empty();
	// 		$.each(data.factura,function(i,dat){
	// 			$('#facturas tbody').append('<tr>'+
	// 											'<td>'+dat.Cod_inm+'</td>'+
	// 											'<td>'+dat.Id_arr+'</td>'+
	// 											'<td>'+dat.Ini_fac+'</td>'+
	// 											'<td>'+dat.Fin_fac+'</td>'+
	// 											'<td><a href="javascript:void(0)" id="'+dat.Id_fac+'" class="ver">Ver</a></td>'+
	// 											'<td><a href="javascript:void(0)" id="'+dat.Id_fac+'" class="edita">Editar</a></td>'+
	// 										'</tr>');
	// 		})
	// 	})
	// }

	$('.ver').live('click',function(){
		$('<form action="libs/facturar" method="POST" target="_blank">' +
   				 '<input type="hidden" name="cod" value="' + $(this).prop('id')+ '">' +
     		'</form>').appendTo('body').submit().remove();
	})

	$('.edita').live('click',function(){
		$('<form action="editar-factura" method="POST">' +
   				 '<input type="hidden" name="cod" value="' + $(this).prop('id')+ '">' +
     		'</form>').appendTo('body').submit();
	})

	$('#generar').on('submit',function(e){
		e.preventDefault();
		$('<form action="libs/acc_facturacion" method="POST" target="_blank">' +
				'<input type="hidden" name="opc" value="generar">' +
   				 '<input type="hidden" name="inicial" value="' + $('input[name=inicial]').val()+ '">' +
   				 '<input type="hidden" name="final" value="' + $('input[name=final]').val()+ '">' +
   		'</form>').submit();
   		// cargar('%','%','%','%');
	})

})