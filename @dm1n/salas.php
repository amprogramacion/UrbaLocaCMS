<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
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
        <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Gestion de Salas Privadas</td>
        <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
          <tr>
            <td>
			<?
			$query = mysql_query("SELECT * FROM rooms ORDER BY id DESC");
if(!mysql_num_rows($query)) {
	echo "No hay salas";
} else {
	while($ver = mysql_fetch_array($query)) {
	?><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="10" align="right" valign="bottom"><img src="img/cuadradogris/supiz.png" width="10" height="10" /></td>
                <td width="1194" style="background-image:url(img/cuadradogris/medsup.png); background-repeat:repeat-x; background-position:bottom;">&nbsp;</td>
                <td width="12" align="left" valign="bottom"><img src="img/cuadradogris/supder.png" width="10" height="10" /></td>
              </tr>
              <tr>
                <td style="background-image:url(img/cuadradogris/mediz.png); background-repeat:repeat-y; background-position:right;">&nbsp;</td>
                <td bgcolor="#DADADA"><table width="100%" border="0">
                    <tr>
                      <td width="75%"><?=$ver['name'];?>
                        - <b><i>
                          <?=$ver['owner'];?>
                          </i></b> [max.
                        <?=$ver['maxu'];?>
                        ]</td>
                      <td width="25%" align="right"><a href="eliminarsala.php?id=<?=$ver['id'];?>">[Eliminar]</a></td>
                    </tr>
                </table></td>
                <td style="background-image:url(img/cuadradogris/medder.png); background-repeat:repeat-y;">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" valign="top"><img src="img/cuadradogris/infiz.png" width="10" height="10" /></td>
                <td style="background-image:url(img/cuadradogris/medaba.png); background-repeat:repeat-x;">&nbsp;</td>
                <td align="left" valign="top"><img src="img/cuadradogris/infder.png" width="10" height="10" /></td>
              </tr>
            </table>
              <?
}
}
?></td>
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
