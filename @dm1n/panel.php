<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
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
-->
</style></head>
<body>
<table width="100%" height="72" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="72" style="background-image:url(img/fondoup.png);"><table width="90%" border="0" align="center">
      <tr>
        <td width="30%"><a href="panel.php"><img src="img/logoul.png" width="218" height="33" border="0" /></a></td>
        <td width="70%" align="right"><h1 style="color: white;">Bienvenido, <?=$_SESSION['admin'];?></h1></td>
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
    <td bgcolor="#FFFFFF"><table width="100%" border="0">
      <tr>
        <td width="26%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="10" align="right" valign="bottom"><img src="img/cuadroblanco/supiz.png" width="10" height="10" /></td>
            <td width="1190" style="background-image:url(img/cuadroblanco/medsup.png); background-repeat:repeat-x; background-position:bottom;">&nbsp;</td>
            <td width="16" align="left" valign="bottom"><img src="img/cuadroblanco/supder.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td style="background-image:url(img/cuadroblanco/mediz.png); background-repeat:repeat-y; background-position:right;">&nbsp;</td>
            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="1%" align="right"><img src="img/verde/celda_sup_iz.png" width="7" height="30" /></td>
                  <td width="98%" align="center" bgcolor="#85FF02" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Me&uacute; de Moderaci&oacute;n </td>
                  <td width="1%" align="left"><img src="img/verde/celda_sup_der.png" width="7" height="30" /></td>
                </tr>
                <tr>
                  <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="3">
                      <tr>
                        <td align="center"><strong><a href="panel.php">Inicio Panel </a></strong></td>
                        </tr>
                      <tr>
                        <td align="center"><strong><a href="panel.php?id=listausuarios">Lista de Usuarios</a> </strong></td>
                        </tr>
                      <tr>
                        <td align="center"><strong><a href="panel.php?id=usuariosbaneados">Usuarios Baneados </a></strong></td>
                        </tr>
                      <tr>
                        <td align="center"><strong><a href="panel.php?id=ipsbaneadas">IP's baneadas </a></strong></td>
                        </tr>
                      <tr>
                        <td align="center"><strong><a href="panel.php?id=gesnoticias">Gesti&oacute;n de Noticias </a></strong></td>
                        </tr>
                      <tr>
                        <td align="center"><strong><a href="panel.php?id=gesconcursos">Gesti&oacute;n de Concursos </a></strong></td>
                        </tr>
                      <tr>
                        <td align="center"><strong><a href="panel.php?id=mantenimiento">Mantenimiento cliente </a></strong></td>
                        </tr>
                      <tr>
                        <td align="center"><a href="panel.php?id=salas"><strong>Gestion de Salas</strong></a></td>
                        </tr>
                      <tr>
                        <td align="center"><strong><a href="logout.php">Cerrar sesi&oacute;n </a></strong></td>
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
        </table></td>
        <td width="74%" valign="top"><?
	@$idw = $_GET['id'];
	if(substr($idw, 0, 3) == "htt" || substr($idw, 0, 3) == "www" || substr($idw, 0, 3) == "../" || $idw == "index" || $idw == "perfil" || $idw == "registro") {
	echo "<font face=system><h1>Intento de hackeo <b>repelido</b>.";
	} else {
	if(!isset($idw) || $_GET['id']==NULL) {
	@include("index2.php");
	} else {
	if(!file_exists($idw.'.php')) {
	@include("error404.php");
	} else {
	include($idw.".php");
	}
	}
	}
	?></td>
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