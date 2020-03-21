<?
session_start();
include("comprobarban.php");
session_unset();
session_destroy();
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
?>