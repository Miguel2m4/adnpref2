<?php
session_start();
if (!isset($_SESSION['tipousu'])){
  	header('Location: admin');
}
else
	if($_SESSION['tipousu']!='admin')
		header('Location: admin');

///////////////////////
include("libs/conexion.php");
  // @$precio = $_GET['pr'];

	@$codigo = $_POST['codigo'];
	@$idprop = $_POST['id_prop'];
	@$estado = $_POST['estado'];

	if($codigo=='')
		$codigo='%';
	if($idprop=='')
		$idprop='%';
	if($estado=='')
		$activ='%';
	if($estado!='')
	{
		if($estado=='Activados')
			$activ='si';
		elseif($estado=='Desactivados')
			$activ='no';
		else
			$activ='%';
	}

  $bus =mysql_query("SELECT COUNT(Cod_inm) FROM inmuebles");
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
  // establece en numero de pagina
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

	$bus = mysql_query("SELECT * from inmuebles where Cod_inm like '$codigo' and Id_prop like '$idprop' and Acti_inm like '$activ'
		   ORDER BY Cod_inm DESC $limit ") ;
// muestra en que pagina esta y el total de paginas
	$textline1 = "Historial (<b>$rows</b>)";
	$textline2 = "Página <b>$pagenum</b> de <b>$last</b>";
	// Establece la variable $paginationCtrls
	$paginationCtrls = '';

if($last != 1){

  if ($pagenum > 1) {
        $previous = $pagenum - 1;
    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Anterior</a> &nbsp; &nbsp; ';

    for($i = $pagenum-4; $i < $pagenum; $i++){
      if($i > 0){
            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
     	 }
      }
    }

  $paginationCtrls .= ''.$pagenum.' &nbsp; ';

  for($i = $pagenum+1; $i <= $last; $i++){
    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
    if($i >= $pagenum+4){
      break;
    }
  }

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Siguiente</a> ';
    }
}
$list = '';
while($row = mysql_fetch_array($bus, MYSQLI_ASSOC)){

	if($estado!='')
	{
		if($estado=='Bloqueados')
			$bloq='si';
		elseif($estado=='Desbloqueados')
			$bloq='no';
		else
			$bloq = '%';
	}
	else
		$bloq = '%';

	$cod =$row['Cod_inm'];

	if($row['Acti_inm']=='no')
		$activado ='<input type="checkbox" class="activar" checked  id="'.$cod.'">';
	else
		$activado ='<input type="checkbox" class="activar"  id="'.$cod.'">';

	if($bloq=='%')
	{
		$bus2 = mysql_query("SELECT * FROM arrendatarios WHERE Cod_inm='$cod' ");
		if(mysql_num_rows($bus2)==0)
		{
			$arrend = '';
			$bloqueo = '<input type="checkbox" class="bloquear" disabled>';
			if($row['Serv_inm']=='Arriendo')
				$liga = '<a href="javascript:void(0)" id="'.$cod.'" class="ligar">Ligar</a>';
			else
				$liga='';
			$desliga = '';
		}
		else
		{
			$resp = mysql_fetch_array($bus2);
			$arrend = $resp['Id_arr'];
			if($resp['Bloq_arr']=='si')
				$bloqueo = '<input type="checkbox" class="bloquear" checked  id="'.$arrend .'">';
			else
				$bloqueo = '<input type="checkbox" class="bloquear" id="'.$arrend .'" >';
			$liga='';
			$desliga = '<a href="javascript:void(0)" class="deslig" id="'.$arrend.'">Desligar</a>';
		}

		$list.='<tr>
				<td>'.$row['Cod_inm'].'</td>
				<td>'.$row['Serv_inm'].'</td>
				<td>'.$row['Id_prop'].'</td>
				<td>'.$arrend.'</td>
				<td>'.$bloqueo.'</td>
				<td>'.$activado.'</td>
				<td><a href="javascript:void(0)" class="edita" id="'.$cod.'">Editar</a></td>
				<td>'.$liga.'</td>
				<td>'.$desliga.'</td>
			</tr>';
	}
	else
	{
		$bus2 = mysql_query("SELECT * FROM arrendatarios WHERE Cod_inm='$cod' and Bloq_arr = '$bloq' ");
		while($resp = mysql_fetch_array($bus2))
		{
			$arrend = $resp['Id_arr'];
			if($bloq=='si')
				$bloqueo = '<input type="checkbox" class="bloquear" checked id="'.$arrend .'">';
			else
				$bloqueo = '<input type="checkbox" class="bloquear" id="'.$arrend .'">';
			$liga='';
			$desliga = '<a href="javascript:void(0)" class="deslig" id="'.$arrend.'">Desligar</a>';
			$list.='<tr>
					<td>'.$row['Cod_inm'].'</td>
					<td>'.$row['Serv_inm'].'</td>
					<td>'.$row['Id_prop'].'</td>
					<td>'.$arrend.'</td>
					<td>'.$bloqueo.'</td>
					<td>'.$activado.'</td>
					<td><a href="javascript:void(0)" class="edita" id="'.$cod.'">Editar</a></td>
					<td>'.$liga.'</td>
					<td>'.$desliga.'</td>
				</tr>';
		}
	}
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
<section id="listart">
<h2>Listar Inmuebles</h2>
<div id="busquedas">
	<form id="filtrar" method="post" action="listar">
		<label>Busquedas por: </label><input type="number" placeholder="Codigo" name="codigo"> <input type="number" placeholder="Id Propietario" name="id_prop"> <select name="estado">
			<option value="">Selecciona</option>
			<option>Bloqueados</option>
			<option>Desbloqueados</option>
			<option>Activados</option>
			<option>Desactivados</option>
		</select>
		<input type="submit" value="Buscar">
	</form>
</div>
<table>
	<thead>
		<td>Codigo</td>
		<td>T/Servicio</td>
		<td>Id Propietario</td>
		<td>Id Arrendatario</td>
		<td>Bloquear</td>
		<td>Desactivar</td>
		<td>Editar</td>
		<td>Ligar</td>
		<td>Desligar</td>
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
<script type="text/javascript" src="js/script_listar.js"></script>
</html>