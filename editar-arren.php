<?php
session_start();
if (!isset($_SESSION['tipousu'])){
  	header('Location: admin');
}
else
	if($_SESSION['tipousu']!='admin')
		header('Location: admin');
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
		<a href="adminpref">Crear Inmueble</a>
	</li>
	<li>
		<a href="crear-proveedor">Crear Proveedor</a>
	</li>
	<li>
		<a href="#">Editar</a>
		<ul>
			<li>
				<a href="editar-provee">Editar Proveedor</a>
			</li>
			<li>
				<a href="editar-inmueble">Editar Inmueble</a>
			</li>
			<li>
				<a href="editar-arren">Editar Arrendatario</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="ligar">Ligar</a>
	</li>
	<li>
		<a href="listar">Listar</a>
	</li>
	<li>
		<a href="estadosadmin">Est de Cuenta</a>
	</li>
	<li>
		<a href="facturacion">Facturación</a>
	</li>
	<li>
		<a href="libs/logout">Cerrar Sesión</a>
	</li>


</ul>
</div>
</nav>
<section id="listart2">
<h2>Editar Arrendatario</h2>
<div id="crear1">
	<form id="editar">
		<p>Seleccione codigo del inmueble</p>
		<input type="number" placeholder="Codigo" id="inm" name="codigo" required="">
		<input type="number" placeholder="ID de Propietario" id="id_prop" required="" disabled="">
		<input type="text" placeholder="Propietario" required="" id="propietario" disabled="">
		<input type="number" placeholder="Valor del Inmueble" id="valor" disabled="" >
		<input type="text" placeholder="Recargo" name="recargo" id="recargo" required="">
		<input type="number" placeholder="Valor de Administracion" name="admintr" id="admintr" >
		<input type="number" placeholder="Mora Administracion" name="moradmintr" id="moradmintr" >
</div>

<div id="crear2">
		<p>Información del Arrendatario</p>
		<input type="number" placeholder="Codigo" required="" id="cod_inm" disabled="">
		<input type="number" placeholder="ID del Arrendatario" name="id_arren" id="idarr" disabled="">
		<input type="text" placeholder="Nombre" name="nombre" id="nom" disabled="">
		<input type="text" placeholder="Apellido" name="apellido" id="apel" disabled="">
		<input type="email" placeholder="Correo Electronico" id="email" name="email">
		<input type="text" placeholder="Telefono" name="telefono" id="tel" required="">
		<input type="text" placeholder="Movil" name="movil" id="mov" required="">
		<p>Fecha de Inicio</p>
		<input type="date" placeholder="" name="f_inicio" id="ini" disabled="">
		<br>
		<input type="submit" value="Guardar">
	</form>
</div>


</section>

</body>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/script-menu.js"></script>
<script type="text/javascript" src="js/script_editarr.js"></script>
</html>