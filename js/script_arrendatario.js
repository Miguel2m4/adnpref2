$(document).ready(function(){
cargar('%','%');

	$('#filtro').on('submit',function(e){
		e.preventDefault();
		cargar($('#p_ini').val(),$('#p_fin').val());
	})

	function cargar(i,f)
	{
		$.getJSON('libs/acc_arrendatario',{opc:'facturar',pini:i,pfin:f}).done(function(data){
			$('#facturas tbody').empty();
			cont = data.factura.length;
			$.each(data.factura,function(i,dat){
				$('#facturas tbody').append('<tr>'+
												'<td>'+cont+'</td>'+
												'<td>'+dat.Id_arr+'</td>'+
												'<td>'+dat.Ini_fac+'</td>'+
												'<td>'+dat.Fin_fac+'</td>'+
												'<td><a href="javascript:void(0)" class="ver" id="'+dat.Id_fac+'">Descargar</a></td>'+
											'</tr>');
				cont--;
			})
		})
	}

	$('.ver').live('click',function(){
		$('<form action="libs/facturar" method="POST" target="_blank" >' +
   				 '<input type="hidden" name="cod" value="' + $(this).prop('id')+ '">' +
     		'</form>').appendTo('body').submit().remove();
	})

})