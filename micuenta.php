<?
session_start();
include("conectar.php");
if(!isset($_SESSION['user'])) {
die("No puedes estar aqui.");
}
?>
<div class="columna1">
 <?
include("bloquelogin.php");
?>
  <p><br />
  </p>
<div class="cuadro1">
<div class="titulocuadro"><span class="nick_letters">Cambia tu contrase&ntilde;a</span></div>
<div class="contenidocuadro">
  <p>Aqu&iacute; puedes <strong>cambiar tu contrase&ntilde;a</strong>. Por tu seguridad, la contrase&ntilde;a debe tener m&aacute;s de 6 caracteres, y te recomendamos que contenga numeros y letras: </p>
  <form id="form3" name="form1" method="post" action="">
    <table width="100%" border="0" align="center">
      <tr>
        <td width="221" align="right"><strong>Antigua contrase&ntilde;a: </strong></td>
        <td width="228"><label>
          <input name="pass2" type="password" id="pass2" />
        </label></td>
      </tr>
      <tr>
        <td align="right"><strong>Nueva contrase&ntilde;a: </strong></td>
        <td><input name="npass3" type="password" id="npass3" /></td>
      </tr>
      <tr>
        <td align="right"><strong>Repite nueva contrase&ntilde;a: </strong></td>
        <td><input name="npass3" type="password" id="npass4" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="cambiarPass2" type="submit" id="cambiarPass2" value="Cambiar contrase&ntilde;a" />
        </label></td>
      </tr>
    </table>
  </form>
  <?
	if(isset($_POST['cambiarPass'])) {
	$pass = $_POST['pass'];
	$npass = $_POST['npass'];
	$npass2 = $_POST['npass2'];
	$query = mysqli_query($conn, "SELECT * FROM users WHERE nombre='".$_SESSION['user']."'");
	$ver = mysqli_fetch_array($query);
	if($ver['pass'] != md5(md5($pass))) {
	echo "<div style='color:red'><center><strong>La contrase&ntilde;a actual no coincide</strong></center></div>";
	} elseif($npass != $npass2) {
	echo "<div style='color:red'><center><strong>Las nuevas contrase&ntilde;as no coinciden</strong></center></div>";
	} else {
	@mysqli_query($conn, "UPDATE users SET codeact='".md5(rand(111111, 999999))."' WHERE nombre='".$_SESSION['user']."'");
	@mysqli_query($conn, "UPDATE users SET pass='".md5(md5($npass))."' WHERE nombre='".$_SESSION['user']."'");
	echo "<div style='color:blue'><center><strong>La nueva contrase&ntilde;a se ha actualizado con exito.</strong></center></div>";
	}
	}
	?>
</div>
</div><br />
<div class="cuadro1">
<div class="titulocuadro"><span class="nick_letters">Cambia tu mision</span></div>
<div class="contenidocuadro">
  <p>Cambia tu mision para que todo el mundo sepa lo que piensas! </p>
  <form id="form2" name="form1" method="post" action="">
    <table width="100%" border="0" align="center">
      <tr>
        <td width="117" align="right"><strong>Tu mision : </strong></td>
        <td width="332"><input name="mision2" type="text" id="mision2" size="35" maxlength="255" value="<?=$verB['mision'];?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="cambiarMision2" type="submit" id="cambiarMision2" value="Cambiar mision" />
        </label></td>
      </tr>
    </table>
  </form>
  <?
	if(isset($_POST['cambiarMision'])) {
	$mision = $_POST['mision'];
	@mysqli_query($conn, "UPDATE users SET mision='$mision' WHERE nombre='".$_SESSION['user']."'");
	echo "<div style='color:blue'><center><strong>Tu mision se ha actualizado. Espera 1 segundo...</strong></center></div>";
	echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php?id=micuenta">';
	}
	?>
