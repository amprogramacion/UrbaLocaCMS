<?
session_start();
include("conectar.php");
if(!isset($_SESSION['user'])) {
		die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
$data = mysqli_query($conn, "SELECT * FROM users WHERE nombre='".$_SESSION['user']."'");
$ver_data = mysqli_fetch_array($data);
if($ver_data['vip'] >= time()) {
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=web.php?estado=miembro#abajo">';
} else {
	$resta = $ver_data['fichas']-20;
	if($resta <= -1) {
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=web.php?estado=loks#abajo">';
	} else {
		$placas = $ver_data['placas'];
		$latengo = false;
		$explode = explode(";", $placas);
		for($a=0;$a<count($explode);$a++) {
			if($explode[$a] == "VIP") {
				$latengo = true;
			}
		}
		if($latengo == false) {
			@mysqli_query($conn, "UPDATE users SET placas='".$placas.";VIP"."' WHERE nombre='".$_SESSION['user']."'");
		}
		@mysqli_query($conn, "UPDATE users SET visible='1' WHERE nombre='".$_SESSION['user']."'");
		@mysqli_query($conn, "UPDATE users SET puesta='VIP' WHERE nombre='".$_SESSION['user']."'");
		@mysqli_query($conn, "UPDATE users SET fichas='".$resta."' WHERE nombre='".$_SESSION['user']."'");
		@mysqli_query($conn, "UPDATE users SET vip='".strtotime("+1 month")."' WHERE nombre='".$_SESSION['user']."'");
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?estado=ok#abajo">';
	}
}
?>
