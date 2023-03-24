<form name="form1" method="post" action="">
  <table width="450" border="0" cellspacing="0" cellpadding="0" style="margin-left:50px;">
  <tr>
    <td height="76"><p>&nbsp;</p>
      <p><img src="images/login_title.png" width="355" height="55" /><br />
        <br />
      </p>
      <?
      if(isset($_POST['Submit2'])) {
	$user2 = $_POST['user2'];
	$pass2 = $_POST['pass2'];
	$pass22 = $_POST['pass22'];
	$email2 = $_POST['email2'];
	$email_separar2 = explode(".", $email2);
	$email_count2 = count($email_separar2);
	$email_cual2 = $email_count2-1;
	if($email_separar2[$email_cual2] == "ru") {
		$ip2 = $_SERVER['REMOTE_ADDR'];
		$tiempo2 = strtotime("+2 years");
		$motivo2 = "&#1042;&#1099; &#1073;&#1099;&#1083;&#1080; &#1079;&#1072;&#1087;&#1088;&#1077;&#1097;&#1077;&#1085;&#1099;, &#1079;&#1072;&#1088;&#1077;&#1075;&#1080;&#1089;&#1090;&#1088;&#1080;&#1088;&#1086;&#1074;&#1072;&#1074;&#1096;&#1080;&#1089;&#1100; &#1085;&#1072; &#1089;&#1072;&#1081;&#1090;&#1077; &#1085;&#1077;&#1089;&#1072;&#1085;&#1082;&#1094;&#1080;&#1086;&#1085;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1085;&#1099;&#1077;.<br><brHas sido expulsado de UrbaLoca por registrarte con un correo no autorizado.<br><br>You have been banned by registering on an unauthorized site.";
		@mysql_query("INSERT INTO banip (ip, tiempo, motivo) VALUES ('$ip2', '$tiempo2', '$motivo2')");
	} else {
		if($user2==NULL || strlen($pass2) <= 5 || $email2 == NULL) {
			echo '<div class="error">Todos los campos son obligatorios/La contrase&ntilde;a debe tener un minimo de 6 caracteres.</div>';
		} else {
			$query_user2 = mysql_query("SELECT * FROM users WHERE nombre='".$user2."'");
			if(mysql_num_rows($query_user2)) {
				echo '<div class="error">Ese nombre de usuario ya esta ocupado.</div>';
			} else {
				$query_email2 = mysql_query("SELECT * FROM users WHERE email='".$email2."'");
				if(mysql_num_rows($query_email2)) {
					echo '<div class="error">Ese email ya esta registrado en UrbaLoca.</div>';
				} else {
					if($pass2 != $pass22) {
						echo '<div class="error">Las contrase&ntilde;as no coinciden.</div>';
					} else {
						$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
						if($resp->isSuccess()) {
							$codeact2 = md5(md5(rand(1, 999999).$pass2.$email2));
							$pass32 = md5(md5($pass));
							@mysql_query("INSERT INTO users (nombre, pass, fnac, baneado, rango, fichas, email, activado, codeact, placas, puesta, visible) VALUES ('$user2', '$pass32', '$fnac2', '0', 'USR', '100', '$email2', '0', '$codeact2', '', '', '1')");
							mail("$email", "UrbaLoca - Activacion de Cuenta", "Hola loko!\n\nTe has registrado en UrbaLoca correctamente pero, para poder usar tu cuenta, es necesario que nos verifiques esta direccion de email. Haz click en el enlace que te proporcionamos a continuacion para activarla:\n\nhttp://www.urbaloca.es/activar.php?user=$user&codeact=$codeact\n\nUna vez la actives, podras iniciar sesion en nuestra web, http://www.urbaloca.es\n\nNo respondas a este correo, no se revisan las respuestas.", "From: noreply@urbaloca.es");
							echo '<div class="correcto">Te acabas de <strong>registrar correctamente</strong> en <strong>UrbaLoca</strong>. Hemos enviado un email con el <strong>link de activacion</strong> a la cuenta proporcionada. Debes <strong>activar tu correo electronico</strong> para poder <strong>iniciar sesion</strong> en la  Urbanizacion. Hasta entonces, solo tendras acceso a la web. Espera...</div>';
							$_SESSION['user'] = $user2;
							$_SESSION["pass"] = $pass32;
							@mysql_query("UPDATE users SET ip='".$_SERVER['REMOTE_ADDR']."' WHERE nombre='$user2'");
							echo '<META HTTP-EQUIV="Refresh" CONTENT="5; URL=index.php">';
						} else {
							echo '<div class="error">El codigo de verificacion humana es incorrecto.</div>';
						}
					}
				}
			}
		}
	}
	echo "<br />";
}
?></td>
  </tr>
  <tr>
    <td height="72"><table width="436" height="42" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td background="images/login_box.png"><label></label>
                <table width="412" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="images/usuario.png" width="110" height="16"/></td>
                    <td><div align="right">
                        <input name="user2" type="text" class="campoLogin" id="user2" size="40" />
                    </div></td>
                  </tr>
              </table></td>
          </tr>
        </table>
        <br />
        <table width="436" height="42" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td background="images/login_box.png">
          <table width="412" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="images/email.png" width="70" height="16"/></td>
                <td><div align="right">
                  <input name="email2" type="text" class="campoLogin" id="email2" size="40" />
                  </div></td>
              </tr>
            </table></td>
        </tr>
    </table>
      <br />
      <table width="436" height="42" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td background="images/login_box.png">
              <table width="412" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="images/password.png" width="110" height="16"/></td>
                  <td><div align="right">
                      <input name="pass2" type="password" class="campoLogin" id="pass2" size="40" />
                  </div></td>
                </tr>
            </table></td>
        </tr>
      </table>
      <br />
      <table width="436" height="42" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td background="images/login_box.png">
              <table width="412" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="images/repitela.png" width="110" height="16"/></td>
                  <td><div align="right">
                      <input name="pass22" type="password" class="campoLogin" id="pass22" size="40" />
                  </div></td>
                </tr>
            </table></td>
        </tr>
      </table>
      <br />
      <table width="436" height="42" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td background="images/login_box.png">
              <table width="412" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="110"><img src="images/captcha.png" width="110" height="16"/></td>
                  <td align="center"><div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
            <script type="text/javascript"
                    src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
            </script></td>
                </tr>
            </table></td>
        </tr>
      </table>
      <br /></td>
  </tr>
  <tr>
    <td>
      <div align="center">
        <input name="Submit2" type="submit" class="registrarButton" id="Submit2" value=" " />
        <br />
        <br />
        <a href="index.php" title="Urbaloca - Tu chat virtual para conocer gente"><img src="images/volvere.png" alt="Urbaloca - Tu chat virtual para conocer gente" width="301" height="38" border="0" /></a> </div>
    </td>
  </tr>
</table>
</form>