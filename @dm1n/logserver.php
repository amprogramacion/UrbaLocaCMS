<?
@session_start();
include("conectar.php");
if(!isset($_SESSION['admin'])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}
?>
<script language="javascript" type="text/javascript">
var xmlhttp = false;
try {
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
xmlhttp = false;
}
}
if (!xmlhttp) {
	if(typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
}
function comprobar() {
var obj = document.getElementById("datoserver");
xmlhttp.open("GET", "logserver2.php");

    xmlhttp.onreadystatechange = function() 
    {       
        if (xmlhttp.readyState == 4) {
              obj.value = xmlhttp.responseText; 
		}          
}
xmlhttp.send(null);
}
setInterval("comprobar()", 50);
</script>
<textarea name="datoserver" id="datoserver" style="width: 100%; height: 400px;">Cargando variables del servidor...</textarea>