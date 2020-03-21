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
        <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Lista de Usuarios Registrados </td>
        <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
          <tr>
            <td><p>Se muestra la lista de usuarios registrados, puedes editar, banear, borrar o activar la cuenta de un usuario:</p>
              <form id="form1" name="form1" method="post" action="">
                <table width="370" border="0" align="center">
                  <tr>
                    <td colspan="3">Buscar por: </td>
                  </tr>
                  <tr>
                    <td width="69"><label>
                      <select name="campo" id="campo">
                        <option value="nombre" selected="selected">Nick</option>
                        <option value="email">Email</option>
                        <option value="id">ID</option>
                      </select>
                    </label></td>
                    <td width="144"><label>
                      <input name="valor" type="text" id="valor" />
                    </label></td>
                    <td width="143"><label>
                      <input name="Buscar" type="submit" id="Buscar" value="Buscar" />
                    </label></td>
                  </tr>
                  <tr>
                    <td colspan="3" align="center"><a href="panel.php?id=listausuarios">Mostrar la lista completa </a></td>
                  </tr>
                </table>
                  </form>
<?
if(isset($_POST['Buscar'])) {
	$campo = $_POST['campo'];
	$valor = $_POST['valor'];
	$query = mysql_query("SELECT * FROM users WHERE $campo LIKE '%$valor%'");
} else {
	$query = mysql_query("SELECT * FROM users ORDER BY id ASC");
}
if(!mysql_num_rows($query)) {
	echo "<div class='error'>La consulta ha devuelto un valor de 0 resultados</div>";
} else {
	while($ver = mysql_fetch_array($query)) {
	?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10" align="right" valign="bottom"><img src="img/cuadradogris/supiz.png" width="10" height="10" /></td>
    <td width="936" style="background-image:url(img/cuadradogris/medsup.png); background-repeat:repeat-x; background-position:bottom;">&nbsp;</td>
    <td width="14" align="left" valign="bottom"><img src="img/cuadradogris/supder.png" width="10" height="10" /></td>
  </tr>
  <tr>
    <td style="background-image:url(img/cuadradogris/mediz.png); background-repeat:repeat-y; background-position:right;">&nbsp;</td>
    <td bgcolor="#DADADA"><table width="100%" border="0">
      <tr>
        <td width="10%" align="center"><?=$ver['id'];?></td>
        <td width="13%" align="center"><?=$ver['nombre'];?></td>
        <td width="43%" align="center"><?=$ver['email'];?> <strong>(<?=$ver['fichas'];?> 
          fichas) </strong></td>
        <td width="34%" align="center"><label>
          <input name="Submit1" type="submit" id="Submit1" value="Eliminar" onclick="javascript:window.location.href='eliminar.php?id=<?=$ver['id'];?>';" /></label>
          <input type="submit" name="Submit2" value="Editar" onclick="javascript:window.location.href='panel.php?id=editaruser&ide=<?=$ver['id'];?>';" /><input name="Submit1" type="submit" id="Submit1" value="Banear" onclick="javascript:window.location.href='panel.php?id=usuariosbaneados&user=<?=$ver['nombre'];?>';" />
        </td>
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
