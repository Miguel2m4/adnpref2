<?php
session_start();
if (!isset($_SESSION['tipousu'])){
  	header('Location: propieta');
}
else
	if($_SESSION['tipousu']!='propietario')
		header('Location: propieta');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1 user-scalable=no" />
<title>Inmobiliaria Andapref</title>
<link rel="stylesheet" href="css/normalize.css" />
<link rel="stylesheet" href="css/stylesheet.css" />
<link rel="stylesheet" href="css/style1.css" />
<link rel="stylesheet" type="text/css" href="css/style-menu.css">
<link rel="stylesheet" type="text/css" href="css/msj.css">
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
</head>
<body>
<header>
	<div id="top-lado1"><a href="#"><img src="images/logo.png"></a></div>
	<div id="top-lado2"><a href="#">contacto@inmobiliariaandapref.com</a></div>
</header>
<nav>
	<div class="container">
<a class="toggleMenu" href="#">Menu</a>
<ul class="nav">
	<li  class="test">
		<a href="estados">Estados de Cuenta</a>
	</li>
	<li>
		<a href="pqr">PQR</a>
	</li>
	<li>
		<a href="libs/logout">Cerrar Sesión</a>
	</li>
</ul>
</div>
</nav>
<section class="contenido3">

	<div id="deta-lado-izq">
		<div id="solicitudes">
			<h2>Solicitudes</h2>
			<div class="contacto">
				<form id="solicitud">
					<input type="number" placeholder="Telefono" name="telefono" required>
					<input type="text" placeholder="Asunto" name="asunto" required>
					<textarea placeholder="Escribe tu mensaje*" required name="mensaje"></textarea>
					<input type="file" id="archivo"/><br><br>
					<input type="hidden" id="tipo" value="pqr"/>
					<input type="submit" value="Enviar Solicitud">
				</form>
			</div>
		</div>
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
<script type="text/javascript" src="js/script_correo.js"></script>
</html>