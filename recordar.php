<form name="form1" method="post" action="">
  <div class="cuadro1" style="margin: 10px 10px 10px 10px; width: 444px; text-align:center; padding: 10px 10px 10px 10px;">
    <p><img src="images/login_title.png" alt="" width="355"  height="55" /></p>
    <p><br />
      <img src="images/email.png" width="70" height="16" alt=""/></p>
    <p><br />
      <input name="email" type="text" class="campoLogin" id="email" size="40" />
    </p>
    <p><br />
      <input name="Submit" type="submit" class="recordarButton" id="Submit" value=" " />
      <br />
      <br />
      <a href="index.php" title="Urbaloca - Tu chat virtual para conocer gente"><img src="images/volvere.png" alt="Urbaloca - Tu chat virtual para conocer gente" width="301" height="38" /></a></p>
  </div>
</form>
<?
if(isset($_POST['Submit'])) {
	$email = $_POST['email'];
	if($email == NULL) {
		echo '<script>alert("Todos los campos son obligatorios.");</script>';
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=recordar.php">';
	} else {
		$query_email = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'");
		if(!mysqli_num_rows($query_email)) {
			echo '<script>alert("Ese email no esta registrado en UrbaLoca.");</script>';
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=recordar.php">';
		} else {
			$ver = mysqli_fetch_array($query_email);
			$user = $ver['nombre'];
			$pass = sha1(base64_encode($ver['pass']));
			mail("$email", "UrbaLoca - Recordatorio de datos", "Hola $user!\n\nHace poco nos has solicitado recordar tu contraseña en UrbaLoca. Estos son tus datos:\n\nEmail: $email\n\nPara generar una nueva contraseña, haz click aqui: \nhttp://urbaloca.es/generar.php?user=$user&codeact=$pass\n\nAccede a UrbaLoca haciendo click en http://www.urbaloca.es\n\nNo respondas a este correo, no se revisan las respuestas.", "From: noreply@urbaloca.es");
			echo '<script>alert("Hemos enviado a tu correo electronico tus datos de acceso a UrbaLoca.");</script>';
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
		}
	}
}
?>
