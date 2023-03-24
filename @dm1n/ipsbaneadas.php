<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
if(isset($_POST['Submit'])) {
	$ip = $_POST['ip'];
	$motivo = $_POST['motivo'];
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	$dia = $_POST['dia'];
	$hora = $_POST['hora'];
	$tiempo = strtotime("+$ano years +$mes months +$dia days +$hora hours");
	$query = mysqli_query($conn, "SELECT * FROM banip WHERE ip='$ip'");
	if(!mysqli_num_rows($query)) {
		@mysqli_query($conn, "INSERT INTO banip (ip, tiempo, motivo) VALUES ('$ip', '$tiempo', '$motivo')");
	} else {
		echo '<script>alert("Esa IP ya está baneada");</script>';
	}
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=ipsbaneadas">';
}
?>
<style type="text/css">
<!--
.Estilo1 {font-weight: bold}
-->
</style>

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
        <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Banear IP </td>
        <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
          <tr>
            <td><p>Vas a banear una IP: </p>
              <form id="form1" name="form1" method="post" action="">
                <table width="569" border="0" align="center">
                  <tr>
                    <td width="145" align="right"><strong>IP:</strong></td>
                    <td width="414"><label>
                      <input name="ip" type="text" id="ip" />
                    </label></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Motivo:</strong></td>
                    <td><label>
                      <textarea name="motivo" cols="50" rows="3" id="motivo"></textarea>
                    </label></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Fecha de desbaneo: </strong></td>
                    <td><label>
                      <select name="ano" id="ano">
                        <option value="0" selected="selected">0 a&ntilde;os</option>
                        <option value="1">1 a&ntilde;o</option>
                        <option value="2">2 a&ntilde;os</option>
                        <option value="5">5 a&ntilde;os</option>
                        <option value="10">10 a&ntilde;os</option>
                      </select>
                      <select name="mes" id="mes">
                        <option value="0" selected="selected">0 meses</option>
                        <option value="1">1 mes</option>
                        <option value="2">2 meses</option>
                        <option value="3">3 meses</option>
                        <option value="4">4 meses</option>
                        <option value="5">5 meses</option>
                        <option value="6">6 meses</option>
                        <option value="7">7 meses</option>
                        <option value="8">8 meses</option>
                        <option value="9">9 meses</option>
                        <option value="10">10 meses</option>
                        <option value="11">11 meses</option>
                      </select>
                      <select name="dia" id="dia">
                        <option value="0">0 dias</option>
                        <option value="1">1 dia</option>
                        <option value="2">2 dias</option>
                        <option value="3">3 dias</option>
                        <option value="4">4 dias</option>
                        <option value="5">5 dias</option>
                        <option value="6">6 dias</option>
                        <option value="7">7 dias</option>
                      </select>
                      <select name="hora" id="hora">
                        <option value="1">1 hora</option>
                        <option value="2">2 horas</option>
                        <option value="6">6 horas</option>
                        <option value="12">12 horas</option>
                        <option value="24">24 horas</option>
                        <option value="36">36 horas</option>
                        <option value="48">48 horas</option>
                      </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><label>
                      <input type="submit" name="Submit" value="Banear" />
                    </label></td>
                  </tr>
                </table>
                </form>
              <p>
                  <?
			  $query_b = mysqli_query($conn, "SELECT * FROM banip");
			  if(!mysqli_num_rows($query_b)) {
			  	echo "No hay IPs baneadas";
			} else {
			while($ver_b = mysqli_fetch_array($query_b)) {
			?>
                </p>
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
                          <td width="17%" align="center"><?=$ver_b['ip'];?></td>
                          <td width="14%" align="center"><?=date('d-m-Y - H:m:s', $ver_b['fechaban']);?></td>
                          <td width="57%" align="center"><span class="Estilo1">
                            <?=$ver_b['motivo'];?>
                          </span></td>
                          <td width="12%" align="center"><a href="desbanearip.php?id=<?=$ver_b['id'];?>">Desbanear</a></td>
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
                <p>
                  <?
			}
			}
			?>
                </p></td>
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