<?
session_start();
include("conectar.php");
if(!isset($_SESSION['user'])) {
?>
<br />
<form id="form1" name="form1" method="post" action="index.php">
<div class="cuadro1">
<div class="contenidocuadrologin">
 <p><img src="images/logintitle.png" alt="Bienvenido" width="355" height="55" />   </p>
 <p><img src="images/email.png" width="70" height="16" alt="Email" /></p>
 <p>
   <input name="email" type="text" class="campoLogin" id="email" />
 </p>
 <p><img src="images/password.png" width="110" height="16" alt="Password" />   </p>
 <p>
   <input name="pass" type="password" class="campoLogin" id="pass" />
 </p>
 <p><span style="text-align: center">
  <input name="Submit" type="image" id="Submit" src="images/buttonbglogin.png" />
 </span> </p>
 <div><a href="recordar" title="UrbaLoca - Recordar datos de acceso"><img src="images/olvidedatos.png" alt="UrbaLoca - Recordar datos de acceso" width="270" height="38" style="border: 0px;" /></a>
   <div><a href="registrate" title="UrbaLoca - Registrate gratis y obten 100 fichas ahora! Oferta ilimitada!"><img src="images/reister.png" alt="UrbaLoca - Registrate gratis y obten 100 fichas ahora! Oferta ilimitada!" width="209" height="47" style="border: 0px;" /></a></div>
 </div>
</div>
</div>
</form>

<?
} else {
?>
<div class="cuadro1top">
  <p class="menu_letters"><strong>
    <?=ucfirst($_SESSION['user']);?>
  </strong><a href="?id=laurba" class="menu_letters"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="micuenta" class="menu_letters">Ajustes de la cuenta</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="miscasas" class="menu_letters">Mis salas</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout" class="menu_letters">Cerrar sesion</a></p>
</div>
<br />
<div class="cuadro1">
<img src="imager/?user=<?=$_SESSION['user'];?>" alt="" title="&Eacute;st@ eres t&uacute;" style="float: left; margin: 8px 8px 8px 8px;" />
<div class="contenidocuadro2" style="background-color: #BABBBC; margin-left: 45px;">
<div class="titulocuadro">
<?
if($verB['vip'] != NULL) {
?>
<img src="images/vipbadge.png" width="17" height="10" title="Perteneces al Club VIP" />
<?
}
?>
<?=ucfirst($_SESSION['user']);?>
</div>
<span class="stats_letters"><em><?=$verB['mision'];?></em><br /><br />
Tienes <big><strong><?=$verB['fichas'];?></strong></big> Loks</span></div><br clear="all" />
</div>


<div class="entraya">
<div class="temperatura"><?=rand(17,25);?>&ordm;</div><div class="clima">Soleado</div>
<a href="http://urbaloca.es/game" target="_blank" onClick="window.open(this.href, this.target, 'width=980,height=610'); return false;"><img src="images/enterul.png" width="381" height="122" style="border: 0px;" alt="" /></a>
</div><br style="clear: all" /><br /><br /><br /><br /><br /><br />
<?
}
?>

