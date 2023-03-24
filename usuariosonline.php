<?php
include("conectar.php");
$tiempo_conexion = 200; 
$timestamp = time();
$desconexion = $timestamp - $tiempo_conexion;
$ip = $_SERVER['REMOTE_ADDR'];
@mysql_query("INSERT INTO useronline VALUES('$timestamp','$ip')") or die(mysql_error());;
@mysql_query("DELETE FROM useronline WHERE timestamp<$desconexion") or die(mysql_error());;
$result = mysql_query("SELECT DISTINCT ip FROM useronline") or die(mysql_error());;
echo mysql_num_rows($result);
?>