<?
session_start();
include("conectar.php");
$query_ip = mysqli_query($conn, "SELECT * FROM banip WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
if(isset($_SESSION['user']) && !mysqli_num_rows($query_ip)) {
	$query_user = mysqli_query($conn, "SELECT * FROM users WHERE nombre='".$_SESSION['user']."'");
	$ver_user = mysqli_fetch_array($query_user);
	if($ver_user['baneado'] == "1") {
		if($ver_user['fechaban'] >= time()) {
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ban.php">';
		} else {
			@mysqli_query($conn, "UPDATE users SET baneado='0' WHERE nombre='".$_SESSION['user']."'");
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
		}
	}
} else {
	$query_ip = mysqli_query($conn, "SELECT * FROM banip WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
	if(mysqli_num_rows($query_ip)) {
		$ver_ip = mysqli_fetch_array($query_ip);
		if($ver_ip['tiempo'] >= time()) {
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ban.php">';
		} else {
			@mysqli_query($conn, "DELETE FROM banip WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
		}
	} else {
		$query_ip2 = mysqli_query($conn, "SELECT * FROM users WHERE ip='/".$_SERVER['REMOTE_ADDR']."'");
		if(mysqli_num_rows($query_ip2)) {
			$ver_ip2 = mysqli_fetch_array($query_ip2);
			if($ver_ip2['baneado'] == "1") {
				if($ver_ip2['fechaban'] >= time()) {
					echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ban.php">';
				} else {
					@mysqli_query($conn, "UPDATE users SET baneado='0' WHERE nombre='".$ver_ip2['user']."'");
					echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
				}
			}
		}
	}
}
?>