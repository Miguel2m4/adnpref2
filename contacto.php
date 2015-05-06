<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1 user-scalable=no" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >
<meta name="keywords" lang="es" content="Inmobiliarias en Villavicencio, casa, apartamentos, bodegas, lotes y oficinas">
<meta name="robots" content="All">
<meta name="description" lang="es" content="Inmobiliaria andapref,  administración de inmuebles para arriendo ventas y elaboración de avalúos.">
<title>Contáctenos | INMOBILIARIA ANDAPREF S.A.S</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/stylesheet.css" />
<link rel="stylesheet" href="css/style1.css" />
<link rel="stylesheet" href="css/responsivemobilemenu.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/style-menu.css">
<link rel="stylesheet" type="text/css" href="css/msj.css">
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

function Localizar()
{

        navigator.geolocation.getCurrentPosition(mapa,error);
}

function mapa(pos)
{
	var contenedor =document.getElementById("mapa2");
	var latitud = '4.133117';
	var Longitud = '-73.634750';
	var centro = new google.maps.LatLng(latitud,Longitud);
	var propiedades = 	{

	center: centro,
	draggable:true,
	KeyBoardShortcuts:true,
	mapTypeControl:true,
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	navigationControl: true,
	scrollWheel:false,
	streetViewControl:false,
	zoom:18,

	};

	var map = new google.maps.Map(contenedor,propiedades);
	var mkr = new google.maps.Marker({
		draggable:false,
		icon: 'images/gps_pos.png',
		position: centro,
		map: map,
		title: 'Usted esta Aqui :D',
	});


}

function error(errorC)
{

	if(errorC.code ==0 )
		alert("Error desconocido");
	else if (errorC.code ==1 )
		alert("No me dejaste ubicar");
	else if (errorC.code ==2 )
		alert("Posicion no disponible");
	else if (errorC.code ==3 )
		alert("me rendi :(");

}
</script>
</head>
<header>
	<div id="top-lado1"><a href="/"><img src="images/logo.png"></a></div>
	<div id="top-lado2"><a href="#">contacto@inmobiliariaandapref.com</a></div>
</header>
<body onload="Localizar()">
<nav>
	<div class="container">
<a class="toggleMenu" href="#">Menu</a>
<ul class="nav">
	<li  class="test">
		<a href="/">Inicio</a>
	</li>
	<li>
		<a href="nuestra-empresa">Nosotros</a>

	</li>
	<li>
		<a href="#">Inmuebles</a>
		<ul>
			<li>
				<a href="inmuebles-arriendo">Arriendo</a>
			</li>
			<li>
				<a href="inmuebles-venta">Venta</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="servicios">Servicios</a>
	</li>
	<li>
		<a href="#">Propietarios</a>
		<ul>
			<li>
				<a href="propieta" target="blank">Estados de Cuenta</a>
			</li>
			<li>
				<a href="requisistos-inmueble-arriendo">Requisitos para dejar un inmueble en Arriendo</a>
			</li>
			<li>
				<a href="requisistos-inmueble-venta">Requisitos para dejar un inmueble en Venta</a>
			</li>

		</ul>
	</li>
	<li>
		<a href="#">Arrendatarios</a>
		<ul>
			<li>
				<a href="requisistos-arrendar-inmueble">Requisitos para tomar un inmueble en Arriendo</a>
			</li>
			<li>
				<a href="arrenda" target="blank">Comprobante de pago</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="contacto">Contáctenos</a>
	</li>


</ul>
</div>
</nav>
<section class="contenido2">
<div id="titulito">
<section class="contenido3">

	<div id="deta-lado-izq">
		<h2>Contáctanos</h2>
			<div class="contacto">
				<form id="contac">
					<input type="text" placeholder="Nombre*" name="nombre" required>
					<input type="email" placeholder="Email*" name="email" required>
					<input type="number" placeholder="Telefono" name="telefono">
					<input type="text" placeholder="Asunto" name="asunto">
					<textarea placeholder="Escribe tu mensaje*" required name="mensaje"></textarea>
					<input type="submit" value="Enviar Mensaje">
				</form>
			</div>
	</div>

