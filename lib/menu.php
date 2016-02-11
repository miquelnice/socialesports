<? function Menu($sitio) {
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
if(ereg($sitio,$url)) {echo 'class="current"'; }
}?>
<div class="menu">
	<ul class="menu_web"> <!-- Menu -->
    	<li><a href="index.php" title="Inicio" <?php Menu('index.php') ?>><span>Inicio</span></a></li>
        <li class="separador_menu"></li>
        <li><a href="novedades.php" title="Novedades" <?php Menu('novedades.php') ?>><span>Novedades</span></a></li>
        <li class="separador_menu"></li>
        <li><a href="como_funciona.php" title="Cómo funciona" <?php Menu('como_funciona.php') ?>><span>Cómo funciona</span></a></li>
        <li class="separador_menu"></li>        
        <li><a href="como_anunciar.php" title="Cómo anunciar" <?php Menu('como_anunciar.php') ?>>Cómo anunciar</a></li>
        <li class="separador_menu"></li>
        <li><a href="cupones.php" title="Cupones" <?php Menu('cupones.php') ?>><span>Cupones</span></a></li>
        <li class="separador_menu"></li>
        <li><a href="sobre_nosotros.php" title="Sobre nosotros" <?php Menu('sobre_nosotros.php') ?>><span>Sobre nosotros</span></a></li>
        <li class="separador_menu"></li>
        <li><a href="contacta.php" title="Contacta" <?php Menu('contacta.php') ?>><span>Contacta</span></a></li>
        
        <!--<li class="twitter"><img src="imgs/red-twitter.png" alt="Twitter" /><a href="http://www.twitter.com/" target="_blank" title="Síguenos en twitter"><span>&nbsp;Síguenos</span></a></li>-->
	</ul>
<div class="clearfix"></div>
</div>   <!-- Fin menu --> 