<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
$id = $_GET['id'];
@mysql_query("UPDATE users SET baneado='0' WHERE id='$id'");
@mysql_query("UPDATE users SET motivo='' WHERE id='$id'");
@mysql_query("UPDATE users SET fechaban='' WHERE id='$id'");
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=usuariosbaneados">';
?>