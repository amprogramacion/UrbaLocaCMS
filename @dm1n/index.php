<?
session_start();
include("conectar.php");
$query_ip = mysql_query("SELECT * FROM banip WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
if(mysql_num_rows($query_ip)) {
	$ver_ip = mysql_fetch_array($query_ip);
	if($ver_ip['tiempo'] >= time()) {
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../ban.php">';
	} else {
	@mysql_query("DELETE FROM banip WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	}
}
if(isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php">');
}
if(!isset($_SESSION['intentos'])) {
$_SESSION['intentos'] = 3;
}
?>
<html>
<head>
<title>UrbaLoca - Administracion</title>
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
.Estilo2 {
	color: #FF0000;
	font-style: italic;
	font-weight: bold;
}
-->
</style></head>
<body>
<table width="100%" height="72" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="72" style="background-image:url(img/fondoup.png);"><table width="90%" border="0" align="center">
      <tr>
        <td width="30%"><img src="img/logoul.png" width="218" height="33" /></td>
        <td width="70%" align="right"><h1 style="color: white;">Panel de Administraci&oacute;n </h1></td>
      </tr>
    </table></td>
  </tr>
</table>
<br>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10" align="right" valign="bottom"><img src="img/cuadroblanco/supiz.png" width="10" height="10" /></td>
    <td width="1211" style="background-image:url(img/cuadroblanco/medsup.png); background-repeat:repeat-x; background-position:bottom;">&nbsp;</td>
    <td width="10" align="left" valign="bottom"><img src="img/cuadroblanco/supder.png" width="10" height="10" /></td>
  </tr>
  <tr>
    <td style="background-image:url(img/cuadroblanco/mediz.png); background-repeat:repeat-y; background-position:right;">&nbsp;</td>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1%" align="right"><img src="img/rojo/celda_sup_iz.png" width="7" height="30" /></td>
        <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Inicia sesi&oacute;n para Administrar UrbaLoca </td>
        <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
            <tr>
              <td><p>Bienvenido al panel de administraci&oacute;n de Urbaloca. Por favor, inicia sesi&oacute;n para acceder al panel de control:</p>
                <form name="form1" method="post" action="">
                  <table width="428" border="0" align="center">
                    <tr>
                      <td align="right"><strong>Usuario:</strong></td>
                      <td><label>
                        <input name="user" type="text" id="user">
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right"><strong>Contrase&ntilde;a:</strong></td>
                      <td><input name="pass" type="password" id="pass"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><label>
                        <input type="submit" name="Submit" value="Enviar">
                      </label></td>
                    </tr>
                  </table>
                  </form> 
<?
if(isset($_POST['Submit'])) {
	if($_SESSION['intentos'] <= 0) {
		$ip = $_SERVER['REMOTE_ADDR'];
		$fechaban = strtotime("+2 hours");
		$query = mysql_query("SELECT * FROM banip WHERe ip='$ip'");
		if(!mysql_num_rows($query)) {
			@mysql_query("INSERT INTO banip (ip, tiempo, motivo) VALUES ('$ip', '$fechaban', 'Has sido expulsado de UrbaLoca 2 horas por intentar acceder al panel de administracion sin tener permisos para ello')");
			session_unset();
			session_destroy();
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
		}
	} else {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$query = mysql_query("SELECT * FROM users WHERE nombre='".$user."'");
		if(!mysql_num_rows($query)) {
			$_SESSION['intentos'] = $_SESSION['intentos']-1;
			echo '<script>alert("Ese usuario no está registrado en la base de datos");</script><META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
		} else {
			$ver = mysql_fetch_array($query);
			if($ver['pass'] != md5(md5($pass))) {
				echo '<script>alert("La contraseña es incorrecta");</script><META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
				$_SESSION['intentos'] = $_SESSION['intentos']-1;
			} elseif($ver['rango'] == "ADM" || $ver['rango'] == "MOD") {
			$_SESSION['admin'] = $user;
			$_SESSION['rango'] = $ver['rango'];
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php">';
			} else {
			echo '<script>alert("No tienes el rango suficiente para entrar al panel de administracion");</script><META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
			$_SESSION['intentos'] = $_SESSION['intentos']-1;
			}
		}
	}
}
$mi_ip = $_SERVER['REMOTE_ADDR'];
?>
                <p>Recuerda que tu IP <span class="Estilo2"><?="(".$mi_ip.")";?></span> queda r<strong>egistrada en nuestro sistema</strong> para mayor <strong>seguridad</strong>. Dispones de un m&aacute;ximo de <span class="Estilo1"><?=$_SESSION['intentos'];?> intentos</span> para <strong>entrar al panel</strong>. </p>               </td>
            </tr>
        </table></td>
      </tr>
    </table></td>
    <td style="background-image:url(img/cuadroblanco/medder.png); background-repeat:repeat-y;">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top"><img src="img/cuadroblanco/infiz.png" width="10" height="10" /></td>
    <td style="background-image:url(img/cuadroblanco/medaba.png); background-repeat:repeat-x;">&nbsp;</td>
    <td align="left" valign="top"><img src="img/cuadroblanco/infder.png" width="10" height="10" /></td>
  </tr>
</table>
</body>
</html>