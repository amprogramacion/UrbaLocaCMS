<?
session_start();
include("conectar.php");
include("captcha/autoload.php");
$siteKey = '6Ld1lQsTAAAAALQIx2-Ezj5Rfv-5s9Wh2thf8X3N';
$secret = '6Ld1lQsTAAAAAJ1tcFnQcW_yQVxyRAwmMXq08psy';
$lang = 'es';
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
$queryN = mysql_query("SELECT * FROM mantenimiento");
$verN = mysql_fetch_array($queryN);
if($verN['estado_web'] == "0") {
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=mantenimiento.php">';
}
if(isset($_POST['email'])) {
	$email = $_POST['email'];
	$pass = md5(md5($_POST['pass']));
	$query = mysql_query("SELECT * FROM users WHERE email='".$email."'");
	if(!mysql_num_rows($query)) {
		echo '<script>alert("El correo electronico introducido no existe en nuestros servidores");</script><META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	} else {
		$ver = mysql_fetch_array($query);
		$user = $ver['nombre'];
		$pass2 = $ver['pass'];
		$baneado = $ver['baneado'];
		$activado = $ver['activado'];
		if($pass != $pass2) {
			echo '<script>alert("La contraseña introducida es incorrecta");</script><META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
		} else {
		$_SESSION['user'] = $user;
		$_SESSION["pass"] = $pass;
		@mysql_query("UPDATE users SET ip='".$_SERVER['REMOTE_ADDR']."' WHERE nombre='$user'");
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
		}
	}
}
if(isset($_SESSION['user'])) {
$queryB = mysql_query("SELECT * FROM users WHERE nombre='".$_SESSION['user']."'");
$verB = mysql_fetch_array($queryB);
$queryC = mysql_query("SELECT * FROM rooms WHERE owner='".$_SESSION['user']."'");
$numcasas = mysql_num_rows($queryC);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52609106-4', 'auto');
  ga('send', 'pageview');

</script>
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"PxuRl1a8FRh252", domain:"urbaloca.es",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
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
var obj = document.getElementById("resultado");
xmlhttp.open("GET", "comprobarban.php");

    xmlhttp.onreadystatechange = function() 
    {       
        if (xmlhttp.readyState == 4) {
              obj.innerHTML = xmlhttp.responseText; 
		}          
}
xmlhttp.send(null);
}
setInterval("comprobar()", 10000);
</script>
<link rel="icon" type="image/png" href="http://urbaloca.es/favicon.png" />
<!-- End Alexa Certify Javascript --> 
<meta name="google-site-verification" content="T8HWm1Lcm6W43FueaZXZZnybAQ5rzStEQuw_SP3hOv0" /> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?
if(!isset($_GET['id']) || $_GET['id'] == NULL) {
	$titulo = "Urbaloca - Tu chat virtual para conocer gente";
	$descripcion = "UrbaLoca es un chat virtual isométrico donde puedes crear tu sala e interactuar con otros usuarios. ¡Es gratis!";
} else if($_GET['id'] == "laurba") {
	$titulo = "UrbaLoca - Comunidad, eventos y concursos";
	$descripcion = "Estate al día de todos los eventos y concursos de UrbaLoca para ganar placas y creditos gratis.";
} else if($_GET['id'] == "seguridad") {
	$titulo = "UrbaLoca - Seguridad, moderadores y ayuda";
	$descripcion = "Conoce a los Moderadores de UrbaLoca  por qué nos tomamos tan enserio tu seguridad.";
} else if($_GET['id'] == "creditos") {
	$titulo = "UrbaLoca - Creditos GRATIS para todos los usuarios!";
	$descripcion = "En UrbaLoca los créditos, fichas o loks son gratis. No esperes mas y registrate para obtener 100 fichas gratis!";
} else if($_GET['id'] == "contacto") {
	$titulo = "UrbaLoca - Contacta con Nosotros";
	$descripcion = "Si tienes alguna duda o quieres enviarnos una sugerencia, ponte en contacto con nosotros.";
} else if($_GET['id'] == "recordar") {
	$titulo = "UrbaLoca - Recordar datos de acceso";
	$descripcion = "Si has olvidado tu clave de acceso a UrbaLoca, puedes recuperarla escribiendo tu correo electronico.";
} else if($_GET['id'] == "registrate") {
	$titulo = "UrbaLoca - Registrate gratis y obten 100 fichas ahora! Oferta ilimitada!";
	$descripcion = "Registrate gratis y obten 100 fichas ahora! Oferta ilimitada! Las fichas en UL son gratis para siempre.";
} else if($_GET['id'] == "micuenta") {
	$titulo = "UrbaLoca - Mi cuenta";
	$descripcion = "Administra tu cuenta, cambia tu mision o tu clave, mira las ventajas vip que tiene registrarse en UrbaLoca.";
} else if($_GET['id'] == "miscasas") {
	$titulo = "UrbaLoca - Mis Casas";
	$descripcion = "En UrbaLoca puedes crear tus casas y decorarlas a tu gusto, es gratis y hay infinidad de furnis!";
} else {
	$titulo = "Urbaloca - Tu chat virtual para conocer gente";
	$descripcion = "UrbaLoca es un chat virtual isométrico donde puedes crear tu sala e interactuar con otros usuarios. ¡Es gratis!";
}
?>
<title><?=$titulo;?></title>
<link href="css/home.css" rel="stylesheet"/>
<link href="css/home.css" rel="stylesheet" media="print" />
<meta name="description" content="<?=$descripcion;?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<style type="text/css">
.error {
	background-color:#FF595C;
	color: white;
	border: 2px solid black;
	margin: 5px 5px 5px 5px;
	padding: 5px 5px 5px 5px;
}
.correcto {
	background-color: #62A6F7;
	color: white;
	border: 2px solid black;
	margin: 5px 5px 5px 5px;
	padding: 5px 5px 5px 5px;
}
</style>
</head>
<body>
<div id="resultado"></div>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=PxuRl1a8FRh252" style="display:none" height="1" width="1" alt="" /></noscript>
<div class="cabecera">
<div class="logo">
<a href="http://urbaloca.es/" title="Urbaloca - Tu chat virtual para conocer gente"><img src="http://urbaloca.es/images/ullogo.png" alt="Urbaloca - Tu chat virtual para conocer gente" width="218" height="33" style="border: 0px;" /></a></div>
<div class="menuitem">
<a href="http://urbaloca.es/laurba" title="UrbaLoca - Comunidad, eventos y concursos"><img src="http://urbaloca.es/images/comunidad.png" alt="UrbaLoca - Comunidad, eventos y concursos" width="128" height="22" style="border: 0px;" /></a>
</div>
<div class="menuitem"><a href="http://urbaloca.es/seguridad" title="UrbaLoca - Seguridad, moderadores y ayuda"><img src="http://urbaloca.es/images/seguridad.png" alt="UrbaLoca - Seguridad, moderadores y ayuda" width="118" height="22" style="border: 0px;" /></a></div>
<div class="menuitem"><a href="creditos" title="UrbaLoca - Creditos GRATIS para todos los usuarios!"><img src="http://urbaloca.es/images/creditos.png" alt="UrbaLoca - Creditos GRATIS para todos los usuarios!" width="100" height="22" style="border: 0px;" /></a></div>
<div class="menuitem2">
<?
if(isset($_SESSION['user'])) {
?>
 <table width="150" style="text-align: right; border: 0px;" cellpadding="0" cellspacing="0">
<tr>
 <td width="31"><img src="images/online.png" alt="Usuarios Online" width="27" height="39" /></td>
<td width="17" class="title_blue_stats"><?php
	include("usuariosonline.php");
	?></td>
<td width="40"><img src="images/miscasas.png" alt="Tus Casas" width="30" height="34" /></td>
 <td width="34" class="title_blue_stats"><?=$numcasas;?></td>
 <td width="31"><img src="images/loks.png" alt="Tus Loks" width="30" height="34" /></td>
<td width="68" class="title_blue_stats"><?=$verB['fichas'];?></td>
</tr>
</table>
 <?
	}
	?>
