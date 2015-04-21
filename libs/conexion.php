<?php
$conexion=mysql_connect("localhost","hogaresd_inmo15","dd*?EFTg5OM2")or die ("No hay Conexion");
$conectDB=mysql_select_db("hogaresd_andapref",$conexion) or die ("no existe BD");
mysql_query ("SET NAMES 'utf8'");
?>
