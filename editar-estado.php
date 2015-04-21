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
<section id="listart2">
<h2>Editar Estado</h2>
<?php
	include("libs/conexion.php");

	@$codigo = $_POST['cod'];
	$bus = mysql_query("SELECT * FROM estados WHERE Id_est='$codigo' ");
	$res = mysql_fetch_object($bus);
	$inm = $res->Cod_inm;
	$bus2 = mysql_query("SELECT * FROM inmuebles WHERE Cod_inm='$inm' ");
	$res2 = mysql_fetch_object($bus2);
?>
<div id="crear1">
	<form id="editar">
		<p>Información del Estado</p>
		<input type="hidden" name="codigo" value="<?php echo$codigo; ?>">
		<input type="text" disabled=""  value="<?php echo$inm; ?>">
		<input type="text" disabled="" value="<?php echo$res2->Id_prop; ?>">
		<input type="text" disabled="" value="<?php echo$res->Ini_est; ?>">
		<input type="text" disabled="" value="<?php echo$res->Fin_est; ?>">
</div>

<div id="crear2">
		<p>Importar estado:</p>
		<input type="file" required="">
		<br><br>
		<input type="submit" value="Guardar">
	</form>
</div>

</section>

</body>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/script-menu.js"></script>
<script type="text/javascript" src="js/script_editest.js"></script>

</html>