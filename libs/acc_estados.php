<?php
include("conexion.php");
@$opc = $_REQUEST['opc'];
@$informacion = array();


@$inicial = $_POST['inicial'];
@$final = $_POST['final'];

@$codigo = $_REQUEST['codigo'];
@$idprop = $_REQUEST['propiet'];
@$pini = $_REQUEST['pini'];
@$pfin = $_REQUEST['pfin'];


//SUBIR ARCHIVOS
@$upload_folder ='../images/estados';
@$nombre_archivo = $_FILES['estado']['name'];
@$tmp_archivo = $_FILES['estado']['tmp_name'];
//

switch ($opc) {
	case 'crear':
		for($i=0;$i<count($nombre_archivo);$i++)
		{
			@$archivador = $upload_folder . '/'.date('dmY').'_'.$nombre_archivo[$i];
			if(move_uploaded_file($tmp_archivo[$i], $archivador))
			{
				$crea = mysql_query("INSERT INTO estados VALUES('','$nombre_archivo[$i]','$inicial','$final','$archivador') ");
			}
		}
		$respuesta['status'] = 'correcto';
		echo json_encode($respuesta);
	break;
	case 'cargar_t':
		if($codigo=='')
			$codigo='%';
		if($idprop=='')
			$idprop='%';
		if($pini=='' || $pini=='%')
			$pini='1999/01/01';
		if($pfin=='' || $pfin=='%')
			$pfin='2050/01/01';
		if($idprop!='%')
			$sel = mysql_query("SELECT estados.*,inmuebles.Id_prop FROM estados,inmuebles
			WHERE estados.Cod_inm like '$codigo' AND estados.Ini_est BETWEEN '$pini' AND '$pfin' AND inmuebles.Id_prop = '$idprop' AND inmuebles.Cod_inm = estados.Cod_inm
			ORDER BY estados.Id_est desc");
		else
			$sel = mysql_query("SELECT estados.*,inmuebles.Id_prop FROM estados,inmuebles
			WHERE estados.Cod_inm like '$codigo' AND estados.Ini_est BETWEEN '$pini' AND '$pfin' AND inmuebles.Cod_inm = estados.Cod_inm
			ORDER BY estados.Id_est desc");
		while($resp=mysql_fetch_object($sel))
		{
			$informacion[]=$resp;
		}
		echo '{"estados":'.json_encode($informacion).'}';
	break;
	case 'editar':
		$bus = mysql_query("SELECT * FROM estados WHERE Id_est = '$codigo' ");
		$res = mysql_fetch_object($bus);
		$arc = $res->Arc_est;
		$arc = substr($arc,18);
		$nom  = explode('_',$arc);
		@$archivador = $upload_folder . '/'.$nom[0].'_'.$nombre_archivo;
		if(move_uploaded_file($tmp_archivo, $archivador))
		{
			$crea2 = mysql_query("UPDATE estados SET Arc_est='$archivador' WHERE Id_est = '$codigo' ");
			$respuesta['status'] = 'correcto';
		}
		else
			$respuesta['status'] = 'error';
		echo json_encode($respuesta);
	break;
	case 'cargar_pr':
		session_start();
		$prop = $_SESSION['usulog'];
		if($pini=='' || $pini=='%')
			$pini='1999/01/01';
		if($pfin=='' || $pfin=='%')
			$pfin='2050/01/01';
		$sel = mysql_query("SELECT Cod_inm FROM inmuebles WHERE Id_prop='$prop' ");
		while($res=mysql_fetch_object($sel))
		{
			$inm = $res->Cod_inm;
			$sel2 = mysql_query("SELECT * FROM estados WHERE  Cod_inm = '$inm' AND Ini_est BETWEEN '$pini' AND  '$pfin' ORDER BY Id_est desc");
			while($res2=mysql_fetch_object($sel2))
			{
				$res2 =(array)$res2;
				$res2['Id_prop'] = $prop;
				$res2 =(object)$res2;
				$informacion[]=$res2;
			}

		}
		echo '{"estados":'.json_encode($informacion).'}';
	break;
	default:
		break;
}

?>