</div>
</div><br />
<div class="cuadro1">
<div class="titulocuadro"><span class="nick_letters">Cambia tu placa </span></div>
<div class="contenidocuadro">
  <div align="justify">
    <p>Cambia la <strong>placa</strong> que llevas <strong>puesta</strong>:  
  </div>
  <?
					  $misplacas2 = $verB['placas'];
					  if($misplacas2 == NULL) {
					  echo '<span style="color:red;"><b>No tienes placas</b></span>';
					  } else {
					  $explode_placas2 = explode(";", $misplacas2);
					  $count_placas2 = count($explode_placas2);
					  for($a=0;$a<$count_placas2;$a++) {
					  if($verB['puesta'] == $explode_placas2[$a]) {
					  	$style = " border: 2px solid red;";
					  } else {
					  	$style = "";
					}
					  ?>
  <a href="cambiarplacapuesta.php?id=<?=$explode_placas2[$a];?>">
  <div style="margin: 5px 5px 5px 5px; padding: 5px 5px 5px 5px; height: 45px; width: 45px; float:left;<?=$style;?>"><img src="img/badges/<?=$explode_placas2[$a];?>.png" border="0" /></div>
  </a>
  <?
					  }
					  }
					  ?>
  </p><br style="clear: all;" /><br /><br /><br />
</div>
</div>
</div>


<div class="columna2">
<div class="cuadro1">
<div class="titulocuadro">Hola <?=ucfirst($_SESSION['user']);?>, estos son tus datos!</div>
<div class="contenidocuadro">
  <p>A continuaci&oacute;n se muestra un <strong>resumen de tu perfil </strong>en UrbaLoca: </p>
  <table width="95%" border="0" align="center">
    <tr>
      <td width="24%" rowspan="10" align="center" valign="top"><table width="98" border="0">
        <tr>
          <td width="32"><img src="imager/?user=<?=$_SESSION['user'];?>" title="&Eacute;st@ eres t&uacute;" /></td>
          <td width="152" align="center"><?
							if($verB['puesta'] != NULL) {
							if($verB['visible'] == "1") {
							$rutaplaca = "img/badges/".$verB['puesta'].".png";
							} else {
							$rutaplaca = "img/badges/".$verB['puesta']."_0.png";
							}
							?>
            <a href="ocultarplaca.php"><img src="<?=$rutaplaca;?>" border="0" alt="Haz click para ocultar/mostrar tu placa" /></a>
            <?
							}
							?></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><em>Haz click en tu placa para ocultarla o hacerla visible</em></td>
        </tr>
      </table></td>
      <td width="27%" align="right"><strong>Usuario:</strong></td>
      <td width="49%"><?=ucfirst($verB['nombre']);?></td>
    </tr>
    <tr>
      <td align="right"><strong>Email:</strong></td>
      <td><?=$verB['email'];?></td>
    </tr>
    <tr>
      <td align="right"><strong>Contrase&ntilde;a:</strong></td>
      <td>******</td>
    </tr>
    <tr>
      <td align="right"><strong>Fecha de nacimiento: </strong></td>
      <td><?=$verB['fnac'];?></td>
    </tr>
    <tr>
      <td align="right"><strong>Subscripci&oacute;n VIP: </strong></td>
      <td><?
					$fecha_vip = date('d-m-Y', $verB['vip']);
			  		if($verB['vip'] != NULL && ($verB['vip'] >= time())) {
					?>
        <span style="color:blue;">Eres VIP hasta el <b>
          <?=$fecha_vip;?>
          </b></span>
        <?
					} else {
					?>
        <span style="color:red;"><b>No eres miembro VIP</b></span>
        <?
					}
					?></td>
    </tr>
    <tr>
      <td align="right"><strong>Misi&oacute;n:</strong></td>
      <td><i>
        <?=$verB['mision'];?>
      </i></td>
    </tr>
    <tr>
      <td align="right"><strong>Estado:</strong></td>
      <td><?
					  $logueado = $verB['logueado'];
					  if($logueado == "0") {
					  echo '<span style="color:red;"><b>Est&aacute;s Offline</b></span>';
					  } else {
					  echo '<span style="color:blue;"><b>Est&aacute;s Online</b></span>';
					  }
					  ?></td>
    </tr>
  </table>
</div>
</div><br />
<div class="cuadro1">
<div class="titulocuadro"><span class="nick_letters">Usuarios online</span></div>
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