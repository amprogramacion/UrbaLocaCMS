<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die("No puedes estar aqui");
}
?>
<form id="form1" name="form1" method="post" action="">
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
            <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Titulo</td>
            <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
          </tr>
          <tr>
            <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
                <tr>
                  <td>Puedes enviar un boletin a todos los usuarios de Urbaloca: <br />
                      <br />
                        <table width="515" border="0" align="center">
                    <tr>
                      <td width="83" align="right"><strong>Asunto:</strong></td>
                      <td width="416"><label>
                        <input name="asunto" type="text" id="asunto" />
                      </label></td>
                    </tr>
                    <tr>
                      <td align="right"><strong>Mensaje:</strong></td>
                      <td><label>
                        <textarea name="mensaje" cols="50" rows="5" id="mensaje"></textarea>
                      </label></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><label>
                        <input type="submit" name="Submit" value="Enviar" />
                      </label></td>
                    </tr>
                    <tr>
                      <td colspan="2">
<?
if(isset($_POST['Submit'])) {
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	if($asunto == NULL || $mensaje == NULL) {
		echo "<span style='color:red;'>Falta algun campo</span>";
	} else {
		$query = mysql_query("SELECT * FROM users");
		while($ver = mysql_fetch_array($query)) {
			$email = $ver['email'];
			$nombre = $ver['nombre'];
			$fichas = $ver['fichas'];
			mail("$email", "UrbaLoca: $asunto", "$mensaje", "From: noreply@urbaloca.es");
			echo "<span style='color:blue;'>enviado a <b>$email</b></span><br>";
		}
	}
}
?>
</td>
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
</form>
