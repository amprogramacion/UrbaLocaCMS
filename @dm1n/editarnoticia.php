<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
$noticia = $_GET['noticia'];
$query = mysqli_query($conn, "SELECT * FROM noticias WHERE id='$noticia'");
$ver = mysqli_fetch_array($query);
if(isset($_POST['Submit'])) {
	$titulo = $_POST['titulo'];
	$fecha = $_POST['fecha'];
	$descripcion = $_POST['descripcion'];
	$texto = $_POST['texto'];
	@mysqli_query($conn, "UPDATE noticias SET titulo='$titulo' WHERE id='$noticia'");
	@mysqli_query($conn, "UPDATE noticias SET fecha='$fecha' WHERE id='$noticia'");
	@mysqli_query($conn, "UPDATE noticias SET descripcion='$descripcion' WHERE id='$noticia'");
	@mysqli_query($conn, "UPDATE noticias SET texto='$texto' WHERE id='$noticia'");
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=editarnoticia&noticia='.$noticia.'">';
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
        <td width="98%" align="center" bgcolor="#FF5353" style="text-shadow: 0.11em 0.11em #333; color:#FFFFFF; font-weight:bold;">Editar una  noticia Web </td>
        <td width="1%" align="left"><img src="img/rojo/celda_sup_der.png" width="7" height="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="7">
          <tr>
            <td><p>A&ntilde;adir, editar o eliminar una noticia web:</p>
              <form id="form1" name="form1" method="post" action="">
                <table width="555" border="0" align="center">
                  <tr>
                    <td width="108" align="right"><strong>Titulo:</strong></td>
                    <td width="437"><label>
                      <input name="titulo" type="text" id="titulo" value="<?=$ver['titulo'];?>" />
                    </label></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Fecha:</strong></td>
                    <td><label>
                      <input name="fecha" type="text" id="fecha" value="<?=$ver['fecha'];?>" />
                    </label></td>
                  </tr>
                  <tr>
                    <td height="85" align="right"><strong>Descripcion:</strong></td>
                    <td>
                      <textarea name="descripcion" cols="70" rows="5" id="descripcion"><?=$ver['descripcion'];?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td height="184" align="right"><strong>Texto:</strong></td>
                    <td><textarea name="texto" cols="70" rows="10" id="texto"><?=$ver['texto'];?></textarea>
                      <input type="submit" name="Submit" value="Enviar" /></td>
                  </tr>
                </table>
                  </form>
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