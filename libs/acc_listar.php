<?php
include("conexion.php");

@$opc = $_POST['opc'];
@$codigo = $_POST['cod'];
@$accion = $_POST['accion'];

switch ($opc) {
	case 'bloquear':
		$act = mysql_query("UPDATE arrendatarios SET Bloq_arr='$accion' WHERE Id_arr='$codigo' ");
	break;
	case 'activar':
		$act = mysql_query("UPDATE inmuebles SET Acti_inm='$accion' WHERE Cod_inm='$codigo' ");
	break;
	default:
		# code...
		break;
}

?>