</div>
</div>
<div style="visibility: hidden; height: 12px;"></div>
<h1 style="display:none;"><?=$titulo;?></h1><h2 style="visibility:hidden;"><?=$titulo;?></h2>
<div style="float:left; margin-bottom: 100px;">
  <?
	@$idw = $_GET['id'];
	if(substr($idw, 0, 3) == "htt" || substr($idw, 0, 3) == "www" || substr($idw, 0, 3) == "../" || $idw == "index" || $idw == "perfil" || $idw == "registro") {
	echo "<font face=system><h1>Intento de hackeo <b>repelido</b>.";
	} else {
	if(!isset($idw) || $_GET['id']==NULL) {
	@include("index2.php");
	} else {
	if(!file_exists($idw.'.php')) {
	@include("error404.php");
	} else {
	include($idw.".php");
	}
	}
	}
	?></div>
<div class="barraDown" style="clear: all;">
  <div class="copyright"><br />
      <br />
      <a href="http://urbaloca.es/contacto" title="UrbaLoca - Contacta con Nosotros" style="color: white;">CONTACTA CON NOSOTROS</a> | <a href="https://twitter.com/UrbaLoca2015" title="UrbaLoca - Siguenos en Twitter" style="color: white;">TWITTER</a> | <a href="https://plus.google.com/u/0/b/103741294820167720532/+UrbalocaEs2015/about" title="UrbaLoca - Siguenos en Google+" style="color: white;">GOOGLE +</a> | <a href="https://www.facebook.com/pages/UrbaLoca/1676511855915622" title="UrbaLoca - Siguenos en Facebook" style="color: white;">FACEBOOK</a></div>
  <div class="minicopyright"> <br />
    &copy; 2004 - 2015 Urba Loca Team. URBALOCA es un juego online desarollado en Espa&ntilde;a. Todos los derechos reservados.</div>
