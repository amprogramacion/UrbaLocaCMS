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
        <div class="titulocuadro">Club VIP</div>
        <div class="contenidocuadro"> <strong>&iquest;Qu&eacute; es el club Vip?</strong><br />
          Es un club exclusivo de UrbaLoca donde tendr&aacute;s una placa, acceso exclusivo a salas VIP, descuentos en el cat&aacute;logo y mucho m&aacute;s...<br />
          <br />
          <strong>&iquest;Cuanto cuesta el club VIP?</strong><br />
          Hacerse socio del club Vip cuesta solo 20 loks. Adem&aacute;s, tendr&aacute;s m&aacute;s ventajas sobre otros usuarios como colores de sala exclusivos, placa del club, etc...<br />
          <br />
          <?
					$fecha_vip = date('d-m-Y', $verB['vip']);
			  		if($verB['vip'] != NULL && ($verB['vip'] >= time())) {
					?>
          <strong>Actualmente ya est&aacute;s suscrito al club VIP de Urbaloca.<br />
            <span class="azulOscuro">Tu suscripci&oacute;n finaliza el
              <?=$fecha_vip;?>
              .</span></strong>
          <?
					  } else {
					  ?>
          <strong>Actualmente no est&aacute;s suscrito al club VIP de Urbaloca.<br />
            <span class="azulOscuro">Puedes hacerte del Clup VIP haciendo click en el bot&oacute;n:</span><br />
            <br />
            <?
						if(!isset($_SESSION['user'])) {
							?>
            <span style="color: red; font-weight:bold; text-align:center">Debes iniciar sesion o registrarte para hacerte socio VIP</span>
            <?
						} else {
						?>
            <a href="comprarvip.php" title="UrbaLoca - Comprar suscripcion VIP por 20 loks (1 mes)" style="text-align:center;"><img src="images/buttonbgcomprarvip.png" style="border: 0px;" alt="UrbaLoca - Comprar suscripcion VIP por 20 loks (1 mes)" /></a>
            <?
						}
					  }
					  if($_GET['estado'] == "loks") {
					  echo "<br><center><span style='color:red;'>Lo sentimos, pero no tienes loks suficientes para comprar una subscripcion Vip.</span></center>";
					  } else if($_GET['estado'] == "miembro") {
					  echo "<br><center><span style='color:red;'>Ya estas subscrito al Club Vip.</span></center>";
					  } else if($_GET['estado'] == "ok") {
					  echo "<br><center><span style='color:blue;'>Bienvenido al Club Vip, ya tienes tu placa y puedes disfrutar de las ofertas del ser un loko exclusivo!</span></center>";
					  }
					  ?>
            <a href="#" name="abajo">&nbsp;</a></strong></div>
    </div>
</div>


<div class="columna2">
<br />
<div class="cuadro1">
<div class="titulocuadro">Noticias y Novedades</div>
<div class="contenidocuadro">
<?
				  $query_noticias = mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 0,2");
				  while($ver_noticias = mysql_fetch_array($query_noticias)) {
				  ?>
				  <strong class="menu_letters"><?=strtoupper($ver_noticias['titulo']);?></strong><br />
                    <span style="text-align:justify;"><?=$ver_noticias['descripcion'];?></span>
					<?
					}
					?>
      <strong><span class="azulOscuro"><a href="noticias" title="UrbaLoca - Noticias de UrbaLoca">VER TODO &gt;&gt; </a></span></strong>
 </div>
</div>

<br />



<div class="cuadro1">
<div class="titulocuadro">&iquest;Tienes alguna duda? &iexcl;Contacta con nosotros!</div>
<div class="contenidocuadro">
<p><a href="contacto" title="UrbaLoca - Contacta con Nosotros"><img src="images/contact.png" width="144" height="132" style="border: 0px; float: left; " alt="UrbaLoca - Contacta con Nosotros" /></a>Si tienes <strong>alguna duda</strong> o pregunta acerca del <strong>funcionamiento de UrbaLoca</strong>, puedes acceder al nuevo ayudante de Urbaloca. Es un sistema que, adem&aacute;s de permitirte <strong>contactar con nosotros</strong>, te puede <strong>resolver tus dudas</strong> si eres nuevo en la urbanizaci&oacute;n.</p>
  <p>Y no solo eso, tambien encontrar&aacute;s <strong>tutoriales</strong> para saber c&oacute;mo usar correctamente la p&aacute;gina web y los <strong>servicios</strong> que &eacute;sta te ofrece.</p><br style="clear: all;" />
</div>
</div>
<br />




<div class="cuadro1">
<div class="titulocuadro">Usuarios online</div>
<div class="contenidocuadro">
<p>Aqu&iacute; encontrar&aacute;s los primeros 20 usuarios que est&aacute;n conectados actualmente a la Urbanizaci&oacute;n, y en qu&eacute; sala est&aacute;n: </p>
                    <table width="90%" style="border: 0px; text-align:center;">
                        <tr>
                          <td width="28%" style="background-color: #FFFFFF; text-align:center;"><strong>USUARIO</strong></td>
                          <td width="72%" style="background-color: #FFFFFF; text-align:center;"><strong>SALA</strong></td>
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
                          <td style="background-color: #FFFFFF; text-align:center;"><?=$ver_s['nombre'];?></td>
                          <td style="background-color: #FFFFFF; text-align:center;"><em>
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
<p><br /><br />
</p>
