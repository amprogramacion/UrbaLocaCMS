<?
session_start();
include("conectar.php");
$query_ip = mysql_query("SELECT * FROM banip WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
if(isset($_SESSION['user']) && !mysql_num_rows($query_ip)) {
	$query_user = mysql_query("SELECT * FROM users WHERE nombre='".$_SESSION['user']."'");
	$ver_user = mysql_fetch_array($query_user);
	if($ver_user['baneado'] == "1") {
		if($ver_user['fechaban'] <= time()) {
			@mysql_query("UPDATE users SET baneado='0' WHERE nombre='".$_SESSION['user']."'");
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
		}
	} else {
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	}
} else {
	if(mysql_num_rows($query_ip)) {
		$ver_ip = mysql_fetch_array($query_ip);
		if($ver_ip['tiempo'] >= time()) {
			
		} else {
			@mysql_query("DELETE FROM banip WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
		}
	} else {
		$query_ip2 = mysql_query("SELECT * FROM users WHERE ip='/".$_SERVER['REMOTE_ADDR']."'");
		if(mysql_num_rows($query_ip2)) {
			$ver_ip2 = mysql_fetch_array($query_ip2);
			if($ver_ip2['baneado'] == "1") {
				if($ver_ip2['fechaban'] <= time()) {
					@mysql_query("UPDATE users SET baneado='0' WHERE nombre='".$ver_ip2['user']."'");
					echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
				}
			} else {
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
			}
		}
	}
}
?>