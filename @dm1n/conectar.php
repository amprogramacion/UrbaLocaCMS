<?php
$dbhost='localhost';
$dbusername='urbaloca_user';
$dbuserpass='123456asd';
$dbname='urbaloca_web';
$conn = mysql_connect ($dbhost, $dbusername, $dbuserpass) or die('No se puede conectar a la base de datos');
mysql_select_db($dbname, $conn) or die('No se puede seleccionar la base de datos');
?>