<?
session_start();
include("conectar.php");
if(!isset($_SESSION['user'])) {
die("No puedes estar aqui.");
}
$query = mysqli_query($conn, "SELECT * FROM users WHERE nombre='".$_SESSION['user']."'");
$ver = mysqli_fetch_array($query);
$puesta = $ver['puesta'];
$visible = $ver['visible'];
if($puesta != NULL) {
	if($visible == "1") {
		@mysqli_query($conn, "UPDATE users SET visible='0' WHERE nombre='".$_SESSION['user']."'");
	} else {
		@mysqli_query($conn, "UPDATE users SET visible='1' WHERE nombre='".$_SESSION['user']."'");
	}
}
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?id=micuenta">';
?>