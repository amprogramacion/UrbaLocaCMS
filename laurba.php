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
<div class="titulocuadro">El nuevo catalogo online</div>
<div class="contenidocuadro">
<p>&iquest;Has visto ya el <strong>nuevo cat&aacute;logo online</strong>? Es un nuevo sistema, con el cual podr&aacute;s <strong>comprar muebles en UL sin necesidad de conectarte a la urbanizaci&oacute;n</strong>. El sistema se encuentra en fase Beta, por favor, te rogamos que si encuentras alg&uacute;n problema nos lo comuniques lo antes posible; <strong>tu ayuda tiene premio. </strong></p>
<p><strong style="color: #FF0004">Por el momento, esta opcion se encuentra deshabilitada.</strong></p>
 </div>
</div>
</div>








<div class="columna2">
<div class="cuadro1">
  <div class="titulocuadro">Comunidad de UrbaLoca</div>
<div class="contenidocuadro">
<p><img src="img/avatar_test.png" width="96" height="96"  style="float:left; padding-right: 5px; padding-bottom: 5px;" alt="Avatar"/>Bienvenido a la secci&oacute;n de Comunidad. Aqu&iacute; encontrar&aacute;s concursos, eventos e informaci&oacute;n de inter&eacute;s.<br />
</p>
<p>Estate atento a esta pagina para estar a la ultima. </p><br style="clear: all;" />
 </div>
</div>
      <p>&nbsp;</p>
      <div class="cuadro1">
  <div class="titulocuadro">Concursos y Eventos</div>
<div class="contenidocuadro">
<?
				  $query_noticias = mysqli_query($conn, "SELECT * FROM concursos ORDER BY id DESC LIMIT 0,2");
				  while($ver_noticias = mysqli_fetch_array($query_noticias)) {
				  ?>
				  <strong class="menu_letters"><?=strtoupper($ver_noticias['titulo']);?></strong><br />
                    <span style="text-align:justify;"><?=$ver_noticias['texto'];?></span>
					<?
					}
					?>
      <strong><span class="azulOscuro"><a href="web.php?id=concursos">VER TODO &gt;&gt; </a></span></strong>
 </div>
</div>
      <p>&nbsp;</p>
      <div class="cuadro1">
  <div class="titulocuadro">Usuarios online</div>
<div class="contenidocuadro">
  <p>Aqu&iacute; encontrar&aacute;s los primeros 20 usuarios que est&aacute;n conectados actualmente a la Urbanizaci&oacute;n, y en qu&eacute; sala est&aacute;n: </p>
  <table width="90%"  >
    <tr>
      <td width="28%"  style="background-color: #FFFFFF;"><strong>USUARIO</strong></td>
      <td width="72%"  style="background-color: #FFFFFF;"><strong>SALA</strong></td>
    </tr>
    <?
					  $query_s = mysqli_query($conn, "SELECT * FROM users WHERE logueado='1' LIMIT 0,20");
					  if(!mysqli_num_rows($query_s)) {
					  ?>
    <tr>
      <td  style="background-color: #FFFFFF;" colspan="2"><strong><span style="color:red;">No hay usuarios conectados</span></strong></td>
    </tr>
    <?
					  } else {
					  while($ver_s = mysqli_fetch_array($query_s)) {
					  $query_n = mysqli_query($conn, "SELECT * FROM rooms WHERE id='".$ver_s['estoyen']."'");
					  $ver_n = mysqli_fetch_array($query_n);
					  if($ver_n['name'] == NULL) {
					  $nombresala = "Lobby Principal";
					  } else {
					  $nombresala = $ver_n['name'];
					  }
					  ?>
    <tr>
      <td  style="background-color: #FFFFFF;"><?=$ver_s['nombre'];?></td>
      <td  style="background-color: #FFFFFF;"><em>
        <?=$nombresala;?>
      </em></td>
    </tr>
    <?
					  }
					  }
					  ?>
  </table>
</div>
</div>
</div><br /><br /><br /><br /><br /><br />
