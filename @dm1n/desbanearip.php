<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
$id = $_GET['id'];
@mysqli_query($conn, "DELETE FROM banip WHERE id='$id'");
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=ipsbaneadas">';
?>