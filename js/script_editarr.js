$(document).ready(function(){
carga = 0;

	$('#inm').on('blur',function(){
		inmueble = $(this).val();
		if(inmueble!='' && inmueble!=carga)
		{
			$.getJSON('libs/acc_arrendatario',{opc:'cargar',codigo:inmueble}).done(function(data){
				if(data.Inmueble=='error1')
				{
					$('input').not('#inm,input[type=submit]').val('');
					$('#fondo').remove();
					$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
					$('#fondo').append("<div class='rp' style='display: none; text-align: center' id='rp'><span>Error! - El Inmueble no esta ligado</span></div>");
					setTimeout(function() {
			        	$('#fondo').fadeIn('fast',function(){
			            $('#rp').animate({'top':'350px'},50).fadeIn();
			         	});
			        }, 400);
			        setTimeout(function() {
			            $("#rp").fadeOut();
			            $('#fondo').fadeOut('fast');
			        }, 2500);
			        $('input[type=submit]').attr('disabled',true);
			        $('#inm').css('background','rgba(250, 128, 114, 0.21)');
			        carga ='/&·(·';
			}
				else if(data.Inmueble=='error2')
					{
						$('input').not('#inm,input[type=submit]').val('');
						$('#fondo').remove();
						$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
						$('#fondo').append("<div class='rp' style='display: none; text-align: center' id='rp'><span>Error! - El Inmueble no existe</span></div>");
						setTimeout(function() {
				        	$('#fondo').fadeIn('fast',function(){
				            $('#rp').animate({'top':'350px'},50).fadeIn();
				         	});
				        }, 400);
				        setTimeout(function() {
				            $("#rp").fadeOut();
				            $('#fondo').fadeOut('fast');
				        }, 2500);
				        $('input[type=submit]').attr('disabled',true);
				        $('#inm').css('background','rgba(250, 128, 114, 0.21)');
				        carga ='/&·(·';
					}
				else
				{
					$.each(data.Inmueble,function(i,dat){
						if(dat.Id_prop!=undefined)
						{
							$('#id_prop').val(dat.Id_prop);
							$('#propietario').val(dat.Nom_prop+' '+dat.Apel_prop);
							$('#valor').val(dat.Val_inm);
						}
						else
						{
							$('#recargo').val(dat.Recrg_arr);
							$('#admintr').val(dat.Admin_arr);
							$('#moradmintr').val(dat.Mora_arr);
							$('#cod_inm').val(inmueble);
							$('#idarr').val(dat.Id_arr);
							$('#nom').val(dat.Nom_arr);
							$('#apel').val(dat.Apel_arr);
							$('#email').val(dat.Email_arr);
							$('#tel').val(dat.Tel_arr);
							$('#mov').val(dat.Mov_arr);
							$('#ini').val(dat.Fecin_arr);
						}
					})

					$('input[type=submit]').removeAttr('disabled');
					$('#inm').removeAttr('style');
					carga = inmueble;
				}
			})
		}
	})

	$('#editar').on('submit',function(e){
		e.preventDefault();
		$('#fondo').remove();
		$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
		$('#fondo').append("<div style='position: absolute;top: 50%;left: 50%;'><img src='images/esperar.gif'></div>");
		setTimeout(function() {
        	$('#fondo').fadeIn('fast',function(){
            $('#rp').fadeIn();
         	});
        }, 400);

		data = $('#editar').serializeArray();
		data.push({name:'opc',value:'editar'});

		$.post('libs/acc_arrendatario',data).done(function(data){
			if(data== 'correcto')
			{
				$('#fondo').remove();
				$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
				$('#fondo').append("<div class='rp' style='display: none; text-align: center' id='rp'><span>Cambios Realizados!</span></div>");
				setTimeout(function() {
		        	$('#fondo').fadeIn('fast',function(){
		            $('#rp').animate({'top':'350px'},50).fadeIn();
		         	});
		        }, 400);
		        setTimeout(function() {
		            $("#rp").fadeOut();
		            $('#fondo').fadeOut('fast');
		        }, 3000);
		        $('input').not('input[type=submit]').val('');
			}
			 else
		    	if(data == 'error')
		    	{
		    		$('#fondo').remove();
					$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
					$('#fondo').append("<div class='rp' style='display: none; text-align: center' id='rp'><span>Error!</span></div>");
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
		});

	})



})