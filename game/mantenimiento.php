<?
session_start();
include("../conectar.php");
$query = mysqli_query($conn, "SELECT * FROM mantenimiento");
$ver = mysqli_fetch_array($query);
if($ver['estado_cliente'] == "1") {
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
}
echo '<META HTTP-EQUIV="Refresh" CONTENT="5; URL=mantenimiento.php">';
?>
<html>
<head>
<title>UL en mantenimiento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(img/fondo.png);
}
-->
</style></head>
<body>
<table width="100%" height="72" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="72" style="background-image:url(img/fondoup.png);"><table width="90%" border="0" align="center">
      <tr>
        <td width="30%"><img src="img/logoul.png" width="218" height="33" /></td>
        <td width="70%" align="right"><h1 style="color: white;">&nbsp;</h1></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />
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
        <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">La Urbanizaci&oacute;n est&aacute; en mantenimiento </td>
        <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
          <tr>
            <td><p>En estos momentos, la urbanizaci&oacute;n de <strong>UrbaLoca </strong>est&aacute; en <strong>mantenimiento</strong>. </p>
              <p><em>Vuelve dentro de unos minutos...</em></p></td>
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