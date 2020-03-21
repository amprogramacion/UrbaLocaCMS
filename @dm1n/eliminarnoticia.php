<?
session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
@mysql_query("DELETE FROM noticias WHERE id='".$_GET['id']."'");
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=panel.php?id=gesnoticias">';
?>