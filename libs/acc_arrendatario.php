<?php
include("conexion.php");
@$opc = $_REQUEST['opc'];
@$informacion = array();
@$codigo = $_REQUEST['codigo'];
@$recargo = $_POST['recargo'];
@$admintr = $_POST['admintr'];
@$moradmintr = $_POST['moradmintr'];
@$email = $_POST['email'];
@$telefono = $_POST['telefono'];
@$movil = $_POST['movil'];

@$pini = $_REQUEST['pini'];
@$pfin = $_REQUEST['pfin'];

switch ($opc) {
	case 'cargar':
		$sel = mysql_query("SELECT inmuebles.Val_inm,propietarios.Id_prop,propietarios.Nom_prop,propietarios.Apel_prop FROM inmuebles,propietarios
			   WHERE inmuebles.Id_prop = propietarios.Id_prop AND inmuebles.Cod_inm = '$codigo' ");
		if(mysql_num_rows($sel)!=0)
		{
			$sel2 = mysql_query("SELECT * FROM arrendatarios WHERE Cod_inm='$codigo' ");
			if(mysql_num_rows($sel2)!=0)
			{
				$resp = mysql_fetch_object($sel);
				$informacion[]=$resp;

				$resp2 = mysql_fetch_object($sel2);
				$informacion[]=$resp2;

			}
			else
				$informacion[] = 'error1';
		}
		else
			$informacion[] = 'error2';
		echo '{"Inmueble":'.json_encode($informacion).'}';
	break;
	case 'editar':
		$act = mysql_query("UPDATE arrendatarios SET Email_arr='$email',Tel_arr='$telefono',Mov_arr='$movil',Recrg_arr='$recargo',Admin_arr='$admintr',Mora_arr='$moradmintr' WHERE Cod_inm='$codigo' ");
		echo'correcto';
	break;
	case 'facturar':
		session_start();
		$arr = $_SESSION['usulog'];

		if($pini=='')
			$pini='%';
		if($pfin=='')
			$pfin='%';

		$sel = mysql_query("SELECT * FROM facturacion WHERE  Id_arr = '$arr' AND Ini_fac like '$pini' AND Fin_fac like '$pfin' ORDER BY Id_fac desc");
		while($resp=mysql_fetch_object($sel))
		{
			$informacion[]=$resp;
		}
		echo '{"factura":'.json_encode($informacion).'}';
	break;
	default:
		# code...
		break;
}

?>