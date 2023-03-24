<?
session_start();
include("conectar.php");
if(!isset($_SESSION['user'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="488" height="41" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td background="images/bg_menu.png"><table width="474" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td class="menu_letters"><strong>
                <?=ucfirst($_SESSION['user']);?>
              </strong><a href="?id=laurba" class="menu_letters"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?id=micuenta" class="menu_letters">Ajustes de la cuenta</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?id=miscasas" class="menu_letters">Mis salas</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php" class="menu_letters">Cerrar sesion</a></td>
            </tr>
        </table></td>
      </tr>
    </table>
      <br />
      <table width="488" height="104" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="13"><img src="images/up_table.png" width="488" height="13" /></td>
        </tr>
        <tr>
          <td height="78" background="images/middle_table.png"><table width="459" height="31" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="35" background="images/menubar_big.png"><div class="nick_letters">Crea tu casa ahora </div></td>
              </tr>
              <tr>
                <td><div align="justify">
                    <p>Puedes <strong>crear tu casa </strong>ahora de forma completamente gratuita <em>(recuerda que, como m&aacute;ximo, puedes crear 5 salas)</em>: </p>
                    <form id="form1" name="form1" method="post" action="">
                      <table width="95%" border="0" align="center">
                        <tr>
                          <td width="32%" align="right"><strong>Nombre de tu sala: </strong></td>
                          <td width="68%"><label>
                            <input name="name" type="text" id="name" size="35" maxlength="60" />
                          </label></td>
                        </tr>
                        <tr>
                          <td align="right"><strong>Usuarios maximos: </strong></td>
                          <td><label>
                            <select name="maxu">
							<?
							for($a=1;$a<=24;$a++) {
							?>
							 <option value="<?=$a;?>"><?=$a;?></option>
							<?
							}
							?>
                              <option value="25" selected="selected">25</option>
                            </select>
                          </label></td>
                        </tr>
                        <tr>
                          <td align="right"><strong>Contrase&ntilde;a:</strong></td>
                          <td><label>
                            <input name="pass" type="password" id="pass" />
                          </label></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center"><em>(Deja en blanco para no establecer contrase&ntilde;a)</em></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><input name="crearSala" type="submit" id="crearSala" value="Crear Sala" /></td>
                        </tr>
                      </table>
                    </form>
		<?
		if(isset($_POST['crearSala'])) {
			$name = $_POST['name'];
			$maxu = $_POST['maxu'];
			$pass = $_POST['pass'];
			$owner = $_SESSION['user'];
			if(trim($name) == NULL) {
			echo "<center><span style='color: red;'><b>El nombre de la sala no puede estar vacio</b></span></center>";
			} else if(mysqli_num_rows($queryC) >= 5) {
			echo "<center><span style='color: red;'><b>No puedes crear mas de 5 casas</b></span></center>";
			} else {
			@mysqli_query($conn, "INSERT INTO rooms (name, owner, maxu, muebles, color, suelo, pass) VALUES ('$name', '$owner', '$maxu', '', '1', '1', '$pass')");
			echo "<center><span style='color: blue;'><b>Tu sala se ha creado correctamente. Espera 1 segundo...</b></span></center>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php?id=miscasas">';
			}
		}
		?>
                    </div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td height="13"><img src="images/down_table.png" width="488" height="13" /></td>
        </tr>
      </table>      
      <br />
      <table width="488" height="104" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="13"><img src="images/up_table.png" width="488" height="13" /></td>
        </tr>
        <tr>
          <td height="78" background="images/middle_table.png"><table width="459" height="31" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="35" background="images/menubar_big.png"><div class="nick_letters">Tus casas </div></td>
              </tr>
              <tr>
                <td><div align="justify">
                    <p>Se muestra una <strong>lista de tus salas</strong>. Si has establecido <strong>contrase&ntilde;a, </strong>haz click en el <strong>candado</strong> para mostrarla<strong>.</strong>. Aqu&iacute; puedes, tambi&eacute;n, <strong>borrar las salas</strong> aunque ten en cuenta<strong style="color:Red;"> todo lo que haya en la sala</strong> <em>(pinturas y muebles)</em> <strong style="color:Red;">ser&aacute;n eliminados tambi&eacute;n. </strong></p>
                  <?
					while($verC = mysqli_fetch_array($queryC)) {
					if($verC['pass'] != NULL) {
					$imagen = "<a href=\"javascript:alert('Contrase&ntilde;a: ".$verC['pass']."');\"><img src=\"images/candado.png\" border=\"0\" /></a>";
					} else {
					$imagen = '<img src="images/candado2.png" border="0" />';
					}
					$query_ux = mysqli_query($conn, "SELECT * FROM users WHERE logueado='1' AND estoyen='".$verC['id']."'");
					if(!mysqli_num_rows($query_ux)) {
					$numerousers = "0";
					} else {
					$numerousers = mysqli_num_rows($query_ux);
					}
					?>
                    <table width="95%" border="0" align="center">
                      <tr>
                        <td width="6%" align="center"><?=$imagen;?></td>
                        <td width="94%"><?=$verC['name'];?>
                            <em>(
                              <?=$numerousers;?>
                              /
                              <?=$verC['maxu'];?>
                              ) </em>- <strong><a href="index.php?id=miscasas&borrar=<?=$verC['id'];?>" style="color:red;">[Eliminar]</a></strong></td>
                      </tr>
                    </table>
                  <?
					}
					?>
                </div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td height="13"><img src="images/down_table.png" width="488" height="13" /></td>
        </tr>
      </table></td>
    <td valign="top"><br />
      <table width="488" height="104" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="13"><img src="images/up_table.png" width="488" height="13" /></td>
      </tr>
      <tr>
        <td height="78" background="images/middle_table.png"><table width="459" height="31" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="35" background="images/menubar_big.png"><div class="nick_letters">Usuarios online</div></td>
            </tr>
            <tr>
              <td><div align="justify">
                  <p>Aqu&iacute; encontrar&aacute;s los primeros 20 usuarios que est&aacute;n conectados actualmente a la Urbanizaci&oacute;n, y en qu&eacute; sala est&aacute;n: </p>
                <table width="90%" border="0" align="center">
                    <tr>
                      <td width="28%" align="center" bgcolor="#FFFFFF"><strong>USUARIO</strong></td>
                      <td width="72%" align="center" bgcolor="#FFFFFF"><strong>SALA</strong></td>
                    </tr>
                    <?
					  $query_s = mysqli_query($conn, "SELECT * FROM users WHERE logueado='1' LIMIT 0,20");
					  if(!mysqli_num_rows($query_s)) {
					  ?>
                    <tr>
                      <td align="center" bgcolor="#FFFFFF" colspan="2"><strong><span style="color:red;">No hay usuarios conectados</span></strong></td>
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
                      <td align="center" bgcolor="#FFFFFF"><?=$ver_s['nombre'];?></td>
                      <td align="center" bgcolor="#FFFFFF"><em>
                        <?=$nombresala;?>
                      </em></td>
                    </tr>
                    <?
					  }
					  }
					  ?>
                  </table>
              </div></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="13"><img src="images/down_table.png" width="488" height="13" /></td>
      </tr>
    </table>
      <br />
	  <?
	  if(isset($_GET['borrar'])) {
	  	if($_GET['confirmar'] == "yes") {
	  		$queryDelete = mysqli_query($conn, "SELECT * FROM rooms WHERE id='".$_GET['borrar']."'");
	  		$verDelete = mysqli_fetch_array($queryDelete);
	  		if($verDelete['owner'] == $_SESSION['user']) {
	  			@mysqli_query($conn, "DELETE FROM rooms WHERE id='".$_GET['borrar']."'");
	  		}
		 echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?id=miscasas">';
	  }
	  ?>
      <table width="488" height="104" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="13"><img src="images/up_table.png" width="488" height="13" /></td>
        </tr>
        <tr>
          <td height="78" background="images/middle_table.png"><table width="459" height="31" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="35" background="images/menubar_big_red.png"><div class="nick_letters">Borrar una casa </div></td>
              </tr>
              <tr>
                <td><div align="justify">
                    <p>Estas seguro de querer eliminar esa casa?</p>
                    <table width="200" border="0" align="center">
                      <tr>
                        <td align="center"><strong><a href="index.php?id=miscasas" style="color:blue;">[Cancelar]</a></strong></td>
                        <td align="center"><strong><a href="index.php?id=miscasas&borrar=<?=$_GET['borrar'];?>&confirmar=yes" style="color:red;">[Eliminar]</a></strong></td>
                      </tr>
                    </table>
                    </div></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td height="13"><img src="images/down_table.png" width="488" height="13" /></td>
        </tr>
      </table>
	  <?
	  }
	  ?></td>
  </tr>
</table>