</div>
<span style="display: none;">
UrbaLoca es una comunidad virtual online basada en una vista isométrica, donde además de poder chatear con gente para hacer amigos o entretenerte, podrás decorar tu sala a tu gusto pintando la pared, cambiando las valdosas del suelo, comprando muebles para crear centros de ayuda, tiendas, imperios, casas, oficinas... todo lo que tu imaginación te deje volar. Tenemos cantidad de muebles divididos en categorías. Sillas, sillones, banquetas, mesas, separadores, butacas, plantas decorativas de diversos tipos, muebles de cocina, televisiones, armarios... todo lo que necesites para decorar tu sala completamente gratis. Ademas, UrbaLoca es completamente gratis: no tendrás que pagar por adquirir créditos, fichas o loks. Puedes adquirir 100 loks siempre que tu saldo inferior sea menor a 20, de forma indefinida. Lo unico que te pedimos a cambio es que no bloquees la publicidad proveniente de la página web, dado que eso es lo que nos ayuda a mantener el servidor activo, la web y otras muchas cosas más. Con tus creditos, además de poder comprar muebles y pintar tu sala, puedes hacerte del club VIP. El club VIP es un club donde además de tener una placa exclusiva que poder mostrar a todos tus amigos, recibirás regalos mensuales y la posibilidad de obtener hasta 2000 fichas con un maximo de 10000! ¿No es perfecto? Dentro de un tiempo publicaremos el nuevo catálogo online donde podras comprar muebles a traves de la pagina web de forma mas comoda, rapida y sencilla, sin estar conectado. En la pagina web tambien puedes administrar tu cuenta es decir: cambiar tu antigua contraseña por una nueva, cambiar tu mision para que otros puedan saber que haces dentro de UrbaLoca, cambiar tus placas, hacer visible u ocultar tu placa actual, ver la informacion de tu cuenta como nombre, email, estado vip, rango, mision, creditos, y mucho más. En la sección de Mis Casas pues ver las salas que has creado dentro de UL y pulsar sobre el icono del candado (en el caso de que no recuerdes la clave de tu sala) para verla. Ademas en toda la web puedes ver los usuarios que hay conectados en ese momento a UrbaLoca y saber en qué sala están. Si te has cansado de tu look, puedes hacer click en el boton "Mi perfil" que se encuentra dentro del juego en la parte superior derecha, y hacer click en "Mi ropa". Desde ahi podrás cambiar tu apariencia para tener un look mas atractivo. Además desde esa misma ventana puedes administrar tus placas en tiempo real, por si no quieres conectarte a la pagina web. Y recuerda que cuando compras un mueble, aparece en el inventario. Si estas en una sala en la cual eres dueño, puedes poner ese mueble en tu sala tan solo haciendo click en el mueble que deseas sacar y poniendolo en el suelo. Asi de facil. Puedes girarlo en las cuantro posiciones, puedes moverlo o puedes guardarlo otra vez en tu inventario. Ten en cuenta que cuando borras una sala de tu propiedad, todos los muebles que había desaparecen (esto es una manera de limpiar el inventario si hemos comprado muchos muebles). Los controles del juego son sencillos: haz click con el raton en el suelo de la casa para desplazarte por ella. No te preocupes si delante de ti hay muebles u obstáculos, el loko lo sabe y los esquivará todos hasta llegar a su destino o punto objetivo. Recuerda que en la Urbanizacion hay una serie de reglas o normas que todos lo usuarios deben seguir, sin excepcion. UrbaLoca no es un chat de sexo o diseñado para encontrar contactos sexuales. Si lo haces podrás ser expulsado de forma permanente de UrbaLoca. Tampoco puedes insultar o usar un lenguaje obsceno o faltar al respeto a los usuarios o los moderadores, ellos son los que velan por tu seguridad y podran expulsarte si lo ven necesario. Los administradores son los encargados del diseño y programación de UrbaLoca, y aunque no se conecten continuamente tienen acceso a los logs de chat y podran tomar acciones sin estar conectados en ese momento. UrbaLoca renueva su equipo de moderación continuamente y es por ello que estamos buscando nuevos Guias y Moderadores. Los guias son los encargados de guiar a los nuevos usuarios en la urbanizacion y responderle las dudas que les vayan surgiendo. Los moderadores vigilan que los guias tengan un comportamiento adecuado y moderan la urbanizacion para que se cumplan las normas. Ah y si despues de leer este tochaco llegas a esta parte y te preguntas porque el administrador de UL ha colocado un div invisible con esta parrafada... la respuesta es muy sencilla: SEO.
UrbaLoca es una comunidad virtual online basada en una vista isométrica, donde además de poder chatear con gente para hacer amigos o entretenerte, podrás decorar tu sala a tu gusto pintando la pared, cambiando las valdosas del suelo, comprando muebles para crear centros de ayuda, tiendas, imperios, casas, oficinas... todo lo que tu imaginación te deje volar. Tenemos cantidad de muebles divididos en categorías. Sillas, sillones, banquetas, mesas, separadores, butacas, plantas decorativas de diversos tipos, muebles de cocina, televisiones, armarios... todo lo que necesites para decorar tu sala completamente gratis. Ademas, UrbaLoca es completamente gratis: no tendrás que pagar por adquirir créditos, fichas o loks. Puedes adquirir 100 loks siempre que tu saldo inferior sea menor a 20, de forma indefinida. Lo unico que te pedimos a cambio es que no bloquees la publicidad proveniente de la página web, dado que eso es lo que nos ayuda a mantener el servidor activo, la web y otras muchas cosas más. Con tus creditos, además de poder comprar muebles y pintar tu sala, puedes hacerte del club VIP. El club VIP es un club donde además de tener una placa exclusiva que poder mostrar a todos tus amigos, recibirás regalos mensuales y la posibilidad de obtener hasta 2000 fichas con un maximo de 10000! ¿No es perfecto? Dentro de un tiempo publicaremos el nuevo catálogo online donde podras comprar muebles a traves de la pagina web de forma mas comoda, rapida y sencilla, sin estar conectado. En la pagina web tambien puedes administrar tu cuenta es decir: cambiar tu antigua contraseña por una nueva, cambiar tu mision para que otros puedan saber que haces dentro de UrbaLoca, cambiar tus placas, hacer visible u ocultar tu placa actual, ver la informacion de tu cuenta como nombre, email, estado vip, rango, mision, creditos, y mucho más. En la sección de Mis Casas pues ver las salas que has creado dentro de UL y pulsar sobre el icono del candado (en el caso de que no recuerdes la clave de tu sala) para verla. Ademas en toda la web puedes ver los usuarios que hay conectados en ese momento a UrbaLoca y saber en qué sala están. Si te has cansado de tu look, puedes hacer click en el boton "Mi perfil" que se encuentra dentro del juego en la parte superior derecha, y hacer click en "Mi ropa". Desde ahi podrás cambiar tu apariencia para tener un look mas atractivo. Además desde esa misma ventana puedes administrar tus placas en tiempo real, por si no quieres conectarte a la pagina web. Y recuerda que cuando compras un mueble, aparece en el inventario. Si estas en una sala en la cual eres dueño, puedes poner ese mueble en tu sala tan solo haciendo click en el mueble que deseas sacar y poniendolo en el suelo. Asi de facil. Puedes girarlo en las cuantro posiciones, puedes moverlo o puedes guardarlo otra vez en tu inventario. Ten en cuenta que cuando borras una sala de tu propiedad, todos los muebles que había desaparecen (esto es una manera de limpiar el inventario si hemos comprado muchos muebles). Los controles del juego son sencillos: haz click con el raton en el suelo de la casa para desplazarte por ella. No te preocupes si delante de ti hay muebles u obstáculos, el loko lo sabe y los esquivará todos hasta llegar a su destino o punto objetivo. Recuerda que en la Urbanizacion hay una serie de reglas o normas que todos lo usuarios deben seguir, sin excepcion. UrbaLoca no es un chat de sexo o diseñado para encontrar contactos sexuales. Si lo haces podrás ser expulsado de forma permanente de UrbaLoca. Tampoco puedes insultar o usar un lenguaje obsceno o faltar al respeto a los usuarios o los moderadores, ellos son los que velan por tu seguridad y podran expulsarte si lo ven necesario. Los administradores son los encargados del diseño y programación de UrbaLoca, y aunque no se conecten continuamente tienen acceso a los logs de chat y podran tomar acciones sin estar conectados en ese momento. UrbaLoca renueva su equipo de moderación continuamente y es por ello que estamos buscando nuevos Guias y Moderadores. Los guias son los encargados de guiar a los nuevos usuarios en la urbanizacion y responderle las dudas que les vayan surgiendo. Los moderadores vigilan que los guias tengan un comportamiento adecuado y moderan la urbanizacion para que se cumplan las normas. Ah y si despues de leer este tochaco llegas a esta parte y te preguntas porque el administrador de UL ha colocado un div invisible con esta parrafada... la respuesta es muy sencilla: SEO.
</span>
</body>
</html>
