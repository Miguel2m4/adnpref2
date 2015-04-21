<?php
	include('libs/conexion.php');
	@$codigo = $_POST['codigo'];
	if(!isset($codigo))
		 header('Location: inmuebles-arriendo');
	else
	{
		$sel = mysql_query("SELECT * FROM inmuebles WHERE Cod_inm='$codigo' ");
		$resp = mysql_fetch_object($sel);
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1 user-scalable=no" />
<meta name="keywords" lang="es" content="">
<meta name="robots" content="All">
<meta name="description" lang="es" content="">
<title>Inmuebles en Arriendo | Inmobiliaria Andapref</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/stylesheet.css" />
<link rel="stylesheet" href="css/style1.css" />
<link rel="stylesheet" href="css/responsivemobilemenu.css" type="text/css"/>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/style-menu.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
<script type="text/javascript" src ="js/html5lightbox.js"> </script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

function Localizar()
{

        navigator.geolocation.getCurrentPosition(mapa,error);
}


function mapa(pos)
{
	var contenedor =document.getElementById("mapa");
	var latitud =	<?php echo$resp->X_inm; ?>;
	var Longitud = <?php echo$resp->Y_inm; ?>;
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
	zoom:15,

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
	<div id="top-lado1"><a href="#"><img src="images/logo.png"></a></div>
	<div id="top-lado2"><a href="#">correo@inmobiliariaandapref.com</a></div>
</header>
<body onload="Localizar()">
<nav>
	<div class="container">
<a class="toggleMenu" href="#">Menu</a>
<ul class="nav">
	<li  class="test">
		<a href="index">Inicio</a>
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
				<a href="arrenda" target="blank">Consulte su Factura</a>
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
<div class="imagencarac" <?php echo'style="background-image:url('.substr($resp->Img_inm,1).')" '; ?>>

</div>
<section class="contenido3">

	<div id="deta-lado-izq">
	<div id="badera"><h4><?php echo$resp->Serv_inm; ?></h4></div>
		<h2>Valor: $<?php echo number_format($resp->Val_inm,0,'','.'); ?></h2>
				<div class="det-inmueble">
					<ul>
						<li><span class="icon-plano"></span><strong>Metros:</strong> <?php echo$resp->Mt2_inm; ?> m2</li>
						<li><span class="icon-cuarto"></span><strong>Habitaciones:</strong><?php echo$resp->Habit_inm; ?></li>
						<li><span class="icon-bano"></span><strong>Baños:</strong> <?php echo$resp->Ban_inm; ?></li>
						<li><span class="icon-parqueo"></span><strong>Parqueadero:</strong> <?php echo$resp->Parq_inm; ?></li>
					</ul>
				</div>
				<hr class="divi1">
				<h3>Barrio <?php echo$resp->Barr_inm; ?></h3>

				<div class="descripcion-detalle">
					<p><?php echo$resp->Desc2_inm; ?></p>
				</div>
				<div class="gale">
					<?php
						$sel2 = mysql_query("SELECT * FROM galeria WHERE Cod_inm='$codigo' ");
						$i=1;$imgc='';
						while($resp2=mysql_fetch_object($sel2))
						{
							if($i<6)
							{
								echo'<a href="'.substr($resp2->Arc_gal,1).'" class="foto'.$i.' html5lightbox" data-group="galeria1"><img src="'.substr($resp2->Arc_gal,1).'"></a>';
								$i++;
							}
							else
							{
								$j=1;
								$imgc.='<a href="'.substr($resp2->Arc_gal,1).'" class="foto'.$j.' html5lightbox" data-group="galeria1"><img src="'.substr($resp2->Arc_gal,1).'"></a>';
								$j++;
							}
						}
					?>
					<!-- <a href="" class="foto1"><img src="images/galeria/fotoc1.jpg"></a>
					<a href="" class="foto2"><img src="images/galeria/fotoc2.jpg"></a>
					<a href="" class="foto3"><img src="images/galeria/fotoc3.jpg"></a>
					<a href="" class="foto4"><img src="images/galeria/fotoc4.jpg"></a>
					<a href="" class="foto5"><img src="images/galeria/fotoc5.jpg"></a> -->
					<div class="oculto">
						<?php echo$imgc; ?>
					</div>
				</div>
				<hr class="divi1">

				<div id="direccion">
					<h3><span class="icon-location"></span>Ubicación:</h3>
					<!-- <p></p> -->
				</div>
				 <div id="mapa"></div>


	</div><!-- cierra la descripcion -->

<div id="deta-lado-der">
	<div id="busquedac">
		<h2>Busqueda</h2>
		<div id="buqueda2">
		<?php
			if($resp->Serv_inm=='Arriendo')
				$busq = 'inmuebles-arriendo';
			else
				$busq = 'inmuebles-venta';
		?>
		<form method="post" action="<?php echo$busq; ?>">
			<input type="number" placeholder="Codigo" name="codigo" required>
			<input type="submit" value="Buscar">
		</form>
		<form method="get" action="<?php echo$busq; ?>">
			<?php
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


</section>
<footer>
<div id="foot">
<div class="footersec">
	<h2>Información de contacto</h2>
	<p><strong>Email:</strong> correo@inmobiliariaandapref.com</p>
	<p><strong>Telefono:</strong> (8) 671 60 46 - 668 44 11</p>
	<p><strong>Celular:</strong> +57 311 232 7508 - 311 207 20 22</p>
	<p><strong>Dirección:</strong> Calle 15 No 371-53 Ofc 102 Bloque 7 Esperanza 8va. Etapa</p>
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
<!-- <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> -->
<script type="text/javascript" src="js/script-menu.js"></script>
<script type="text/javascript" src="js/script_listado.js"></script>
</html>