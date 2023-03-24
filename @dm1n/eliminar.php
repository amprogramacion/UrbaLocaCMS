<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
if($_GET['confirmar'] != "yes") {
	$id = $_GET['id'];
	echo "<h3>Borrando usuario $id</h3><h4><a href='eliminar.php?id=$id&confirmar=yes'>Confirmar</a> | <a href='javascript:history.black(-1);'>Cancelar</a></h4>";
} else {
	@mysqli_query($conn, "DELETE FROM users WHERE id='".$_GET['id']."'");
	echo '<script>alert("Usuario borrado correctamente!");</script><META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=listausuarios">';
}
?>