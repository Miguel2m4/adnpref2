<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1 user-scalable=no" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >
<meta name="keywords" lang="es" content="Inmobiliarias en Villavicencio, casa, apartamentos, bodegas, lotes y oficinas">
<meta name="robots" content="All">
<meta name="description" lang="es" content="Inmobiliaria andapref,  administración de inmuebles para arriendo ventas y elaboración de avalúos.">
<title>Requisitos para Arrendar un Inmueble | INMOBILIARIA ANDAPREF S.A.S</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/stylesheet.css" />
<link rel="stylesheet" href="css/style1.css" />
<link rel="stylesheet" href="css/responsivemobilemenu.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/style-menu.css">
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

</head>
<header>
	<div id="top-lado1"><a href="/"><img src="images/logo.png"></a></div>
	<div id="top-lado2"><a href="#">contacto@inmobiliariaandapref.com</a></div>
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

		<h2>Arrendatarios</h2>

				<hr class="divi1">
				 <div class="recorte"><img src="images/arriendo.png"></div>
				<p><strong>ANDAPREF S.A.S.</strong> ofrece a los futuros arrendatarios la más amplia oferta de inmuebles en las mejores condiciones para el arrendamiento de vivienda; respondiendo a todas sus necesidades de  ubicación, área y distribución.  </p>
				<p>También entendemos y conocemos las necesidades propias de comercio, por ello presentamos diversas opciones de locales, bodegas, oficinas entre otros; aptos para la instalación de su negocio y que respondan a la necesidades propias su actividad comercial.</p>
				<p>Todo el proceso de toma en arrendamiento del inmueble elegido, está acompañado con parte de nuestro equipo de agentes inmobiliarios quienes le asesoran en:</p>
				<div class="descripcion-detalle">
				<ul>
					<li>Documentación solicitada para estudio de arrendamiento.</li>
					<li>Asesoría integral en la elaboración y legalización del contrato de arrendamiento..</li>
					<li>Seguimiento a sus necesidades.</li>

				</ul>
				</div>
				<div class="descripcion-detalle">
				<h4>Requisitos para empleados</h4>
				<ul>
					<li>fotocopia de la cedula de ciudadanía.</li>
					<li>Constancia laboral, que duplique el valor del arriendo.</li>
					<li>3 últimos desprendibles de nómina.</li>
				</ul>

				<h4>Coarrendatario</h4>
				<ul>
					<li>Finca raiz (certificado de tradición libre de limitaciones:
 					patrimonio de familia y afectación familiar, embargos).</li>
					<li>Fotocopia de la cedula de ciudadania. </li>
					<li>Constancia laboral  que duplique el valor del arriendo.</li>
					<li>3 ultimos desprendibles de nomina. </li>

				</ul>
				<hr class="divi1">
				<h4>Requisitos para independientes</h4>
				<div class="recorte"><img src="images/arriendo2.png"></div>
				<ul>
					<li>Fotocopia de la cedula de ciudadania.</li>
					<li>Certificado de la camara y comercio.</li>
					<li>Nit/ rut de la empresa.</li>
					<li>3 ultimos extractos bancarios.</li>
					<li>Declaración de renta.</li>
					<li>Si no esta obligado a declarar oficio de no declarante.</li>
				</ul>

				<h4>Fiadores</h4>
				<ul>
					<li>Finca raiz (certificado de libertad y tradición libre de patrimonio de familia y afectación familiar).</li>
					<li>Fotocopia de la cedula de ciudadania. </li>
					<li>Los mismos documentos del solicitante.</li>
				</ul>
				<p>Nota: para arriendos inferiores a novecientos mil pesos mcte ($900.000) solo se debe presentar un fiador con finca raíz, a partir de (901.000) se deben presentar dos fiadores con finca raíz.</p>

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
</html>