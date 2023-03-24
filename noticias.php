<?
session_start();
include("conectar.php");
?>
<div class="columna1">
<?
include("bloquelogin.php");
?>
<p>&nbsp;</p>
<div class="cuadro1">
<div class="titulocuadro">Todas las noticias</div>
<div class="contenidocuadro">
<?
$query_noticias = mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 0,2");
				  while($ver_noticias = mysql_fetch_array($query_noticias)) {
				  ?>
				  <strong class="menu_letters"><?=strtoupper($ver_noticias['titulo']);?></strong><br />
                    <strong><span class="azulOscuro"><a href="noticias-<?=$ver_noticias['id'];?>" title="<?=strtoupper($ver_noticias['titulo']);?>">LEER NOTICIA &gt;&gt; </a></span></strong>
					<?
					}
					?>
      
 </div>
</div>
</div>

<div class="columna2">
<?
if(!isset($_GET['noticia'])) {
?>
<div class="cuadro1">
<div class="titulocuadro">Selecciona una noticia de la izquierda</div>
<div class="contenidocuadro">
Por favor selecciona una noticia de la izquierda para leerla.
 </div>
</div>
<?
} else {
	$noticia = addslashes($_GET['noticia']);
	$query_noticias2 = mysql_query("SELECT * FROM noticias WHERE id='".$noticia."'");
	if(!mysql_num_rows($query_noticias2)) {
		?>
        <div class="cuadro1">
<div class="titulocuadro">La noticia no existe</div>
<div class="contenidocuadro">
La noticia a la que intentas acceder no existe.
 </div>
</div>
        <?
	} else {
		$ver_noticias2 = mysql_fetch_array($query_noticias2);
		?>
        <div class="cuadro1">
<div class="titulocuadro"><?=strtoupper($ver_noticias2['titulo']);?></div>
<div class="contenidocuadro">
<p><?=$ver_noticias2['descripcion'];?></p>
<p><?=$ver_noticias2['texto'];?></p>
 </div>
</div>
<?
	}
}
?>
</div>