<?
session_start();
include("conectar.php");
if(!isset($_SESSION['user'])) {
die("No puedes estar aqui.");
}
$query = mysql_query("SELECT * FROM users WHERE nombre='".$_SESSION['user']."'");
$ver = mysql_fetch_array($query);
$puesta = $ver['puesta'];
$visible = $ver['visible'];
if($puesta != NULL) {
	if($visible == "1") {
		@mysql_query("UPDATE users SET visible='0' WHERE nombre='".$_SESSION['user']."'");
	} else {
		@mysql_query("UPDATE users SET visible='1' WHERE nombre='".$_SESSION['user']."'");
	}
}
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?id=micuenta">';
?>