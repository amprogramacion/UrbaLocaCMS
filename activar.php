<?
session_start();
include("conectar.php");
$user = $_GET['user'];
$codeact = $_GET['codeact'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE nombre='".$user."'");
if(!mysqli_num_rows($query)) {
	echo "<script>alert('Ese nombre de usuario no esta registrado');</script>";
} else {
	$ver = mysqli_fetch_array($query);
	if($ver['activado'] == "1") {
		echo "<script>alert('La cuenta de usuario ya se encuentra activada');</script>";
	} else {
		if($ver['codeact'] != $codeact) {
			echo "<script>alert('El codigo de activacion es incorrecto');</script>";
		} else {
			@mysqli_query($conn, "UPDATE users SET activado='1' WHERE nombre='".$user."'");
			echo "<script>alert('Felicidades! Tu cuenta se ha activado correctamente. Ya puedes iniciar sesion en la Web.');</script>";
		}
	}
}
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
?>