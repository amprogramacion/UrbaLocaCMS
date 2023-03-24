<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
$ide = $_GET['ide'];
$query = mysql_query("SELECT * FROM users WHERE id='$ide'");
if(!mysql_num_rows($query)) {
	echo "Ese ID no existe";
} else {
	$ver = mysql_fetch_array($query);
	if(isset($_POST['Submit'])) {
		$nid = $_POST['nid'];
		$nombre = $_POST['nombre'];
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		$fnac = $_POST['fnac'];
		$rango = $_POST['rango'];
		$fichas = $_POST['fichas'];
		$placas = $_POST['placas'];
		$vip = $_POST['vip'];
		@mysql_query("UPDATE users SET nombre='$nombre' WHERE id='$nid'");
		@mysql_query("UPDATE users SET pass='$pass' WHERE id='$nid'");
		@mysql_query("UPDATE users SET email='$email' WHERE id='$nid'");
		@mysql_query("UPDATE users SET fnac='$fnac' WHERE id='$nid'");
		@mysql_query("UPDATE users SET rango='$rango' WHERE id='$nid'");
		@mysql_query("UPDATE users SET fichas='$fichas' WHERE id='$nid'");
		@mysql_query("UPDATE users SET placas='$placas' WHERE id='$nid'");
		@mysql_query("UPDATE users SET vip='$vip' WHERE id='$nid'");
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=editaruser&ide='.$nid.'">';
	}
?>
<script type="text/javascript">
function add() {
	var campo = document.getElementById("vip");
	campo.value = '<?=strtotime("+1 month");?>';
}
</script>
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
        <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Editar a un usuario </td>
        <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
          <tr>
            <td><p>Vas a editar a un usuario. Aqu&iacute; podr&aacute;s editar casi todos los campos de la base de datos:</p>
              <form id="form1" name="form1" method="post" action="">
                <table width="337" border="0" align="center">
                  <tr>
                    <td width="159" align="right"><strong>Nombre:</strong></td>
                    <td width="168"><label>
                      <input name="nombre" type="text" id="nombre" value="<?=$ver['nombre'];?>" />
                    </label></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Contrase&ntilde;a:</strong></td>
                    <td><input name="pass" type="text" id="pass" value="<?=$ver['pass'];?>" /></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Email:</strong></td>
                    <td><input name="email" type="text" id="email" value="<?=$ver['email'];?>" /></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Fecha de Nacimiento: </strong></td>
                    <td><input name="fnac" type="text" id="fnac" value="<?=$ver['fnac'];?>" /></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Rango:</strong></td>
                    <td><input name="rango" type="text" id="rango" value="<?=$ver['rango'];?>" /></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Fichas:</strong></td>
                    <td><input name="fichas" type="text" id="fichas" value="<?=$ver['fichas'];?>" /></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Placas:</strong></td>
                    <td><input name="placas" type="text" id="placas" value="<?=$ver['placas'];?>" /></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>VIP:</strong></td>
                    <td><input name="vip" type="text" id="vip" value="<?=$ver['vip'];?>" />
                      <a href="javascript:add();">(A&ntilde;adir +1 mes)</a> | <a href="javascript:alert('Añade un mes en modo TIME() de PHP');">(?)</a> </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><label>
                      <input type="submit" name="Submit" value="Modificar" />
                      <input name="nid" type="hidden" id="nid" value="<?=$ver['id'];?>" />
                    </label></td>
                  </tr>
                </table>
                            </form>              </td>
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
<?
}
?>