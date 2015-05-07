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
<h2>Editar Comprobante de Pago</h2>
<?php
	include("libs/conexion.php");

	@$codigo = $_POST['cod'];
	$bus = mysql_query("SELECT * FROM facturacion WHERE Id_fac='$codigo' ");
	$res = mysql_fetch_object($bus);
	$arr = $res->Id_arr;
	$bus2 = mysql_query("SELECT * FROM arrendatarios WHERE Id_arr='$arr' ");
	$res2 = mysql_fetch_object($bus2);
?>
<div id="crear1">
	<form id="editar">
		<p>Información del Arrendatario</p>
		<input type="hidden" name="codigo" value="<?php echo$codigo; ?>">
		<input type="text" placeholder="Codigo" disabled="" value="<?php echo$res->Cod_inm; ?>">
		<input type="text" placeholder="Nombre" disabled="" value="<?php echo$res2->Nom_arr.' '.$res2->Apel_arr; ?>">
		<input type="text" placeholder="Inmueble" id="codinm" disabled="" value="<?php echo$res->Barr_inm; ?>">
</div>

<div id="crear2">
		<p>Información del Pago</p>
		<input type="number" placeholder="Valor del inmueble" required="" name="valor" value="<?php echo$res->Val_inm; ?>">
		<input type="text" placeholder="Recargo arriendo" name="rec_arr"  required="" value="<?php echo$res->Recrg_arr; ?>">
		<input type="text" placeholder="Recargo admon" name="rec_ad" required="" value="<?php echo$res->Mora_arr; ?>">
		<p>Periodo Inicial</p>
		<input type="date" name="f_inicio" required="" value="<?php echo$res->Ini_fac; ?>">
		<br>
		<p>Periodo Final</p>
		<input type="date" name="f_fin" required="" value="<?php echo$res->Fin_fac; ?>">
		<br>
		<input type="submit" value="Guardar">
	</form>
</div>


</section>

</body>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/script-menu.js"></script>
<script type="text/javascript" src="js/script_editfac.js"></script>

</html>