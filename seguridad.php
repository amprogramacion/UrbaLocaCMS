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
    <div class="titulocuadro"><span class="nick_letters">Seguridad en UrbaLoca</span></div>
    <div class="contenidocuadro">
      <p><strong>&iquest;Qu&eacute; es UrbaLoca?</strong></p>
      <p><span style="text-align: justify">UrbaLoca es una comunidad online gratuita para conocer gente y pasartelo bien. No es un chat de sexo ni contactos.</span><br />
        <br />
        <strong>&iquest;Es Urba-Loca una copia?</strong></p>
      <p style="text-align: justify">No, toda la programaci&oacute;n y el dise&ntilde;o de UrbaLoca est&aacute; dise&ntilde;ado por nuestros Staffs <strong>Escavo</strong> <em>(Web y programaci&oacute;n)</em> y<strong> Rafa</strong> <em>(programacion In-game)</em> por lo que no hemos copiado a ning&uacute;n otro juego. Contamos con servidor propio 24 horas, <strong>por lo que tus datos estar&aacute;n siempre seguros</strong>. </p>
      <p><strong>&iquest;Qui&eacute;nes son los Moderadores?</strong></p>
      <p style="text-align: justify">Los moderadores son usuarios especiales con poderes dentro del juego,  que te podr&aacute;n sancionar si dices palabrotas, insultas a otro usuario, buscas contactos sexuales... Tienen una placa especial. No te f&iacute;es de un usuario que te diga que es Moderador y no te ense&ntilde;e su placa.</p>
      <p><strong>&iquest;C&oacute;mo puedo ser Moderador?</strong></p>
      <p style="text-align: justify">Para ser Moderador, tienes que ponerte en contacto con nosotros, en el enlace inferior o haciendo <a href="contacto" title="UrbaLoca - Contacta con Nosotros"><strong>click aqui</strong></a>. </p>
      <p><span style="text-align: justify"><strong>¿Que &eacute;s un Gu&iacute;a y c&oacute;mo puedo entrar en el equipo?</strong><br />
        Los Gu&iacute;as son los <strong>usuarios expertos en UrbaLoca </strong>que ayudan a los dem&aacute;s usuarios.<strong> Tienen una placa especial </strong>aunque<strong> no tienen poderes</strong> dentro del juego. <strong>Los buenos Gu&iacute;as podr&aacute;n promocionar a Moderador pasado un tiempo. </strong></span></p>
    </div>
  </div>
</div>






<div class="columna2"><br />
  <div class="cuadro1">
    <div class="titulocuadro">Quienes son los Moderadores?</div>
    <div class="contenidocuadro">
      <p><a href="contacto" title="UrbaLoca - Contacta con Nosotros"><img src="images/contact.png" width="144" height="132"  style="float:left;" alt="UrbaLoca - Contacta con Nosotros" /></a>Dentro de la Urbanizaci&oacute;n existen<strong> Staffs, Moderadores y Gu&iacute;as</strong>. Todos ellos forman un gran equipo para<strong> protegerte de los malos usuarios</strong> y<strong> resolver tus dudas</strong>.</p>
      <p>Si<strong> alguien te molesta</strong> en <strong>UrbaLoca</strong>, haznoslo saber. El <strong>equipo de Moderaci&oacute;n</strong> tomar&aacute; <strong>medidas</strong> al respecto. Ellos son:</p>
      <table width="100%"  >
        <tr>
          <td width="5%"><img src="img/badges/ADM.png" width="44" height="44" alt="" /></td>
          <td width="20%" ><strong>Administradores</strong></td>
          <td width="75%">Son los creadores de UrbaLoca, se encargan de que todo funcione correctamente. <strong>Escavo. </strong></td>
        </tr>
        <tr>
          <td><img src="img/badges/MOD.png" width="44" height="44"  alt=""/></td>
          <td ><strong>Moderadores</strong></td>
          <td>Son usuarios con poderes dentro de UL que pueden expulsar a los usuarios. <strong>No hay moderadores. </strong></td>
        </tr>
        <tr>
          <td><img src="img/badges/GUI.png" width="44" height="44"  alt=""/></td>
          <td ><strong>Gu&iacute;as</strong></td>
          <td>Usuarios expertos en UrbaLoca. Preg&uacute;ntales a ellos tus dudas. <strong>No hay guias. </strong></td>
        </tr>
      </table>
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
</div>
<br style="clear: all" /><br /><br /><br /><br /><br />