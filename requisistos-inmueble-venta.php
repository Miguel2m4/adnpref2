<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1 user-scalable=no" />
<meta name="keywords" lang="es" content="Inmobiliarias en Villavicencio, casa, apartamentos, bodegas, lotes y oficinas">
<meta name="robots" content="All">
<meta name="description" lang="es" content="Inmobiliaria andapref,  administración de inmuebles para arriendo ventas y elaboración de avalúos.">
<title>Requisitos Inmueble en Venta | INMOBILIARIA ANDAPREF S.A.S</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/stylesheet.css" />
<link rel="stylesheet" href="css/style1.css" />
<link rel="stylesheet" href="css/responsivemobilemenu.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/style-menu.css">
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

</head>
<header>
	<div id="top-lado1"><a href="/"><img src="images/logo.png"></a></div>
	<div id="top-lado2"><a href="#">correo@inmobiliariaandapref.com</a></div>
</header>
<body>
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
<div id="titulito">
<section class="contenido3">

	<div id="deta-lado-izq">

		<h2>Documentos que se deben solicitar al propietario al dejarnos los inmuebles en venta</h2>

				<hr class="divi1">
				<div class="descripcion-detalle">
				<ul>
					<li>Fotocopia de la cedula de ciudadanía (diligenciar correctamente los nombres, evitando así escribir datos errados).</li>
					<li>Fotocopia del Certificado de Libertad y tradición.</li>
					<li>Fotocopia de la escritura pública (para extraer correctamente los linderos que se detallaran en el consignación venta).</li>
					<p>Importante aclarar inicialmente al propietario que la consignación por venta tiene un costo equivalente a tres salarios diarios legales vigentes, y que el contrato que se firme es de exclusividad.  Una vez nos consigne el inmueble, procederemos a cumplir con: </p>
					<li>Dos (2) publicaciones MENSUALES POR TRES MESES en el periódico local.</li>
					<li>Aviso publicitario en el inmueble  (si el propietario lo permite). </li>
					<li>Toma de fotografías y video del inmueble. </li>
					<li>Publicación en la cartelera interna de la oficina.</li>
					<li>Información telefónica sobre el inmueble. </li>
					<li>Visitas al inmueble las veces que sea necesario para los posibles clientes.</li>
					<li>Dejar especificado el modo de muestreo; ejemplo si esta arrendada, habría que llamar primero a los arrendatario.   Si estará desocupada y la inmobiliaria poseerá las llaves.</li>
				</ul>

				</div>



	</div><!-- cierra la descripcion -->

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
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/script-menu.js"></script>
<script type="text/javascript" src="js/script_listado.js"></script>
</html>