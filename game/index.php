<?
session_start();
include("../conectar.php");
$query = mysqli_query($conn, "SELECT * FROM mantenimiento");
$ver = mysqli_fetch_array($query);
if($ver['estado_cliente'] == "0") {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=mantenimiento.php">');
} else {
$version = "2";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Urbaloca</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script language="javascript" type="text/javascript">
var xmlhttp = false;
try {
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
xmlhttp = false;
}
}
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
}
function comprobar() {
var obj = document.getElementById("resultado");
xmlhttp.open("GET", "../comprobarban.php");

    xmlhttp.onreadystatechange = function() 
    {       
        if (xmlhttp.readyState == 4) {
              obj.innerHTML = xmlhttp.responseText; 
		}          
}
xmlhttp.send(null);
}
setInterval("comprobar()", 1000);
</script>
</head>
<body>
<div id="resultado"></div>
<!--URL utilizadas en la película-->
<a href="http://urba-loca.es/beta/game.php"></a>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="100%" height="100%" id="urbaloca" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="urbaloca<?=$version;?>.swf" />
<param name="quality" value="high" />
<PARAM NAME="SCALE" VALUE="noScale" />
<embed src="urbaloca<?=$version;?>.swf?usuario=<?=$_SESSION['user'];?>&password=<?=$_SESSION['pass'];?>" quality="high" width="100%" height="100%" name="urbaloca" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" scale="noScale" />
</object>
</body>
</html>
<?
}
?>