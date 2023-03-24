<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
$query = mysqli_query($conn, "SELECT * FROM mantenimiento");
$ver = mysqli_fetch_array($query);
$estado_web = $ver['estado_web'];
$estado_cliente = $ver['estado_cliente'];
if($estado_web == 1) {
	$color_web = "#C4FF88";
	$texto_web = "La web esta <b>activa</b>";
} else {
	$color_web = "#FFC1C1";
	$texto_web = "La web esta <b>inactiva</b>";
}
if($estado_cliente == 1) {
	$color_cliente = "#C4FF88";
	$texto_cliente = "El cliente esta <b>activo</b>";
} else {
	$color_cliente = "#FFC1C1";
	$texto_cliente = "El cliente esta <b>inactivo</b>";
}
if(isset($_GET['cambiar'])) {
	$cambiar = $_GET['cambiar'];
	if($cambiar == "web") {
		if($estado_web == 1) {
			@mysqli_query($conn, "UPDATE mantenimiento SET estado_web='0'");
		} else {
			@mysqli_query($conn, "UPDATE mantenimiento SET estado_web='1'");
		}
	} else {
		if($estado_cliente == 1) {
			@mysqli_query($conn, "UPDATE mantenimiento SET estado_cliente='0'");
		} else {
			@mysqli_query($conn, "UPDATE mantenimiento SET estado_cliente='1'");
		}
	}
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=mantenimiento">';
}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
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
        <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Mantenimiento Web/Cliente </td>
        <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
          <tr>
            <td>En esta secci&oacute;n podr&aacute;s deshabilitar la Web o el cliente del juego para realizar modificaciones o actualizaciones en la p&aacute;gina.<br />
              <br />
              <table width="438" border="0" align="center">
                <tr>
                  <td align="center"><strong>Mantenimiento Web </strong></td>
                  <td align="center"><strong>Mantenimiento Cliente </strong></td>
                </tr>
                <tr>
                  <td align="center" bgcolor="<?=$color_web;?>"><?=$texto_web;?></td>
                  <td align="center" bgcolor="<?=$color_cliente;?>"><?=$texto_cliente;?></td>
                </tr>
                <tr>
                  <td align="center"><a href="panel.php?id=mantenimiento&cambiar=web">[Cambiar Estado]</a></td>
                  <td align="center"><a href="panel.php?id=mantenimiento&cambiar=cliente">[Cambiar Estado]</a></td>
                </tr>
              </table></td>
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