<div id="deta-lado-der">
	<div id="busquedac">
		<h2>Busqueda</h2>
		<div id="buqueda2">
		<form method="post" action="inmuebles-arriendo">
			<input type="number" placeholder="Codigo" name="codigo" required>
			<input type="submit" value="Buscar">
		</form>
		<form method="get" action="inmuebles-arriendo">
			<?php
				include('libs/conexion.php');
				echo'<select  name="de">
						<option value="">Departamento</option>';
				$sel = mysql_query("SELECT * FROM departamentos");
				while($resp=mysql_fetch_object($sel))
				{
					echo'<option value="'.$resp->id.'">'.$resp->nombre.'</option>';
				}
				echo'</select>';
				echo'<select  name="ci">
						<option value="">Ciudad</option>
				</select>';
				echo'<select name="bar">
						<option value="">Barrio</option>
				</select>';

				echo'<select  name="ti">
						<option value="">Tipo de Inmueble</option>';
				$sel = mysql_query("SELECT * FROM tipo_inmueble");
				while($resp=mysql_fetch_object($sel))
				{
					echo'<option>'.$resp->Tipo_inm.'</option>';
				}
				echo'</select>';

				echo'<select  name="ha">
						<option value="">Habitaciones</option>';
				$sel = mysql_query("SELECT * FROM inmuebles GROUP BY Habit_inm");
				while($resp=mysql_fetch_object($sel))
				{
					echo'<option>'.$resp->Habit_inm.'</option>';
				}
				echo'</select>';

				echo'<select  name="ban">
						<option value="">Baños</option>';
				$sel = mysql_query("SELECT * FROM inmuebles GROUP BY Ban_inm");
				while($resp=mysql_fetch_object($sel))
				{
					echo'<option>'.$resp->Ban_inm.'</option>';
				}
				echo'</select>';
			?>
			<input type="submit" value="Buscar">
		</form>
		</div>
	</div>
</div>
</section>
</div>
</section>
<div id="mapa2"></div>
<footer>
<div id="foot">
<div class="footersec">
	<h2>Información de contacto</h2>
	<p><strong>Email:</strong> contacto@inmobiliariaandapref.com</p>
	<p><strong>Telefono:</strong> (8) 671 60 46 - 668 44 11</p>
	<p><strong>Celular:</strong> +57 311 232 7508 - 311 207 20 22</p>
	<p><strong>Dirección:</strong> Calle 15 No 371-53 Ofc 102 Bloque 7 Esperanza 8va. Etapa</p>

	<ul>
		<li><span class="red"><img src="images/wat.png" target="blank">+57 311 232 7508</span></li>
		<li><span class="red"><img src="images/face.png"><a href="https://www.facebook.com/inmobiliariaconstruciones.andaprefltda" target="blank">Facebook</a></span></li>
		<li><span class="red"><img src="images/tui.png"><a href="" target="blank">Twitter</a></li>
	</ul>
</div>

<div class="footersec">
	<h2>Deseas recibir mas Información</h2>
	<p>Ingresa tu correo para recibir mas informacion</p><p>acerca de novedades en nuestros productos.</p>
	<form>
		<input type="email" placeholder="Email" required>
		<input type="submit" value="Enviar">
	</form>
</div>

<div class="footersec">
	<h2>Con el respaldo de:</h2>
	<img src="images/seguros_bolivar.png">
	<img src="images/libertador.png">

</div>
	<hr class="divi1">
	<div id="copyright">
            <p>Copyright © Inmobiliaria Andapref SAS, 2015.Todos los derechos reservados diseñado por <a href="http://inngeniate.com/"> Inngeniate.com</a></p>
            <div id="logo">
                <img src="images/logoinn.png">
            </div>
        </div>
        </div>
</footer>

</body>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/script-menu.js"></script>
<script type="text/javascript" src="js/script_listado.js"></script>
<script type="text/javascript">
	$('#contac').on('submit',function(e){
    	e.preventDefault();
    	$('#fondo').remove();
		$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
		$('#fondo').append("<div style='position: absolute;top: 50%;left: 50%;'><img src='images/esperar.gif'></div>");
		setTimeout(function() {
        	$('#fondo').fadeIn('fast',function(){
            $('#rp').fadeIn();
         	});
        }, 400);
        data = $(this).serializeArray();
       	data.push({name:'opc',value:'contacto'});
        $.post('libs/correo.php',data).done(function(data){
        	if(data=='correcto')
        	{
        		$('#fondo').remove();
				$('body').append("<div class='fondo' id='fondo' style='display:none;'></div>");
				$('#fondo').append("<div class='rp' style='display: none; text-align: center' id='rp'><span>Mensaje enviado!</span></div>");
				setTimeout(function() {
		        	$('#fondo').fadeIn('fast',function(){
		            $('#rp').animate({'top':'350px'},50).fadeIn();
		         	});
		        }, 400);
		        setTimeout(function() {
		            $("#rp").fadeOut();
		            $('#fondo').fadeOut('fast');
		        }, 2500);
		        $('input,textarea').not('input[type=submit]').val('');
        	}
        })
    })
</script>
</html>