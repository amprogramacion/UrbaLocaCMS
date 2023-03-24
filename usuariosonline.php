<?php
include("conectar.php");
$tiempo_conexion = 200; 
$timestamp = time();
$desconexion = $timestamp - $tiempo_conexion;
$ip = $_SERVER['REMOTE_ADDR'];
@mysqli_query($conn, "INSERT INTO useronline VALUES('$timestamp','$ip')") or die(mysql_error());;
@mysqli_query($conn, "DELETE FROM useronline WHERE timestamp<$desconexion") or die(mysql_error());;
$result = mysqli_query($conn, "SELECT DISTINCT ip FROM useronline") or die(mysql_error());;
echo mysqli_num_rows($result);
?>