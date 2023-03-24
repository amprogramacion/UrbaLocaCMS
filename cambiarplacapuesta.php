<?
session_start();
include("conectar.php");
if(!isset($_SESSION['user'])) {
	die("No puedes estar aqui.");
}
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE nombre='".$_SESSION['user']."'");
$ver = mysqli_fetch_array($query);
$misplacas = $ver['placas'];
$explode = explode(";", $misplacas);
$count = count($explode);
$latengo = false;
for($a=0;$a<$count;$a++) {
	if($explode[$a] == $id) {
		$latengo = true;
	}
}
if($latengo == true) {
	@mysqli_query($conn, "UPDATE users SET puesta='$id' WHERE nombre='".$_SESSION['user']."'");
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?id=micuenta">';
} else {
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?id=micuenta">';
}
?>