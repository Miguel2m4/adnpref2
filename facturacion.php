<?php
session_start();
if (!isset($_SESSION['tipousu'])){
  	header('Location: admin');
}
else
	if($_SESSION['tipousu']!='admin')
		header('Location: admin');
?>

<?php
	include('libs/conexion.php');
	@$cod = $_REQUEST['cod'];
	@$idarr = $_REQUEST['idarr'];
	@$pini = $_REQUEST['pini'];
	@$pfin = $_REQUEST['pfin'];
	if($cod=='')
		$cod='%';
	if($idarr=='')
		$idarr='%';
	if($pini=='')
		$pini='%';
	if($pfin=='')
		$pfin='%';

	$bus = mysql_query("SELECT COUNT(Cod_inm) FROM facturacion WHERE Cod_inm like '$cod' AND Id_arr like '$idarr' AND Ini_fac like '$pini' AND Fin_fac like '$pfin' ");
	$row = mysql_fetch_row($bus);

	  // total de resultados
	  $rows = $row[0];
	  // numero de resultados mostrados por pagina
	  $page_rows = 15;
	  // numero de la ultima pagina
	  $last = ceil($rows/$page_rows);
	  // hace que $last no pueda ser menos de 1
	  if($last < 1){
	    $last = 1;
	  }

	  $pagenum = 1;
	// obtiene la pagina de la URl si esta presente si no es igual a 1
	if(isset($_GET['pn'])){
	  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
	//  asegura que la pagina no sea menor de 1 or mas que la ultima pagina
	if ($pagenum < 1) {
	    $pagenum = 1;
	} else if ($pagenum > $last) {
	    $pagenum = $last;
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

	if(!isset($codigo))
		$codigo='%';
	$bus = mysql_query("SELECT * FROM facturacion WHERE Cod_inm like '$cod' AND Id_arr like '$idarr' AND Ini_fac like '$pini' AND Fin_fac like '$pfin' ORDER BY Id_fac desc $limit");
	$paginationCtrls = '';
	if($last != 1){

	  if ($pagenum > 1) {
	        $previous = $pagenum - 1;
	    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'&cod='.$cod.'&idarr='.$idarr.'&pini='.$pini.'&pfin='.$pfin.'">Anterior</a> &nbsp; &nbsp; ';

	    for($i = $pagenum-4; $i < $pagenum; $i++){
	      if($i > 0){
	            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&cod='.$cod.'&idarr='.$idarr.'&pini='.$pini.'&pfin='.$pfin.'">'.$i.'</a> &nbsp; ';
	     	 }
	      }
	    }

	  $paginationCtrls .= ''.$pagenum.' &nbsp; ';

	  for($i = $pagenum+1; $i <= $last; $i++){
	    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&cod='.$cod.'&idarr='.$idarr.'&pini='.$pini.'&pfin='.$pfin.'">'.$i.'</a> &nbsp; ';
	    if($i >= $pagenum+4){
	      break;
	    }
	  }

	    if ($pagenum != $last) {
	        $next = $pagenum + 1;
	        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'&cod='.$cod.'&idarr='.$idarr.'&pini='.$pini.'&pfin='.$pfin.'">Siguiente</a> ';
	    }
	}
	$list = '';
	while($row = mysql_fetch_array($bus, MYSQLI_ASSOC)){
		 $list.='<tr>
		 			<td>'.$row['Cod_inm'].'</td>
		 			<td>'.$row['Id_arr'].'</td>
		 			<td>'.$row['Ini_fac'].'</td>
		 			<td>'.$row['Fin_fac'].'</td>
		 			<td><a href="javascript:void(0)" id="'.$row['Id_fac'].'" class="ver">Ver</a></td>
		 			<td><a href="javascript:void(0)" id="'.$row['Id_fac'].'" class="edita">Editar</a></td>
		 		</tr>';
	}
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
<h2>Facturación</h2>
<div id="busq1">
<div id="busquedas">
	<form id="filtro1" method="get" action="facturacion">
		<label>Busquedas por: </label><input type="number" placeholder="Codigo" name="cod" id="codigo" > <input type="number" placeholder="Id Arrendatario" id="arrenda" name="idarr">
		<input type="submit" value="Buscar">
	</form>
	<br>
	<form id="filtro2" method="get" action="facturacion">
		<label>Busquedas por:
		<input type="date" id="p_ini" name="pini"> <input type="date" id="p_fin" name="pfin">
		<input type="submit" value="Buscar">
	</form>
</div>
</div>
<div id="busq2">
<h2>Generar facturación</h2>
<form id="generar">
		<!-- <p>Seleccione carpeta</p> -->
		<label>Periodo:
		<input type="date" name="inicial" required> <input type="date" name="final" required>
		<input type="submit" value="Generar">
</form>

</div>
<table id="facturas">
	<thead>
		<tr>
			<td>Codigo</td>
			<td>Id Arrendatario</td>
			<td>Periodo Inicial</td>
			<td>Periodo Final</td>
			<td>Factura</td>
			<td>Editar</td>
		</tr>
	</thead>
	<tbody>
		<?php echo $list; ?>
	</tbody>
</table>
<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
</section>

</body>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/script-menu.js"></script>
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
<script type="text/javascript" src="js/script_facturacion.js"></script>
</html>