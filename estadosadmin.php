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
	<div id="top-lado2"><a href="#">correo@inmobiliariaandapref.com</a></div>
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
<section id="listart">
<h2>Estados de Cuenta</h2>
<div id="busq1">
<div id="busquedas">
	<form id="filtro1">
		<label>Busquedas por: </label><input type="number" placeholder="Codigo" id="codigo"> <input type="number" placeholder="Id Propietario" id="propiet">
		<input type="submit" value="Buscar">
	</form>
	<br>
	<form id="filtro2">
		<label>Busquedas por:
		<input type="date" id="p_ini"> <input type="date" id="p_fin">
		<input type="submit" value="Buscar">
	</form>
</div>
</div>
<div id="busq2">
	<h2>Importar Estados</h2>
	<form id="importa">
		<p>Seleccione archivos</p>
		<input type="file" multiple><br><br>
		<label>Periodo:
		<input type="date" name="inicial" required> <input type="date" name="final" required>
		<input type="submit" value="Importar">
	</form>
</div>
<table id="estados">
	<thead>
		<tr>
			<td>Codigo</td>
			<td>Id Propietario</td>
			<td>Periodo Inicial</td>
			<td>Periodo Final</td>
			<td>Estado</td>
			<td>Editar</td>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

</section>

</body>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/script-menu.js"></script>
<script type="text/javascript" src="js/script_estadoadmin.js"></script>
</html>