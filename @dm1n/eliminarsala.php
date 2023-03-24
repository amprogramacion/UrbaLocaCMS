<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
@mysqli_query($conn, "DELETE FROM rooms WHERE id='".$_GET['id']."'");
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=salas">';
?>