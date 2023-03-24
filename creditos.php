<?
session_start();
include("conectar.php");
?>
<div class="columna1">
  <?
include("bloquelogin.php");
?>
  <p><br />
  </p>
  <div class="cuadro1">
    <div class="titulocuadro"><span class="nick_letters">La moneda de UrbaLoca</span></div>
    <div class="contenidocuadro">
      <p><strong>&iquest;Para qu&eacute; valen los cr&eacute;ditos o LOKS?</strong></p>
      <p >Los <strong>loks</strong> valen para <strong>comprar muebles, decorar tu sala, hacerte del club vip o comprar ropa.</strong> No es imprescindible que los compres, pues <strong>ahora en UrbaLoca, puedes conseguirlos participando en concursos o eventos de forma gratuita. </strong></p>
      <p>Si tienes alguna duda o te surge alg&uacute;n problema t&eacute;cnico, ponte en contacto con nuestro equipo.</p>
    </div>
  </div>
</div>


<div class="columna2"><br />
  <br />
  <div class="cuadro1">
    <div class="titulocuadro">Como se consiguen las fichas o Loks en UL</div>
    <div class="contenidocuadro">
      <p>Por el momento, las fichas se consiguen de forma gratu&iacute;ta dado que todav&iacute;a no ha salido la versi&oacute;n Estable de UL. Puedes conseguir 100 cr&eacute;ditos cuando tu monedero tenga 20 o menos fichas.</p>
      <p>
        <?=$boton;?>
      </p>
    </div>
  </div>
  <br />
  <br />
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
					  $query_s = mysql_query("SELECT * FROM users WHERE logueado='1' LIMIT 0,20");
					  if(!mysql_num_rows($query_s)) {
					  ?>
        <tr>
          <td  style="background-color: #FFFFFF;" colspan="2"><strong><span style="color:red;">No hay usuarios conectados</span></strong></td>
        </tr>
        <?
					  } else {
					  while($ver_s = mysql_fetch_array($query_s)) {
					  $query_n = mysql_query("SELECT * FROM rooms WHERE id='".$ver_s['estoyen']."'");
					  $ver_n = mysql_fetch_array($query_n);
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

</div>

<br /><br /><br /><br /><br /><br />