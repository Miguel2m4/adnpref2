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
<section id="crearpref">
<div id="crear1">
	<h2>Crear Inmueble</h2>
	<form id="nuevo_inm">
		<input type="number" placeholder="Codigo" name="codigo" required>
		<input type="number" placeholder="Id Propietario" name="id_prop" required>
		<select name="tipo">
			<option value="">Tipo de Inmubele</option>
			<?php
				include("libs/conexion.php");
				$sel = mysql_query("SELECT * FROM tipo_inmueble");
				while($resp=mysql_fetch_object($sel))
				{
					echo'<option>'.$resp->Tipo_inm.'</option>';
				}
			?>
		</select>
		<input type="number" placeholder="Mt2" name="mt2" required>
		<input type="number" placeholder="Habitaciones" name="habitaciones" required>
		<input type="number" placeholder="Baños" name="banos" required>
		<select name="parqueadero">
			<option value="">Parqueadero</option>
			<option>SI</option>
			<option>NO</option>
		</select>
		<select name="servicio">
			<option value="">Servicio</option>
			<option>Arriendo</option>
			<option>Venta</option>
		</select>
		<input type="number" placeholder="Valor" name="valor" required>
		<select name="departamento" required>
			<option value="">Departamento</option>
			<?php
				$sel = mysql_query("SELECT * FROM departamentos");
				while($resp=mysql_fetch_object($sel))
				{
					echo'<option value="'.$resp->id.'">'.$resp->nombre.'</option>';
				}
			?>
		</select>
		<select name="ciudad" required>
			<option value="">Ciudad</option>
		</select>
		<input type="text" placeholder="Barrio" name="barrio">
		<input type="text" placeholder="Direccion" name="direccion">
		<p>Ubicación de Google Maps</p>
		<input type="text" placeholder="Ubicación en X" name="ux" required>
		<input type="text" placeholder="Ubicación en Y" name="uy" required>

</div>
<div id="crear2">
	<h2>Descripciones</h2>
		<textarea placeholder="Descripción 1" name="des1" required></textarea>
		<textarea placeholder="Descripción 2" name="des2" required></textarea>
		<h2>Fotografia destacada</h2>
		<div class="subir"><input type="file" id="destaca"></div>
		<p>Fotografias maximo 10</p>
		<div class="subir"><input type="file"> <a href="javascript:void(0)"  class="agrega">Mas</a></div>
	<input type="submit" value="Guardar">
	</form>
</div>


</section>
<!-- <footer>
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
</footer> -->
</body>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
<script type="text/javascript" src="js/script-menu.js"></script>
<script type="text/javascript" src="js/script_inmueble.js"></script>
</html>