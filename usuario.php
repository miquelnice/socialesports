<?php 
include "autentifica.php";
include "lib/config.php";
$id_usuario = $_GET['id'];
$dre = "SELECT * FROM usuario WHERE id=$id_usuario";
	
	$query_dre = mysql_query($dre, $link);
	if (@mysql_num_rows($query_dre)){
		while ($grh = mysql_fetch_row($query_dre))
		{
			$redi = $grh[0]; //id
			$senor = $grh[1]; //nombre
		}
	}
	
	if($_SESSION["usuario"]== $senor){ //si el usuario es igual al usuario que inicia la sesion, se va a la pagina de perfil
		header("Location: perfil.php?id=$redi");
	}else{ //si son diferentes, se va a la pagina de usuario
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Usuario</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<!--<link rel="stylesheet" href="css/reset.css" />-->

<? include "lib/js.php";?>

<script language="javaScript" type="text/javascript">
<!-- para validar el registro de los usuarios en la pagina de alta.php
	function validar()  
	{
	if(document.getElementById('insertant').nombre.value!=""){ //introduir algun valor
		if(document.getElementById('insertant').correo.value!=""){ //introduir algun valor
			if(document.getElementById('insertant').contrasenya.value!=""){ //introduir algun valor
				if(document.getElementById('insertant').acepto.checked){
					return true;
				}else{
					document.getElementById('alerta').style.border="1px solid #E3001B";	
					document.getElementById('alerta').style.width="88";
					document.getElementById('alerta').style.padding="10px";	
					return false;
				}
			}else{
			document.getElementById('insertant').contrasenya.style.border="1px solid #E3001B";
			return false;
			}
		}else{
		document.getElementById('insertant').correo.style.border="1px solid #E3001B";
		return false;
		}
	}else{
	document.getElementById('insertant').nombre.style.border="1px solid #E3001B";
	return false;
	}	

}

<!-- para validar la recuperacion de e-mails en la pagina de recuperar.php -->
	function recupero()  
	{
	if(document.getElementById('recuperis').rcorreo.value!=""){ //introduir algun valor
		return true;
	}else{
		document.getElementById('recuperis').rcorreo.style.border="1px solid #E3001B";
		return false;
	}	
}

$(document).ready(function(){ //para que se vea en IE7 y IE8
if (jQuery.browser.msie) {
  if(parseInt(jQuery.browser.version) == 8) {
  	$("#caca").css("marginTop","30px"); //espacio superior logos colaboradores
	$("ul.menu_web li a").css("paddingTop","19px");//medialuna hover menu
  }
	if(parseInt(jQuery.browser.version) == 7) {
		$(".menu").css("marginLeft","-340px"); //desplazamiento izquierda menu
		$("#caca").css("marginTop","30px"); //espacio superior logos colaboradores
		$("ul.menu_web li a").css("paddingTop","19px"); //medialuna hover menu
	}
} 
});
//end function
-->
</script>  
</head>
<body>
<div class="header"> <!-- Fondo de repetición -->
	<?php include 'lib/publicidad_top.php'; ?>
            <div class="cabecera"> <!-- Contenedor cabecera -->
                <a href="index.php" class="logo"><span>socialesports</span></a>
                
                
                <form name="language" id="language" action="#"> <!-- Selector de idioma -->
                    <select name="idioma" id="idioma" onchange="CIdioma(this.id);">
                        <option value="es">Español</option>
                        <option value="ca">Català</option>
                        <option value="en">English</option>
                    </select>
                </form>
				<script type="text/javascript">
                    function CIdioma(id){
                       var NuevaPagina = document.getElementById(id);
                       location.href = 'http://127.0.0.1/socialesports/' + NuevaPagina.value;
					   //location.href = 'http://127.0.0.1/socialesports/' + NuevaPagina.value + '.php';
                    }
                </script>
                
                
                
                <?php include "lib/panel.php"; ?>
            
            <?php include "lib/menu.php"; ?>
            
        </div> <!-- Fin cabecera -->
	</div> <!-- Fin header -->

 
 
		<div id="wrap">
        	<h3>Perfil de usuario</h3>
            
            <div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">INFORMACIÓN DE USUARIO</p>
        	<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
        </div>
            
            
    
    <div id="usuario" style="width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px; padding-top:10px; padding-bottom:10px;">
    <?php
	$query = "SELECT * FROM usuario WHERE id=$id_usuario";
	
	$query_tra = mysql_query($query, $link);
	if (@mysql_num_rows($query_tra)){
		while ($claro = mysql_fetch_row($query_tra))
		{
			$user = $claro[1];
			echo '<div style="float:left; width:32px; padding:4px; margin-right:8px; border:1px solid #fff; margin-left:40px;">';	
				if(($claro[4])!=""){
					echo '<img src="perfiles/'.$claro[4].'" style="float:left; width:32px;" /></div>';
				}else{
					echo '<img src="perfiles/default.png" style="float:left;" /></div>';
				}
				
				if ($claro[5]){ //si hay fecha, la cambiamos de formato de BBDD a texto
					$p=split(" ",$claro[5]);
					$f=split("-",$p[0]);
					$h=split(":",$p[1]);
									
					//cambio de fecha
					$nummes=(int)$f[1];
					$mes1="0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
					$mes1=split("-",$mes1);
									
					//cambio de hora
					$numhora=(int)$h[0];	
					$desfechahora=" unido desde el $f[2] de $mes1[$nummes] de $f[0] a las $numhora:$h[1] h.";
				}
				
				?>
				<div style="float:left; width:500px;">
					<p style="float:left; font-size:14px; text-align:left; width:100%; margin-left:10px; margin-top:18px; color:#4A9DCA;"><?php echo utf8_encode($claro[1]) ?><span style="color:#999"> - <?php echo $desfechahora;?></span></p>
				</div> <!-- div nombre usuario -->
				
    
    	<?php }
	}?></p>
    </div> 
     
            
	
        
        
        <div id="comments" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">COMENTARIOS REALIZADOS</p>
            <span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
</div>
        
        
        
        <?php //mostro els missatges que s'han fet per cada partit
        $acciones = "SELECT COUNT(*) FROM messages WHERE id_usuario=$id_usuario";
		$query_acciones = mysql_query($acciones, $link);
		if (@mysql_num_rows($query_acciones)){
			while ($pt = mysql_fetch_row($query_acciones))
			{
				echo "<div style='width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;'>";
					echo "<p style='float:left; font-size:20px; text-align:left; width:100%; font-weight:bold; margin-left:40px; color:#4A9DCA'>".$pt[0]."</p>";
				echo "</div>"; //tanco el requadre
											
			}
		}else{
			echo "<div style='width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;'>";	
				echo "<p style='float:left; font-size:11px; text-align:left; width:100%;'>No ha realizado ningún comentario</p>";
			echo "</div>";
		
		}
		
		?>
	
    
    
    <div id="assist" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">ASISTENCIA A PARTIDOS</p>
            <span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
</div>
    
    
    
     <?php //mostro la assistencia que s'ha fet per cada partit
        $checkin = "SELECT COUNT(*) FROM checkin WHERE id_user=$id_usuario";
		$query_ch= mysql_query($checkin, $link);
		if (@mysql_num_rows($query_ch)){
			while ($pl = mysql_fetch_row($query_ch))
			{
				echo "<div style='width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;'>";
					echo "<p style='float:left; font-size:20px; text-align:left; width:100%; font-weight:bold; margin-left:40px; color:#4A9DCA;'>".$pl[0]."</p>";
				echo "</div>"; //tanco el requadre								
			}
		}else{
			echo "<div style='width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;'>";	
				echo "<p style='float:left; font-size:11px; text-align:left; width:100%;'>No ha asistido a ningún partido</p>";
			echo "</div>";
		}?>
        
        
        
        
        <div id="seguidorde" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">ES SEGUIDOR DE</p>
            <span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
</div>
        
        <ul style="width:880px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px; margin-bottom:0px;">
        <?php //mostro els missatges que s'han fet per cada partit
        $seguir = "SELECT seguidor.id, equipo.categ, club.nombre, club.img, equipo.id, club.id FROM seguidor, usuario, equipo, club WHERE seguidor.id_user = '$id_usuario' AND seguidor.id_equipo = equipo.id AND equipo.id_club=club.id GROUP BY seguidor.id";
		$query_seguir = mysql_query($seguir, $link);
		if (@mysql_num_rows($query_seguir)){
			while ($plas = mysql_fetch_row($query_seguir))
			{
			echo '<li style="float:left; display:inline; margin-right:10px; margin-top:15px; margin-bottom:15px;">';
				echo "<a href='equipo.php?id=".$plas[4]."&club=".$plas[5]."'><img src='".utf8_encode($plas[3])."' alt='".utf8_encode($plas[1])." ".utf8_encode($plas[2])."' title='".utf8_encode($plas[1])." ".utf8_encode($plas[2])."' style='border:1px solid #000;' /></a>";
			echo "</li>"; //tanco el requadre
			}
		}else{
			echo "<div style='width:860px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;'>";	
				echo "<p style='float:left; font-size:14px; text-align:left; width:100%; color:#4A9DCA;'>No es seguidor de ningún equipo</p>";
			echo "</div>";
		
		}?>
        </ul>
       
        
        
        
        
        
        <div id="fanatico" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">PERTENECE AL CLUB DE FANS DE</p>
            <span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
</div>
        
        
        <ul style="width:880px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px; margin-bottom:0px;">
        <?php //mostro els missatges que s'han fet per cada partit
        $fan = "SELECT clubfans.id, equipo.categ, club.nombre, club.img, clubfans.id_equipo FROM clubfans, usuario, equipo, club
WHERE clubfans.id_user = '$id_usuario' AND clubfans.id_equipo = equipo.id AND equipo.id_club=club.id GROUP BY clubfans.id";
		$query_fan = mysql_query($fan, $link);
		if (@mysql_num_rows($query_fan)){
			while ($fanin = mysql_fetch_row($query_fan))
			{
				echo '<li style="float:left; display:inline; margin-right:10px; margin-top:15px; margin-bottom:15px;">';
					echo "<a href='clubdefans.php?id=".$fanin[4]."'><img src='".utf8_encode($fanin[3])."' alt='".utf8_encode($fanin[1])." ".utf8_encode($fanin[2])."' title='".utf8_encode($fanin[1])." ".utf8_encode($fanin[2])."' style='border:1px solid #000; float:left;' /></a>";
				echo "</li>"; //tanco el requadre
			}
		}else{
		echo "<div style='width:860px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;'>";	
				echo "<p style='float:left; font-size:14px; text-align:left; width:100%; color:#4A9DCA;'>No pertenece a ningún club de fans</p>";
			echo "</div>";
		
		}?>
        </ul>
        
        
          
    <div id="fotografias" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">IMAGENES COMPARTIDAS</p>
            <span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
</div>
    
		<ul style="width:880px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px; margin-bottom:0px;">
     <?php //mostro la assistencia que s'ha fet per cada partit
        $fotos = "SELECT img.id, img.img FROM img, usuario WHERE usuario.id=$id_usuario AND img.id_usuario = usuario.id";
		$query_fotos= mysql_query($fotos, $link);
		if (@mysql_num_rows($query_fotos)){
			while ($row = mysql_fetch_row($query_fotos))
			{?>
				<li style="float:left; display:inline; margin-right:10px; margin-top:15px; margin-bottom:15px;">
                	<img src="<?php echo utf8_encode($row[1]);?>" title="<?php echo utf8_encode($row[1]);?>" style="width:70px; height:70px; border:none;" />
                </li>
       	<?php }
		}else{
			echo "<div style='width:860px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;'>";	
				echo "<p style='float:left; font-size:14px; text-align:left; width:100%; color:#4A9DCA;'>No ha subido ninguna imagen</p>";
			echo "</div>";
		
		}?>
		</ul>

 
  
    
<div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:900px; float:left; margin:0px 0px 40px 20px;">
	<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;"><a href="#" title="Ir arriba" style="text-decoration:none; color:#fff;">Ir arriba</a></p>
</div> 
                 
</div> <!-- fin wrap -->
<?php include "lib/footer.php"; ?>
</body>
</html>     
<?php } //fin condicion usuario o perfil ?> 