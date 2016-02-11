<?php 
include "autentifica.php";
include "lib/config.php";
$id_usuario = $_GET['id'];
$query = "SELECT nombre FROM usuario WHERE id=$id_usuario";
	
	$query_tra = mysql_query($query, $link);
	if (@mysql_num_rows($query_tra)){
		while ($claro = mysql_fetch_row($query_tra))
		{	
		$user = $claro[0];
		}
	}
		if($_SESSION["usuario"]!= $user){ //si no eres el usuario de la sesion no tienes acceso a la pagina del perfil
			
			echo '<div style="float:left; height:40px; border:1px solid #ccc; background-color:#dedede; margin-top:8px; width:220px;">';
				echo '<p style="float:left; width:100%; height:100%; margin-top:15px; margin-left:10px; text-align:left; font-size:10px; color: #E2001A; font-family:Georgia, Helvetica, Arial, sans-serif; letter-spacing: 2px;">No tienes acceso a la pagina! <a href="index.php" style="text-decoration:none;">Volver a la pagina principal</a></p>';
			echo '</div>';
			
		}else{

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Mis acciones</title>
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
            <h3>Mis acciones</h3>
            
	
		<div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">COMENTARIOS REALIZADOS</p>
        	<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
        </div>
        
        <div style="width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;">
        <?php
        $temporada = "SELECT temporada FROM partido GROUP BY temporada";
		$query_temporada = mysql_query($temporada, $link);
		if (@mysql_num_rows($query_temporada)){
			while ($tempo = mysql_fetch_row($query_temporada))
			{
			$season = $tempo[0];
			echo '<p style="float:left; width:100%; height:100%; margin:18px 0px 0px 10px; text-align:left; color:#4A9DCA; font-size:20px;">'.$tempo[0].'</p>';
			

			//mostro els missatges que s'han fet per cada partit
		        $acciones = "SELECT messages.msg_id, messages.message, partido.id, messages.fecha FROM messages, partido, equipo WHERE messages.id_usuario=$id_usuario AND messages.id_partido=partido.id AND partido.temporada='$season' GROUP BY messages.msg_id";
				$query_acciones = mysql_query($acciones, $link);
				if (@mysql_num_rows($query_acciones)){
					while ($pt = mysql_fetch_row($query_acciones))
					{
						$id_partido = $pt[2];
						echo "<div style='float:left; width:900px; padding:10px; border-bottom: 2px solid #ccc;'>";
							
							echo "<p style='float:left; font-size:14px; text-align:left; width:100%; margin:0px; color:#4A9DCA;'>Comentario: <span style='color:#000;'>".utf8_encode($pt[1])."</span>
							<a href='javascript:void(0)' title='Eliminar comentario' style='text-decoration:none; float:right; font-size: 12px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #EB1009; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' onClick='eliminar($pt[0],$id_usuario);'>Eliminar comentario</a></p>";
						
						if ($pt[3]){ //si hay fecha, la cambiamos de formato de BBDD a texto
							$p=split(" ",$pt[3]);
							$f=split("-",$p[0]);
							$h=split(":",$p[1]);
													
							//cambio de fecha
							$nummes=(int)$f[1];
							$mes1="0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
							$mes1=split("-",$mes1);
												
							//cambio de hora
							$numhora=(int)$h[0];	
							$desfechahora="$f[2] de $mes1[$nummes] de $f[0] a las $numhora:$h[1] h.";
						}
							
						echo "<p style='float:left; font-size:10px; text-align:left; width:100%; color:#4A9DCA; line-height:20px;'>Comentado el ".$desfechahora."</p>";
						
							
						$local = "SELECT equipo.categ, club.nombre FROM partido, equipo, club WHERE partido.id = '$id_partido' AND equipo.id = partido.local AND equipo.id_club = club.id";
						$query_local = mysql_query($local, $link);
						
						$visitant="SELECT equipo.categ,club.nombre FROM partido, equipo, club, pabellon WHERE partido.id = '$id_partido' AND equipo.id = partido.visitante AND equipo.id_club = club.id";
							$query_visitant = mysql_query($visitant, $link);
								
								if ((@mysql_num_rows($query_local))&&(@mysql_num_rows($query_visitant))){
									while ($puni = mysql_fetch_row($query_local) and $puni2 = mysql_fetch_row($query_visitant) )
									{
											
											
											echo "<p style='float:left; font-size:14px; text-align:left; width:100%; color:#4A9DCA; margin:0px;'>Partido: <a href='partido.php?id=$id_partido' title='Ir al partido' style='text-decoration:none; color:#4A9DCA;'>".utf8_encode($puni[0])." ".utf8_encode($puni[1])." vs. ".utf8_encode($puni2[0])." ".utf8_encode($puni2[1])."</a></p>";
										
									}
								}	
						
						echo "</div>"; //tanco el requadre
													
					}
				}else{
				echo "<div style='float:left; width:580px; padding:10px;'>";	
						echo "<p style='float:left; font-size:14px; text-align:left; width:100%; margin:0px; color:#4A9DCA;'>No has realizado ningún comentario</p>";
					echo "</div>";
				
				}
				
					
					}
				}
				?>	
</div>


    
<div style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
    <p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">TU ASISTENCIA A PARTIDOS</p>
    <span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
</div>
    
     <?php //mostro la assistencia que s'ha fet per cada partit
        $checkin = "SELECT checkin.*, partido.id FROM checkin, partido, equipo WHERE checkin.id_user=$id_usuario AND checkin.id_partido=partido.id AND partido.temporada='$season' GROUP BY partido.id";
		$query_ch= mysql_query($checkin, $link);
		if (@mysql_num_rows($query_ch)){
			while ($pl = mysql_fetch_row($query_ch))
			{
				$id_partido = $pl[3];
				echo "<div style='width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:10px; margin-left:20px; border-bottom: 2px solid #ccc;'>";
					echo "<p style='float:left; font-size:14px; text-align:left; width:100%; margin-left:10px; margin-top:18px;'>Has confirmado tu asistencia al partido siguiente:</p>";
					
					
				$local = "SELECT equipo.categ, club.nombre FROM partido, equipo, club WHERE partido.id = '$id_partido' AND equipo.id = partido.local AND equipo.id_club = club.id";
				$query_local = mysql_query($local, $link);
				
				$visitant="SELECT equipo.categ,club.nombre FROM partido, equipo, club, pabellon WHERE partido.id = '$id_partido' AND equipo.id = partido.visitante AND equipo.id_club = club.id";
					$query_visitant = mysql_query($visitant, $link);
						
						if ((@mysql_num_rows($query_local))&&(@mysql_num_rows($query_visitant))){
							while ($puni = mysql_fetch_row($query_local) and $puni2 = mysql_fetch_row($query_visitant) )
							{
							echo "<p style='float:left; font-size:14px; text-align:left; width:900px; margin:0px 0px 0px 10px;'>
							<a href='partido.php?id=$id_partido' title='Ir al partido' style='text-decoration:none; color:#4A9DCA'>".utf8_encode($puni[0])." ".utf8_encode($puni[1])." vs. ".utf8_encode($puni2[0])." ".utf8_encode($puni2[1])."</a>
							
							<a href='javascript:void(0)' title='Eliminar asistencia' style='text-decoration:none; float:right; font-size: 12px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #EB1009; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' onClick='eliminar_asistencia($pl[0],$id_usuario);'>Eliminar asistencia</a>
							
							</p>";
								
							}
						}	
				
				echo "</div>"; //tanco el requadre
											
			}
		}else{
			echo "<div style='width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:10px; margin-left:20px;'>";		
				echo "<p style='float:left; font-size:14px; text-align:left; width:100%; margin-left:20px; color:#4A9DCA;'>No has asistido a ningún partido</p>";
			echo "</div>";
		
		}
		
		?>
        
        
        
        
        
        
        
       <div style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">ERES SEGUIDOR DE</p>
       		<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>     
       </div>
        
        <!--<p class="mini-title" style="float:left; width:100%; height:100%; margin-top:15px; margin-left:10px; text-align:left;">COMENTARIOS:</p>-->
        <?php //mostro els missatges que s'han fet per cada partit
        $seguir = "SELECT seguidor.id, equipo.categ, club.nombre, club.img, club.id, equipo.id
FROM seguidor, usuario, equipo, club
WHERE seguidor.id_user = '$id_usuario'
AND seguidor.id_equipo = equipo.id
AND equipo.id_club=club.id
GROUP BY seguidor.id";
		$query_seguir = mysql_query($seguir, $link);
		if (@mysql_num_rows($query_seguir)){
			while ($plas = mysql_fetch_row($query_seguir))
			{
				
				echo "<div style='width:920px; background-color: #fff; color: inherit; margin: 0px 0px 0px 20px; float:left; height:auto;  border-bottom: 2px solid #ccc; padding-top:5px;'>";
					echo "<p style='float:left; font-size:14px; text-align:left; width:890px; margin-left:20px;'><a href='equipo.php?id=".$plas[5]."&club=".$plas[4]."' title='".utf8_encode($plas[1])." ".utf8_encode($plas[2])."' style='color:#4A9DCA; text-decoration:none;'><img src='".$plas[3]."' alt='".utf8_encode($plas[1])." ".utf8_encode($plas[2])."' title='".utf8_encode($plas[1])." ".utf8_encode($plas[2])."' style='margin-right:15px; border:1px solid #000;' />".utf8_encode($plas[1])." ".utf8_encode($plas[2])."</a>
					<a href='javascript:void(0)' title='Dejar de ser seguidor' style='text-decoration:none; float:right; font-size: 12px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #EB1009; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' onClick='eliminar_seguir($plas[0]);'>Dejar de ser seguidor</a></p>";
			
				
				echo "</div>"; //tanco el requadre
											
			}
		}else{
		echo "<div style='width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:10px; margin-left:20px;'>";	
				echo "<p style='float:left; font-size:14px; text-align:left; width:100%; margin-left:20px; color:#4A9DCA;'>No eres seguidor de ningún equipo</p>";
			echo "</div>";
		
		}
		
		?>
        
        
        
        
        
        <div style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
       		<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">PERTENECES AL CLUB DE FANS DE</p>
        	<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
        </div>
        
        <!--<p class="mini-title" style="float:left; width:100%; height:100%; margin-top:15px; margin-left:10px; text-align:left;">COMENTARIOS:</p>-->
        <?php //mostro els equips dels que es fan l'usuari
        $fan = "SELECT clubfans.id, equipo.categ, club.nombre, club.img, clubfans.id_equipo, equipo.id, club.id
FROM clubfans, usuario, equipo, club
WHERE clubfans.id_user = '$id_usuario'
AND clubfans.id_equipo = equipo.id
AND equipo.id_club=club.id
GROUP BY clubfans.id";
		$query_fan = mysql_query($fan, $link);
		if (@mysql_num_rows($query_fan)){
			while ($fanin = mysql_fetch_row($query_fan))
			{
				
				echo "<div style='width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:10px; margin-left:20px; border-bottom: 2px solid #ccc;'>";
					echo "<p style='float:left; font-size:14px; text-align:left; width:890px; margin:18px 0px 0px 20px;'><a href='equipo.php?id=".$fanin[6]."&club=".$fanin[7]."' title='".utf8_encode($plas[1])." ".utf8_encode($plas[2])."' style='color:#4A9DCA; text-decoration:none;'><img src='".$fanin[3]."' alt='".utf8_encode($fanin[1])." ".utf8_encode($fanin[2])."' title='".utf8_encode($fanin[1])." ".utf8_encode($fanin[2])."' style='margin-right:15px; border:1px solid #000; float:left;' />".utf8_encode($fanin[1])." ".utf8_encode($fanin[2])."</a>
					<a href='clubdefans.php?id=$fanin[4]' title='Entrar en el club de fans' style='text-decoration:none; float:right; font-size: 12px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4A9DCA; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>Ir al club de fans</a>
					
					<a href='javascript:void(0)' title='Dejar el club de fans' style='text-decoration:none; float:right; font-size: 12px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #EB1009; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-right:10px;' onClick='eliminar_fan($fanin[0]);'>Dejar el club de fans</a>	
					
					</p>";
				
				//onClick='verclubfans($fanin[4],$id_usuario);'
				//echo '<div id="clubfans"></div>';
				
				echo "</div>"; //tanco el requadre
											
			}
		}else{
		echo "<div style='width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:10px; margin-left:20px;'>";	
				echo "<p style='float:left; font-size:14px; text-align:left; width:100%; margin-left:20px; color:#4A9DCA;'>No eres de ningún club de fans</p>";
			echo "</div>";
		
		}
		
		?>
        
        
        
        
        
        
        
        
    

    
    
	<div style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">TUS IMAGENES SUBIDAS</p>
    		<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
    </div>
            
		<ul style="float:left; margin-left:20px; width:880px; background-color:#fff; margin-top:0px; padding:20px; margin-bottom:0px;">
     <?php //mostro la assistencia que s'ha fet per cada partit
        $fotos = "SELECT img.id, img.img FROM img, usuario WHERE img.id_usuario=$id_usuario AND img.id_usuario=usuario.id";
		$query_fotos= mysql_query($fotos, $link);
		if (@mysql_num_rows($query_fotos)){
			while ($row = mysql_fetch_row($query_fotos))
			{?>
				<li style="float:left; display:inline; margin:0px 0px 10px 0px; width:110px;">
                	<img src="<?php echo $row[1];?>" title="<?php echo $row[1];?>" style="width:80px; height:80px;" />
                    <a href='javascript:void(0)' title='Eliminar imagen' style='text-decoration:none; float:left; font-size: 12px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #EB1009; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' onClick='eliminar_imagen(<?php echo $row[0]?>);'>Eliminar</a>
                    
                    
                    
                </li>
       	<?php }
		}else{
			echo "";	
				echo "<p style='float:left; font-size:14px; text-align:left; width:auto; color:#4A9DCA;'>No has subido ninguna imagen</p>";
			echo "";
		
		}?>
		</ul>
                   
    
<div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:900px; float:left; margin:0px 0px 40px 20px;">
	<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;"><a href="#" title="Ir arriba" style="text-decoration:none; color:#fff;">Ir arriba</a></p>
</div>
    
</div>
<?php include "lib/footer.php"; ?>
</body>
</html>     
<?php } ?> 