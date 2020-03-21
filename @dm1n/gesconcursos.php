<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
if(isset($_POST['Submit'])) {
	$titulo = $_POST['titulo'];
	$fecha = $_POST['fecha'];
	$texto = $_POST['texto'];
	@mysql_query("INSERT INTO concursos (titulo, fecha, texto) VALUES ('$titulo', '$fecha', '$texto')");
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=gesconcursos">';
}
?>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
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
        <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Gestionar concursos Web </td>
        <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
          <tr>
            <td><p>A&ntilde;adir, editar o eliminar un concurso web:</p>
              <form id="form1" name="form1" method="post" action="">
                <table width="555" border="0" align="center">
                  <tr>
                    <td width="108" align="right"><strong>Titulo:</strong></td>
                    <td width="437"><label>
                      <input name="titulo" type="text" id="titulo" />
                    </label></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Fecha:</strong></td>
                    <td><label>
                      <input name="fecha" type="text" id="fecha" value="<?=date("d/m/Y");?>" />
                    </label></td>
                  </tr>
                  <tr>
                    <td height="184" align="right"><strong>Texto:</strong></td>
                    <td><label>
                      <textarea name="texto" cols="70" rows="10" id="texto"></textarea>
                      <input type="submit" name="Submit" value="Enviar" />
                    </label></td>
                  </tr>
                </table>
                  </form>
<?
$query = mysql_query("SELECT * FROM concursos ORDER BY id DESC");
while($ver = mysql_fetch_array($query)) {
?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="10" align="right" valign="bottom"><img src="img/cuadradogris/supiz.png" width="10" height="10" /></td>
                  <td width="1194" style="background-image:url(img/cuadradogris/medsup.png); background-repeat:repeat-x; background-position:bottom;">&nbsp;</td>
                  <td width="12" align="left" valign="bottom"><img src="img/cuadradogris/supder.png" width="10" height="10" /></td>
                </tr>
                <tr>
                  <td style="background-image:url(img/cuadradogris/mediz.png); background-repeat:repeat-y; background-position:right;">&nbsp;</td>
                  <td bgcolor="#DADADA"><table width="100%" border="0">
                    <tr>
                      <td width="75%"><?=$ver['titulo'];?> - <b><i><?=$ver['fecha'];?></i></b></td>
                      <td width="25%" align="right">[Editar] - <a href="eliminarconcurso.php?id=<?=$ver['id'];?>">[Eliminar]</a></td>
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
?>



			  
			                </td>
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