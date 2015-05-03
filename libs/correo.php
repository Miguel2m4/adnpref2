<?php
include("conexion.php");

$opc = $_POST['opc'];

switch ($opc) {
	case 'solicitud':
		session_start();
		$iden = $_SESSION['usulog'];

		$sel = mysql_query("SELECT * FROM arrendatarios WHERE Id_arr='$iden'  ");
		$res= mysql_fetch_object($sel);
		$usuario = $res->Nom_arr.' '.$res->Apel_arr;

		@$telefono = $_POST['telefono'];
		@$tema = $_POST['asunto'];
		@$mensaje = $_POST['mensaje'];

			$asunto = "Mensaje desde Solicitudes-andapref.com";
		 	$cabeceras = "From: $usuario - $asunto";
			$email_to = "contacto@inmobiliariaandapref.com";
			$contenido = "Nueva Solitidud: \n"
			. "\n"
			. "$tema \n"
			. "\n"
			. "Arrendatario: $usuario \n"
			. "Id arrendatario: $iden \n"
			. "Telefono: $telefono \n"
			. "Mensaje: $mensaje \n"
			. "\n";

			if (@mail($email_to, $asunto ,$contenido ,$cabeceras ))
				echo 'correcto';
	break;
	case 'pqr':
		session_start();
		$iden = $_SESSION['usulog'];

		$sel = mysql_query("SELECT * FROM propietarios WHERE Id_prop='$iden'  ");
		$res= mysql_fetch_object($sel);
		$usuario = $res->Nom_prop.' '.$res->Apel_prop;

		@$telefono = $_POST['telefono'];
		@$tema = $_POST['asunto'];
		@$mensaje = $_POST['mensaje'];

			$asunto = "Mensaje desde Solicitudes-andapref.com";
		 	$cabeceras = "From: $usuario - $asunto";
			$email_to = "contacto@inmobiliariaandapref.com";
			$contenido = "Nueva Solitidud: \n"
			. "\n"
			. "$tema \n"
			. "\n"
			. "Propietario: $usuario \n"
			. "Id Propietario: $iden \n"
			. "Telefono: $telefono \n"
			. "Mensaje: $mensaje \n"
			. "\n";

			if (@mail($email_to, $asunto ,$contenido ,$cabeceras ))
				echo 'correcto';
	break;
	case 'contacto':
		@$nombre = $_POST['nombre'];
		@$email = $_POST['email'];
		@$telefono = $_POST['telefono'];
		@$tema = $_POST['asunto'];
		@$mensaje = $_POST['mensaje'];

			$asunto = "Mensaje desde Contáctenos-andapref.com";
		 	$cabeceras = "From: $nombre - $asunto";
			$email_to = "contacto@inmobiliariaandapref.com";
			$contenido = "Nuevo Mensaje: \n"
			. "\n"
			. "$tema \n"
			. "\n"
			. "Nombre: $nombre \n"
			. "Correo: $email \n"
			. "Telefono: $telefono \n"
			. "Mensaje: $mensaje \n"
			. "\n";

			if (@mail($email_to, $asunto ,$contenido ,$cabeceras ))
				echo 'correcto';
	break;
	default:
		break;
}

?>