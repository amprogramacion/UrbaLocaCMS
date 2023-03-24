<?
@session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
$ar = file("nohup.out");
$mitexto = "";
foreach ($ar as $linea)
{
     $mitexto = $linea.$mitexto;
}
echo $mitexto;
?>