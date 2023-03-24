<?
session_start();
include("conectar.php");
$query_ip = mysqli_query($conn, "SELECT * FROM banip WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
$query_ip2 = mysqli_query($conn, "SELECT * FROM users WHERE ip='".$_SERVER['REMOTE_ADDR']."' AND baneado='1'");
$query_user = mysqli_query($conn, "SELECT * FROM users WHERE nombre='".$_SESSION['user']."' AND baneado='1'");
$ver_ip = mysqli_fetch_array($query_ip);
$ver_ip2 = mysqli_fetch_array($query_ip2);
$ver_user = mysqli_fetch_array($query_user);
if(mysqli_num_rows($query_ip)) {
	$motivo = $ver_ip['motivo'];
	$tiempo = date('d-m-Y - H:i:s', $ver_ip['tiempo']);
} else if(mysqli_num_rows($query_ip2)) {
	$motivo = $ver_ip2['motivo'];
	$tiempo = date('d-m-Y - H:i:s', $ver_ip2['tiempo']);
} else if(mysqli_num_rows($query_user)) {
	$motivo = $ver_user['motivo'];
	$tiempo = date('d-m-Y - H:i:s', $ver_user['fechaban']);
} else {
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
}
?>
<html>
<head>
<title>UrbaLoca - Estas baneado</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	font-family: Tahoma;
	font-size: 12px;
}
body {
	background-image: url(img/fondo.png);
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo1 {
	color: #FF0000;
	font-weight: bold;
}
.divborde {
	border-radius: 19px 19px 19px 19px;
	-moz-border-radius: 19px 19px 19px 19px;
	-webkit-border-radius: 19px 19px 19px 19px;
	border: 1px solid #000000;
}
.divdentro {
	border-radius: 19px 19px 19px 19px;
	-moz-border-radius: 19px 19px 19px 19px;
	-webkit-border-radius: 19px 19px 19px 19px;
	border: 0px solid #000000;
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
xmlhttp.open("GET", "comprobarban2.php");

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
<link rel="icon" type="image/png" href="/favicon.png">
<link href="css/home.css" rel="stylesheet"/>
<link href="css/home.css" rel="stylesheet" media="print" />
</head>
<body>
<div id="resultado"></div>
<table width="100%" height="76" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td background="images/bg_up.png"><table width="800" height="56" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="100" height="56"></td>
        <td width="700" height="56"><a href="index.php"><img src="images/ul_logo.png" width="218" height="33" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />

<div class="cuadro1rojo">
  <div class="titulocuadrorojo"><span class="nick_letters">Has sido expulsado de UrbaLoca</span></div>
<div class="contenidocuadro" style="color: white;">
  <p>Un <strong>Moderador</strong> te ha <strong>expulsado de UrbaLoca</strong> por incumplir las <strong>normas b&aacute;sicas</strong> de comportamiento dentro de la <strong>Urbanizaci&oacute;n</strong>. </p>
        <p class="Estilo1">
          <?=$motivo;?>
        </p>
        <p>Tu desbaneo caducar&aacute; el <span class="Estilo1">
          <?=$tiempo;?>
      </span></p>
</div>
</div>
<p>&nbsp;</p>
</body>
</html>