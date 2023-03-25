<?
include("conectar.php");
$user = $_GET['user'];
$codeact = $_GET['codeact'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE nombre='$user'");
if(!mysqli_num_rows($query)) {
	echo "Ese usuario no existe";
} else {
	$ver = mysqli_fetch_array($query);
	$codeact2 = sha1(base64_encode($ver['codeact']));
	if($codeact != $codeact) {
		echo "El codigo de autorización es incorrecto.";
	} else {
		$nuevapass = rand(111111, 999999);
		$nuevapass2 = password_hash($nuevapass, PASSWORD_DEFAULT);
		mysqli_query($conn, "UPDATE users SET pass='$nuevapass2', codeact='".md5(rand(111111, 999999))."' WHERE nombre='$user'");
		$email = $ver['email'];
		mail("$email", "UrbaLoca: Generacion de contraseña", "Hola $user\n\nComo nos has pedido, te hemos generado una nueva contraseña de acceso a UrbaLoca. Estos son tus nuevos datos de acceso:\n\nUsuario: $user\nContraseña: $nuevapass\n\nCambia tu contraseña cuando vuelvas a loguearte en UL\n\nNo respondas a este email, es generado automaticamente", "From: noreply@urbaloca.es");
		echo "Tu nueva contraseña ha sido enviada a tu correo electronico $email<br>Redigiriendo a UL...";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=index.php">';
	}
}
?>