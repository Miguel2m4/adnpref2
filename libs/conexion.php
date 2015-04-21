<?php
$conexion=mysql_connect("localhost","anda","88021955200")or die ("No hay Conexion");
$conectDB=mysql_select_db("andaperf2015",$conexion) or die ("no existe BD");
mysql_query ("SET NAMES 'utf8'");
?>
