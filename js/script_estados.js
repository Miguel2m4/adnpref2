$(document).ready(function(){
cargar('%','%');

	$('#filtro').on('submit',function(e){
		e.preventDefault();
		cargar($('#p_ini').val(),$('#p_fin').val());
	})

	function cargar(i,f)
	{
		$.getJSON('libs/acc_estados',{opc:'cargar_pr',pini:i,pfin:f}).done(function(data){
			$('#estados tbody').empty();
			$.each(data.estados,function(i,dat){
				$('#estados tbody').append('<tr>'+
												'<td>'+dat.Cod_inm+'</td>'+
												'<td>'+dat.Id_prop+'</td>'+
												'<td>'+dat.Ini_est+'</td>'+
												'<td>'+dat.Fin_est+'</td>'+
												'<td><a href="'+dat.Arc_est.replace('.','')+'" target="_blank" >Descargar</a></td>'+
											'</tr>');
			})
		})
	}

})