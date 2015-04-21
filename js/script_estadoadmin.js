$(document).ready(function(){
carga_est('%','%','%','%');

	$('#filtro1').on('submit',function(e){
		e.preventDefault();
		carga_est($('#codigo').val(),$('#propiet').val(),'%','%');
	})

	$('#filtro2').on('submit',function(e){
		e.preventDefault();
		carga_est('%','%',$('#p_ini').val(),$('#p_fin').val());
	})


	function carga_est(c,a,i,f)
	{
		$.getJSON('libs/acc_estados',{opc:'cargar_t',codigo:c,propiet:a,pini:i,pfin:f}).done(function(data){
			$('#estados tbody').empty();
			$.each(data.estados,function(i,dat){
				$('#estados tbody').append('<tr>'+
											'<td>'+dat.Cod_inm+'</td>'+
											'<td>'+dat.Id_prop+'</td>'+
											'<td>'+dat.Ini_est+'</td>'+
											'<td>'+dat.Fin_est+'</td>'+
											'<td><a href="'+dat.Arc_est.replace('.','')+'" target="_blank" >Ver</a></td>'+
											'<td><a href="javascript:void(0)" id="'+dat.Id_est+'" class="edita">Editar</a></td>'+
										'</tr>');
			})
		})
	}

	$('.edita').live('click',function(){
		$('<form action="editar-estado" method="POST">' +
   				 '<input type="hidden" name="cod" value="' + $(this).prop('id')+ '">' +
     		'</form>').appendTo('body').submit();
	})

	$('#importa').on('submit',function(e){
		e.preventDefault();
		$('#fondo').remove();
		$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
		$('#fondo').append("<div style='position: absolute;top: 50%;left: 50%;'><img src='images/esperar.gif'></div>");
		setTimeout(function() {
        	$('#fondo').fadeIn('fast',function(){
            $('#rp').fadeIn();
         	});
        }, 400);
		var dataest = new FormData();
		dataest.append( 'action','libs/acc_estados');
		$.each($("input[type=file]"), function(i, obj) {
	        $.each(obj.files,function(j,file){
	            dataest.append('estado[]', file);
	        })
		});
		otradata = $('#importa').serializeArray();
		$.each(otradata,function(key,input){
    	    dataest.append(input.name,input.value);
    	});
		dataest.append('opc','crear');

		 $.ajax({
	        url:'libs/acc_estados',
	        data: dataest,
	        cache: false,
	        contentType: false,
	        processData: false,
	        type: 'POST',
	        dataType:'json',
	        success: function(data){
		        if(data.status == 'correcto')
		        {
		        	$('#fondo').remove();
					$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
					$('#fondo').append("<div class='rp' style='display: none; text-align: center' id='rp'><span>Proveedor Creado!</span></div>");
					setTimeout(function() {
			        	$('#fondo').fadeIn('fast',function(){
			            $('#rp').animate({'top':'350px'},50).fadeIn();
			         	});
			        }, 400);
			        setTimeout(function() {
			            $("#rp").fadeOut();
			            $('#fondo').fadeOut('fast');
			        }, 2500);
			        $('input').not('input[type=submit]').val('');
			        carga_est('%','%','%','%');
			    }
			    else
			    	if(data.status == 'error')
			    	{
			    		$('#fondo').remove();
						$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
						$('#fondo').append("<div class='rp' style='display: none; text-align: center' id='rp'><span>Error!/span></div>");
						setTimeout(function() {
				        	$('#fondo').fadeIn('fast',function(){
				            $('#rp').animate({'top':'350px'},50).fadeIn();
				         	});
				        }, 400);
				        setTimeout(function() {
				            $("#rp").fadeOut();
				            $('#fondo').fadeOut('fast');
				        }, 2500);
			    	}
	  		}
	    });
	})


});