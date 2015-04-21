$(document).ready(function(){

	$('select[name=de]').val(50);
	ciudades()

	$('select[name=de]').on('change',function(){
		ciudades();
		$('select[name=ba] option').eq(0).nextAll().remove();
	})

	if(getUrlParameter('de')==undefined || getUrlParameter('de')=='%25' || getUrlParameter('de')=='%')
		$('select[name=de]').val('50');
	else
		$('select[name=de]').val(getUrlParameter('de'));
	$('select[name=ti]').val(getUrlParameter('ti'));
	$('select[name=ha]').val(getUrlParameter('ha'));
	$('select[name=ban]').val(getUrlParameter('ban'));

	function ciudades()
	{
		$.getJSON('libs/acc_inmueble',{opc:'ciudad',departamento:$('select[name=de]').val()}).done(function(data){
			$('select[name=ci] option').eq(0).nextAll().remove();
			$.each(data.Ciudades,function(i,dat){
				$('select[name=ci]').append('<option value="'+dat.id+'">'+dat.nombre+'</option>');
			})
			$('select[name=ci]').val(getUrlParameter('ci'));
			$('select[name=ci]').change();
		})
	}

	function getUrlParameter(sParam)
	{
	    var sPageURL = window.location.search.substring(1);
	    var sURLVariables = sPageURL.split('&');
	    for (var i = 0; i < sURLVariables.length; i++)
	    {
	        var sParameterName = sURLVariables[i].split('=');
	        if (sParameterName[0] == sParam)
	        {
	            return sParameterName[1];
	        }
	    }
	}

	$('select[name=ci]').on('change',function(){
		$.getJSON('libs/acc_inmueble',{opc:'barrio',ciudad:$(this).val()}).done(function(data){
			$('select[name=bar] option').eq(0).nextAll().remove();
			$.each(data.Barrios,function(i,dat){
				$('select[name=bar]').append('<option>'+dat.barrio+'</option>');
			})
			$('select[name=bar]').val(getUrlParameter('bar'));
		})
	})

	$('.detalle').live('click',function(){
		$('<form action="inmuebles-detalle" method="POST" >' +
   			'<input type="hidden" name="codigo" value="' + $(this).prop('id')+ '">' +
   		'</form>').appendTo('body').submit();
	})

	$('#reset').on('click',function(){
		$('<form action="inmuebles-arriendo" method="GET">' +
   			'<input type="hidden" name="de" value="%">' +
   			'<input type="hidden" name="ci" value="%">' +
   			'<input type="hidden" name="bar" value="%">' +
   			'<input type="hidden" name="ti" value="%">' +
   			'<input type="hidden" name="ha" value="%">' +
   			'<input type="hidden" name="ban" value="%">' +
   		'</form>').appendTo('body').submit();
	})

	$('#reset2').on('click',function(){
		$('<form action="inmuebles-venta" method="GET">' +
   			'<input type="hidden" name="de" value="%">' +
   			'<input type="hidden" name="ci" value="%">' +
   			'<input type="hidden" name="bar" value="%">' +
   			'<input type="hidden" name="ti" value="%">' +
   			'<input type="hidden" name="ha" value="%">' +
   			'<input type="hidden" name="ban" value="%">' +
   		'</form>').appendTo('body').submit();
	})

})