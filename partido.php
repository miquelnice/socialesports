<?php include "autentifica.php";
include "lib/config.php"; 
$id_partit = mysql_real_escape_string($_GET['id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Partido</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.ad-gallery.css" />
<link rel="stylesheet" href="css/jquery.lightbox-0.5.css" />

<? include "lib/js.php";?>

<script type="text/javascript" src="js/jquery.lightbox.js"></script> 
<script type="text/javascript" src="js/jquery.ad-gallery.js"></script> 
<script>
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
/* funcion más, para ver más comentarios en los partidos */

//More Button
	$('.more').live("click",function() 
	{
		var ID = $(this).attr("id");
		if(ID)
		{
			$("#more"+ID).html('<img src="icons/loader.gif" />');
			$.ajax({
				type: "POST",
				url: "mas_comentarios.php",
				data: "lastmsg="+ ID +"&id_partit="+ <?php echo $_GET['id']?>, 
				cache: false,
				success: function(html){
				$("ol#updates").append(html);
				$("#more"+ID).remove();
				}
			});
		}else{
			$(".morebox").html('<p style="font-size:14px; color:#4A9DCA; margin:0px;">Fin comentarios</p>');
			//$(".morebox").css('visibility','hidden');
		}
	return false;
	});

</script>




<script type="text/javascript">  
  $(function() {

    var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    $('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
  });
  
function mostra(div)
{    
    var stile=document.getElementById(div).style.display
    if(stile=='')
        document.getElementById(div).style.display='none'
    else
        document.getElementById(div).style.display=''
} 

      $(document.body).ready(function () {
			setTimeout("$('#mycustomscroll').hide()",100);
      });
	  
	      $(function() {
        $('#gallery a').lightBox();
    });
</script>


<script language="javaScript" type="text/javascript">
<!-- para validar el registro de los usuarios en la pagina de alta.php
	function validar()  
	{
	if(document.getElementById('insertant').message.value!=""){ //introduir algun valor
		return true;
	}else{
	document.getElementById('insertant').message.style.border="1px solid #E3001B";
	return false;
	}	
}
//end function
-->
</script>  
</head>
<body> <!-- onload="load(<?php //echo $lat ?>, <?php //echo $lng ?>, 14);"-->
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
			<h3>Partido</h3>
<?php
//$id = mysql_real_escape_string($_GET['pabellon']);

$usuari = "SELECT id FROM usuario WHERE nombre='$_SESSION[usuario]'"; //sacamos el usuario de la session
	$query_usuari = mysql_query($usuari, $link);
		if (@mysql_num_rows($query_usuari)){
			while ($pt = mysql_fetch_row($query_usuari))
			{		
				$id_usuario = $pt[0];									
			}
		}

$local = "SELECT partido.local, partido.id_pabellon, pabellon.id, equipo.id, equipo.categ, club.id, club.nombre, club.img, equipo.grupo, equipo.genero
FROM partido, pabellon, equipo, club
WHERE partido.id = '$id_partit'
AND partido.id_pabellon = pabellon.id
AND equipo.id = partido.local
AND equipo.id_club = club.id
GROUP BY pabellon.id";
$query_local = mysql_query($local, $link);

$visitant="SELECT partido.horario, partido.visitante, equipo.id, equipo.categ, club.id, club.nombre, club.img, partido.id 
	FROM partido, equipo, club, pabellon 
	WHERE partido.id = '$id_partit'
	AND partido.id_pabellon = pabellon.id 
	AND equipo.id = partido.visitante 
	AND equipo.id_club = club.id";
	$query_visitant = mysql_query($visitant, $link);
		
		if ((@mysql_num_rows($query_local))&&(@mysql_num_rows($query_visitant))){
			while ($puni = mysql_fetch_row($query_local) and $puni2 = mysql_fetch_row($query_visitant) )
			{
				$pabellon = $puni[1];
			echo "<div id='esquerra' style='float:left; width:500px; margin-left:20px; margin-right:40px;'>";		
				echo '<div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:520px; float:left;">';
					echo '<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">'.utf8_encode($puni[8]).' ('.utf8_encode($puni[9]).')</p>';
					echo '<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span></div>';		
					
					
					echo '<div id="rivales" style="width:520px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:10px; text-align:center;">';
					echo '<div style="float:left; width:250px; margin-top:25px;">';// equipo local 
						echo "<a href='equipo.php?id=".$puni[3]."&club=".$puni[5]."'><img src='".$puni[7]."' alt='".utf8_encode($puni[4])." ".utf8_encode($puni[6])."' title='".utf8_encode($puni[4])." ".utf8_encode($puni[6])."' style='border:none;' /></a>";
						echo "<p style='font-size:14px; text-align:center;'><a href='equipo.php?id=".$puni[3]."&club=".$puni[5]."' style='text-decoration:none; color:#4A9DCA;'>".utf8_encode($puni[4])." ".utf8_encode($puni[6])."</a></p>";
					echo '</div>';
                	//$id_partido = $pq[7];
                
                	echo '<div style="float:left; width:250px; margin-top:25px;">'; //equipo visitante
						echo "<a href='equipo.php?id=".$puni2[2]."&club=".$puni2[4]."'><img src='".$puni2[6]."' alt='".utf8_encode($puni2[3])." ".utf8_encode($puni2[5])."' title='".utf8_encode($puni2[3])." ".utf8_encode($puni2[5])."' style='border:none;' /></a>";
						echo "<p style='font-size:14px; text-align:center;'><a href='equipo.php?id=".$puni2[2]."&club=".$puni2[4]."' style='text-decoration:none; color:#4A9DCA;'>".utf8_encode($puni2[3])." ".utf8_encode($puni2[5])."</a></p>";
					echo '</div>';
				echo '</div>'; //fin rivales partido
				
				$categ_local = $puni[4];
				$club_local = $puni[6];
				$equip_id_local = $puni[3];
				$idpartit=$puni2[7];
				$categ_visitant = $puni2[3];
				$club_visitant = $puni2[5];
				$equip_id_visitant = $puni2[2];
				$img_local = $puni[7];
				$img_visitante = $puni2[6];
				
				?>	
					
					
				<div style="margin:0px; -webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; padding:10px; width:500px; float:left; background: url('icons/reloj.png') no-repeat scroll 80px 50% #4A9DCA; height:19px; margin-bottom:20px;">	
					
						
						<?php if ($puni2[0]){ //si hay fecha, la cambiamos de formato de BBDD a texto
							$p=split(" ",$puni2[0]);
							$f=split("-",$p[0]);
							$h=split(":",$p[1]);
											
							//cambio de fecha
							$nummes=(int)$f[1];
							$mes1="0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
							$mes1=split("-",$mes1);
											
							//cambio de hora
							$numhora=(int)$h[0];	
							$desfechahora="$f[2] de $mes1[$nummes] de $f[0] a las $numhora:$h[1] h.";
						} //fin formato fecha
						echo '<p style="text-align:center; margin:0px; color:#fff; font-size:14px;"><strong>Horario</strong>: '.$desfechahora.'</p></div>';
													
			}
		}?>
               
            
            
            
            
            <!-- si hay resultado en la bbdd lo publicamos, sino no mostramos nada --> 
			<?php //$marcador="SELECT marcador FROM partido WHERE id='$idpartit'";
					//$query_marcador = mysql_query($marcador, $link);
					//if (@mysql_num_rows($query_marcador)){
						//while ($resultat = mysql_fetch_row($query_marcador)){
							//if ($resultat[0]!="0-0"){
								//echo '<p class="mini-title" style="float:left; text-align:left; margin-top:40px;">RESULTADO:</p>';
								//echo '<p style="float:left; text-align:left; font-size:20px; margin-top:35px; margin-left:8px;">'.$resultat[0].'</p>';	
							//}
							
						//}
					//}?>
            
            
            
            
            
            
            
            
            
                             
            <!-- inicio comentarios -->
            
                
                <div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:520px; float:left;">
					<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">Comentarios  del partido</p>
					<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span></div>
      
                
               <div style="float:left; background-color:#fff; margin-left:0px; margin-top:0px; margin-bottom:0px; width:520px;">
                
                <div id='container'>
                    <ol class="timeline" id="updates">
                    <?php
                    $sql=mysql_query("SELECT messages.*, usuario.* FROM messages, usuario WHERE messages.id_partido='$idpartit' AND messages.id_usuario=usuario.id ORDER BY messages.fecha DESC LIMIT 5");
					
                    while($row=mysql_fetch_array($sql))
                    {
                        $msg_id=$row['msg_id'];
                        $message=stripslashes($row['message']);
						$fecha=$row['fecha'];
						$usuario=$row['nombre'];
						$img = $row['img'];
						$us_id = $row['id_usuario'];
                        ?>

                        <li>
                            <p style="margin:0px; font-size:14px; color:#4A9DCA; padding-bottom:10px;"><?php echo utf8_encode($message); ?></p>
                            <p style="color:#666;">
                            
                            <?php
							
								if ($fecha){ //si hay fecha, la cambiamos de formato de BBDD a texto
									$p=split(" ",$fecha);
									$f=split("-",$p[0]);
									$h=split(":",$p[1]);
									
									//cambio de fecha
									$nummes=(int)$f[1];
									$mes1="0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
									$mes1=split("-",$mes1);
									
									//cambio de hora
									$numhora=(int)$h[0];	
									$desfechahora="$f[2] de $mes1[$nummes] de $f[0] a las $numhora:$h[1] h.";
								} //fin formato fecha
							
							
							if (($img)!=""){?>
                				<p style='font-size:11px; text-align:left; width:100%; color:#4A9DCA; line-height:20px; margin:0px;'><a href="usuario.php?id=<?php echo $us_id ?>"><img src="perfiles/<?php echo $img; ?>" alt="<?php echo $usuario; ?>" title="<?php echo $usuario; ?>" style="border:1px solid #ccc; width:32px; height:32px;" /></a> Comentado el <?php echo $desfechahora;?></p>
                			<?php }else{ ?>
                			<p style='font-size:11px; text-align:left; width:100%; color:#4A9DCA; line-height:20px; margin:0px;'><a href="usuario.php?id=<?php echo $us_id ?>"><img src="perfiles/default.png" alt="<?php echo $usuario; ?>" title="<?php echo $usuario; ?>" style="border:1px solid #ccc" /></a> Comentado el <?php echo $desfechahora;?></p>
                		<?php } ?>                     
						</li>
                    <?php } ?>
                    </ol>
                 
                 
                 <div id="more<?php echo $msg_id; ?>" class="morebox" style="margin-left:40px;">
					<a href="#" class="more" id="<?php echo $msg_id; ?>">ver más comentarios</a>
				</div>  
                    
                </div><!--fin container-->
                
                
                <p style="float:left; font-size:14px; text-align:left; width:100%; margin:0px; color:#4A9DCA; margin-left:40px;">Escribe tu comentario</p>
                <form action="comentar.php" method="post" enctype="multipart/form-data" id="insertant" name="insertant" onSubmit="return validar()" style="float:left; margin-left:40px; margin-bottom:20px;">

                        <div style="mensaje">
                        	<input type="hidden" id="id_partido" name="id_partido" value="<?php echo $idpartit ?>"/>
                            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["usuario"] ?>"/>
                            <textarea name="message" id="message" rows="3" cols="70" maxlength="250" style="font-size:12px; width:455px;"></textarea>
                            <input name="insertar" type="submit" value="Añadir comentario" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:20px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" />
                        </div>
                </form>
          
            </div><!-- fin comentarios -->
            
            <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:500px; float:left; margin:0px 0px 40px 0px;">
				<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;"><a href="#" title="Ir arriba" style="text-decoration:none; color:#fff;">Ir arriba</a></p>
			</div> 
   
   			</div>
            </div><!-- fin esquerra -->
   
   
   			<div style="float:left; width:360px"> <!-- inicio dreta -->
            
            
            <?php 
			$query = "SELECT * FROM pabellon WHERE id=$pabellon";
	
			$query_pab = mysql_query($query, $link);
			if (@mysql_num_rows($query_pab)){
				while ($pabe = mysql_fetch_row($query_pab))
				{	
				$instalacio = $pabe[0];
				//echo $instalacio;
				$lat = $pabe[6];
				$lng = $pabe[7];
				$carrer = $pabe[2];
				$ciutat = $pabe[3];
				$provincia = $pabe[4];
				$zip = $pabe[5];
				}
			}
			
			?>
            
             <div id="mapa" style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:360px; float:left; background: url('icons/ubic.png') no-repeat scroll 15px 50% #4A9DCA;">
				<p style="padding:0 0 0 45px; margin:0px; color:#fff; font-size:14px; text-aling:center; font-weight:bold;">Ubicación</p>
				<span style="position:absolute; top: 36px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
			</div>
                       
            <iframe width="380" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=ca&amp;geocode=&amp;q=<?php echo $carrer ?>,+<?php echo $ciutat ?>&amp;aq=0&amp;oq=<?php echo $carrer ?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $carrer ?>,+<?php $zip ?>+<?php echo $ciutat ?>,+<?php echo $provincia ?>&amp;ll=<?php echo $lat ?>,<?php echo $lng ?>&amp;t=m&amp;z=12&amp;iwloc=A&amp;output=embed" style="margin:0px; padding:0px; float:left;"></iframe>    
            
                      
           
           
           
            <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:360px; float:left; margin:0px 0px 20px 0px;">
				<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;">&nbsp;</p>
			</div> 
            
            
            
            
            
            <div id="checkin" style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:360px; float:left; background: url('icons/generico.png') no-repeat scroll 20px 50% #4A9DCA;">
				<p style="padding:0 0 0 40px; margin:0px; color:#fff; font-size:14px; text-aling:center; font-weight:bold;">Asistencia</p>
				<span style="position:absolute; top: 36px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
			</div>
            
            <div style="float:left; background-color:#fff; margin-left:0px; margin-top:0px; margin-bottom:0px; width:380px;">
            <?php //si ya he confirmado asistencia al partido muestro mensaje y los asistentes confirmados
            $xekin = "SELECT * FROM checkin WHERE id_user = '$id_usuario' AND id_partido = '$idpartit'";
			$query_xekin = mysql_query($xekin, $link);
			if (mysql_num_rows($query_xekin)>0){
						
				echo '<div style="padding:8px 14px; height:auto; float:left; width:100%; margin-left:20px;"><p style="text-decoration:none; float:left; font-size: 14px; font-weight: bold; border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-bottom:0px;">Has confirmado tu asistencia a este partido.</p></div>';?> 					
				
                
                <div id="contador" style="float:left; height:auto; width:auto; color:#000; margin-top:2px; font-size:20px; margin-left:40px;">
                <?php //mostro els checkins que s'han fet per cada partit
                $checkin = "SELECT COUNT(checkin.id) FROM checkin, partido WHERE partido.id = '$idpartit' AND partido.id=checkin.id_partido";
				$query_checkin = mysql_query($checkin, $link);
				if (@mysql_num_rows($query_checkin)){
					while ($pt = mysql_fetch_row($query_checkin)){
						echo "<p style='float:left; text-align:left; font-size:20px; color:#4a9dca; width:330px; margin:8px;'>".$pt[0]."<span style='font-size:12px;'> asistentes confirmados</span></p>";									
					}
				}?>
                </div><!-- fin contador -->
                <div style="width:330px; margin-left:40px; float:left;">
						<?php $amics = "SELECT usuario.*, checkin.*, partido.* FROM checkin, usuario, partido WHERE partido.id = '$idpartit' AND partido.id=checkin.id_partido AND usuario.id=checkin.id_user GROUP BY usuario.id"; //AND usuario.id NOT IN ('".$id_usuario."')
                        $query_amics = mysql_query($amics, $link);
                        if (@mysql_num_rows($query_amics)){
                            while ($amic = mysql_fetch_row($query_amics)){
                                $img = $amic[4];
                                $nom = $amic[1];
                                $amic_id = $amic[0];
                                ?>
                                
                                
                                
                                <div id="amics-checkin" style="float:left; margin:8px 3px;">
                                
                                <?php if (($img)!=""){?>
                                    <a href="usuario.php?id=<?php echo $amic_id ?>"><img src="perfiles/<?php echo $img; ?>" alt="<?php echo $nom; ?>" title="<?php echo $nom; ?>" style="border:1px solid #ccc;" width="32" height="32" /></a></p>
                                    <?php }else{ ?>
                                    <a href="usuario.php?id=<?php echo $amic_id ?>"><img src="perfiles/default.png" alt="<?php echo $nom; ?>" title="<?php echo $nom; ?>" style="border:1px solid #ccc" /></a></p> 
                                    <?php } ?>
                                
                                </div> <!-- fin amics -->
                          
                            <?php }
                        } ?>
                		
                </div>
                
                
			<?php }else{ //si no he confirmado asistencia, muestro el icono para hacer checkin ?>
					
				
                
                <p style="font-size:14px; background-color:#4082A6; width:180px; display:block;font-family: 'FSAlbert'; margin-left: 40px; margin-top: 10px; margin-bottom:0px; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;"><a href="javascript:void(0);" style="text-decoration:none; color:#fff;" onClick="contar(<?php echo $idpartit ?>, <?php echo $id_usuario ?>);" title="Confirma tu asistencia">CONFIRMA TU ASISTENCIA</a></p>        
                    	
                <div id="contador" style="float:left; height:auto; width:auto; margin-left:40px; color:#000; margin-top:2px; font-size:20px;">
                <?php //mostro els checkins que s'han fet per cada partit
                $checkin = "SELECT COUNT(checkin.id) FROM checkin, partido WHERE partido.id = '$idpartit' AND partido.id=checkin.id_partido";
				$query_checkin = mysql_query($checkin, $link);
				if (@mysql_num_rows($query_checkin)){
					while ($pt = mysql_fetch_row($query_checkin)){
						echo "<p style='float:left; text-align:left; font-size:20px; color:#4a9dca; width:330px; margin:8px;'>".$pt[0]."<span style='font-size:12px;'> asistentes confirmados</span></p>";									
					}
				}?>
				</div><!-- fin contador -->
				
                
                <div style="width:330px; margin-left:40px; float:left;">
                		<?php $amics = "SELECT usuario.*, checkin.*, partido.* FROM checkin, usuario, partido WHERE partido.id = '$idpartit' AND partido.id=checkin.id_partido AND usuario.id=checkin.id_user GROUP BY usuario.id"; //AND usuario.id NOT IN ('".$id_usuario."')
				$query_amics = mysql_query($amics, $link);
				
				
				if (@mysql_num_rows($query_amics)){
					while ($amic = mysql_fetch_row($query_amics)){
						$img = $amic[4];
						$nom = $amic[1];
						$amic_id = $amic[0];
						?>
						
                        	<div id="amics-checkin" style="float:left; margin:3px;">
                        
							<?php if (($img)!=""){?>
                            <a href="usuario.php?id=<?php echo $amic_id ?>"><img src="perfiles/<?php echo $img; ?>" alt="<?php echo $nom; ?>" title="<?php echo $nom; ?>" style="border:1px solid #ccc;" width="32" /></a></p>
                            <?php }else{ ?>
                            <a href="usuario.php?id=<?php echo $amic_id ?>"><img src="perfiles/default.png" alt="<?php echo $nom; ?>" title="<?php echo $nom; ?>" style="border:1px solid #ccc;" /></a></p> 
                            <?php } ?>
                        
                        	</div> <!-- fin amics -->
						
					<?php }
				} ?>
			
			</div>
			
			<?php } ?>
            </div>
            <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:360px; float:left; margin:0px 0px 20px 0px;">
				<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;">&nbsp;</p>
			</div> 
            
            
            
            
            
            
            
            
            
            <div id="votar" style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:360px; float:left; background: url('icons/ganador.png') no-repeat scroll 10px 50% #4A9DCA;">
				<p style="padding:0 0 0 40px; margin:0px; color:#fff; font-size:14px; text-aling:center;"><strong>Quién crees que será el ganador?</strong> Vota!</p>
				<span style="position:absolute; top: 36px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
			</div>
            
      
             <div style="width:380px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:0px;">
                
				<?php					
				$consult= "SELECT * FROM partido WHERE id=$idpartit";
				$dada = mysql_query($consult, $link);
				
				if (@mysql_num_rows($dada)){
					while ($tra = mysql_fetch_array($dada))	{
						$total1 += $tra["valor1"]; //suma total1
						$total2 += $tra["valor2"]; //suma total2
							
						$total = $total1 + $total2; //suma total1 y total2 y se guarda en total
						
						if ($total>0){
							$tantpercent1 = ($total1 * 100) / $total; // % de total1 sobre total
							$tantpercent2 = ($total2 * 100) / $total; // % de total2 sobre total
						}?>
				
                <div style="float:left; width:140px; margin-left:80px; margin-top:10px; padding-bottom:10px;"> <!-- equipo local -->
					<div style='float:left; max-width:90px; border:1px solid #000; margin-right:5px;'><a href="javascript:void(0)" onClick="votar1(<?php echo $idpartit; ?>,<?php echo $tra["valor1"]; ?>)" style="text-decoration:none;"><img src="<?php echo $img_local; ?>" alt="Ganador <?php echo utf8_encode($categ_local)." ".utf8_encode($club_local); ?>" title="Ganador <?php echo utf8_encode($categ_local)." ".utf8_encode($club_local); ?>" style="width:30px; border:none;" /></a></div>
        			<p style="float:left; text-align:left; font-size:20px; font-weight:bold; margin:0px 8px 0px 0px; color:#4A9DCA;"><?php echo $tra["valor1"]; ?></p>
        			<p style="float:left; text-align:left; font-size:14px; margin:0px;">
        				<span style="float:left; text-align:left; font-size:12px;  color:#4A9DCA;"><?php if ($total>0){ echo round($tantpercent1,2)." %";}?></span>
            		</p>
    			</div> <!-- fin equipo local -->
    
    			<div style="float:left; width:140px; margin-left:0px; margin-top:10px; padding-bottom:10px;"> <!-- equipo visitante -->  
					<div style='float:left; max-width:90px; border:1px solid #000; margin-right:5px;'><a href="javascript:void(0)" onClick="votar2(<?php echo $idpartit; ?>,<?php echo $tra["valor2"]; ?>)" style="text-decoration:none;"><img src="<?php echo $img_visitante; ?>" alt="Ganador <?php echo utf8_encode($categ_visitant)." ".utf8_encode($club_visitant); ?>" title="Ganador <?php echo utf8_encode($categ_visitant)." ".utf8_encode($club_visitant); ?>" style="width:30px; border:none;" /></a></div>
        			<p style="float:left; text-align:left; font-size:20px; font-weight:bold;margin:0px 8px 0px 0px; color:#4A9DCA;"><?php echo $tra["valor2"]; ?></p>
        			<p style="float:left; text-align:left; font-size:20px; margin:0px;">
        				<span style="float:left; text-align:left; font-size:12px; color:#4A9DCA;"><?php if ($total>0){echo round($tantpercent2,2)." %";}?></span>
        			</p>
				</div> <!-- fin equipo visitante -->
   		<?php }} ?>
			
            
       
            
   
   		<div id="clubdefans" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:380px; float:left; margin-left:0px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">Ingresar en Club de fans de </p>
            <span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
		</div>
        <div style="width:380px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:0px;">    
        	<div style="float:left; width:420px; margin-left:40px; padding-bottom:8px;">
            	<p style="font-size:14px; padding:8px; float:left; text-align:left; margin:0px; width:100%;"><a href="javascript:void(0);" title="<?php echo $categ_local." ".$club_local ?>" onClick="$('#fan').show(); fan(<?php echo $equip_id_local ?>, <?php echo $id_usuario ?>);" style="text-decoration:none; color: #4A9DCA;"><?php echo utf8_encode($categ_local)." ".utf8_encode($club_local) ?></a></p>
                    
                <p style="font-size:14px; padding:8px; float:left; text-align:left; margin:0px; width:100%;"><a href="javascript:void(0);" title="<?php echo $categ_visitant." ".$club_visitant ?>" onClick="$('#fan').show(); fan(<?php echo $equip_id_visitant ?>, <?php echo $id_usuario ?>);" style="text-decoration:none; color: #4A9DCA;"><?php echo utf8_encode($categ_visitant)." ".utf8_encode($club_visitant) ?></a></p>
            </div>
           	<div id="fan"></div>
		</div><!-- fin seguidor -->
   
   
   		
        
         <div style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:380px; float:left; margin-left:0px;">
        		<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">Compartir en redes sociales</p>
            	<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
        	</div>	 
           
            <div style='width:380px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:0px; padding-bottom:10px;'>
                <!-- publicar equipo en Facebook -->
                <a style="float:left; margin-left:40px; padding-top:18px; padding-bottom:0px; margin-right:10px;" href='http://www.facebook.com/sharer.php?u=http://127.0.0.1/eventracker/partido.php?id=<?php echo $idpartit ?>' target='_blank'><img style='border:none;' src='icons/facebook.png' title='Publicar partido en Facebook' /></a> 
                <!-- fin equipo Facebook -->
                
                <!-- publicar equipo en Twitter -->
                <a style="float:left; padding-top:18px; padding-bottom:0px;" target="_blank" href="http://twitter.com/share?text=<?php echo utf8_encode($categ_local)?> de <?php echo utf8_encode($club_local)?> vs. <?php echo utf8_encode($categ_visitant)?> de <?php echo utf8_encode($club_visitant)?> - &hashtags=Eventracker"><img src="icons/twitter.png" alt="Publicar partido en Twitter" title="Publicar partido en Twitter" style="border:none;" /></a><!-- fin equipo Twitter -->
            </div>  
        
        
        
        
        	
            
            <div id="subir-imagen" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:380px; float:left; margin-left:0px;">
        		<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">Publicar imagen</p>
            	<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
			</div>
            
            <div style="width:380px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:0px;">
    			<div style="float:left; width:50px; margin-top:18px; margin-bottom:0px; margin-left:40px;">
                	<img src="icons/upload.png" />
                </div>
                
                <div style="float:left; width:130px; padding-bottom:10px;">
        			<p style="font-size:14px; padding:8px; float:left; text-align:left;"><a href="javascript:void(0)" style="text-decoration:none;color:#4A9DCA;" onClick="$('#cargar').show(); imagen(<?php echo $id_partit ?>, <?php echo $id_usuario ?>)">Publicar imagen</a></p>
                </div>
                
                 <div id="cargar"></div>
			</div><!-- fin subir imagen -->
   
   			
            
            <div id="buscar" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:380px; float:left; margin-left:0px;">
    	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">Buscar partidos</p>
        <span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
	</div>     
    <div style="width:380px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:0px;">
    	<div style="float:left; width:50px; margin-top:18px; margin-bottom:0px; margin-left:40px;"><img src="icons/buscar.png" width="38" title="Buscar partidos" alt="Buscar partidos" /></div>
        <div style="float:left; width:140px; ">
        	<p style="font-size:14px; float:left; text-align:left; margin-top:18px;"><a href="buscar.php" style="text-decoration:none; color: #4A9DCA;" title="Buscar partidos anteriores">Buscar partidos</a></p>
		</div>
	</div><!-- fin buscar --> 
            
            
            
   			
            
		</div> <!-- fin sin nombre -->
        
        <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:360px; float:left; margin:0px 0px 0px 0px;">
			<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;"><a href="#" title="Ir arriba" style="text-decoration:none; color:#fff;">Ir arriba</a></p>
		</div>
	
    </div><!-- dreta -->
    
    
    
    <div id="promos" style="width:960px; margin:0px auto;">
    	<div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:940px; float:left; background: url('icons/ahorro.png') no-repeat scroll 20px 50% #4A9DCA; margin-top:20px;">
			<p style="padding:0 0 0 40px; margin:0px; color:#fff; font-size:14px; text-aling:center;">PROMOCIONES EN LA PROVINCIA</p>
				<span style="position:absolute; top: 36px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA; z-index:100;"></span>
		</div>
		
        <div style="float:left; background-color:#fff; margin-left:0px; margin-top:0px; margin-bottom:0px; width:960px;">
        <?php //mostro les promocions segons la provincia
		function cambiarFormatoFecha($data){ //funcion formato fecha
		list($anio,$mes,$dia)=explode("-",$data);
		return $dia."-".$mes."-".$anio;
		} 
		
                $promos = "SELECT cupon.*, empresa.* FROM cupon, empresa, pabellon WHERE pabellon.id='$pabellon' AND pabellon.provincia=empresa.provincia AND empresa.id=cupon.id_empresa AND cupon.fecha_validacion >= NOW() ORDER BY cupon.fecha_validacion ASC";
				$query_promos = mysql_query($promos, $link);
				if (@mysql_num_rows($query_promos)){
					while ($pt = mysql_fetch_row($query_promos)){
						$idcupon = $pt[0];
						$descargas = $pt[6];
					?>	
						<!-- imprimimos cupones -->
						<div style='float:left; height:200px; width: 440px; border:3px dashed #4a9dca; padding:7px; margin-bottom:8px; margin-right:8px; margin-left:8px; margin-top:12px;'>
                            <div id="foto" style="float:left; width:190px;"><img src="cupon/img/<?php echo $pt[4]?>" style="max-width:190px; max-height:200px;" title="<?php echo utf8_encode($pt[2])?>" alt="<?php echo utf8_encode($pt[2])?>" /></div>
                            <div id="texto" style="float:left; width:240px; margin-left:10px;">
                                <p style='display:block; font-size: 16px; font-weight: bold; width:100%; color:#4a9dca; margin-top:5px; margin-bottom:0px;'><strong><?php echo utf8_encode($pt[2])?></strong></p>
                                <p style='font-size: 12px; float:left; width:100%; margin-top:5px;'><?php echo utf8_encode($pt[3])?></p>
                                <p style='font-size: 12px; float:left; width:100%; margin:0px;'>
                                    <a href='cupon/cupon.php?id=<?php echo $pt[0];?>' target="_blank" title='Descargar cupón' style='text-decoration:none; float:left; font-size: 14px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' onClick='descargados(<?php echo $idcupon ?>, <?php echo $descargas ?>);'>Descargar cupón</a>
                                </p>
                                
                                <p style='font-size: 14px; float:left; width:100%; color:#4a9dca; margin:5px 0px;'><?php echo utf8_encode($pt[8])?></p>
                                <p style='font-size: 14px; float:left; width:100%; color:#4a9dca; margin:5px 0px; '><img src="icons/generico.png" title="Ubicación" alt="Ubicación" width="15" height="18" style="margin-right:8px;" /><?php echo utf8_encode($pt[11])." (".$pt[12].") ".$pt[13]?></p>
                                <p style='font-size: 14px; float:left; width:100%; color:#4a9dca; margin:5px 0px;'>Promoción abierta hasta: <?php echo cambiarFormatoFecha($pt[5])?></p>
                            </div>
                        </div>
															
					<?php }
				}else{ //si no hay cupones activos
					echo "<p style='padding:0 0 0 40px; margin:0px; color:#fff; font-size:14px;'><a style='float:left; font-size:14px; text-align:left; width:100%; margin:20px 0px; padding:0px; color:#4A9DCA;'>No hay ningún cupón activo en esta zona.</a></p>";
					
				}?>
        </div>
        
    	<div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:940px; float:left; margin:0px 0px 0px 0px;">
			<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;"><a href="#" title="Ir arriba" style="text-decoration:none; color:#fff;">Ir arriba</a></p>
		</div>
    </div><!-- fin promos -->
    
    
    <div id="galeria" style="width:960px; margin:0px auto;">
            	            
                
                <div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:940px; float:left; background: url('icons/fotos.gif') no-repeat scroll 20px 50% #4A9DCA; margin-top:20px;">
				<p style="padding:0 0 0 40px; margin:0px; color:#fff; font-size:14px; text-aling:center;">GALERIA DE IMAGENES DEL PARTIDO</p>
				<span style="position:absolute; top: 36px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA; z-index:100;"></span>
			</div>
                
                
                <div id="gallery" class="ad-gallery" style="float:left; margin-bottom:0px; background-color:#fff;">           
                    <div class="ad-nav">
                        <div class="ad-thumbs">
                            <ul class="ad-thumb-list">
                			<?php $modif = mysql_query("SELECT img.*, usuario.* FROM img, usuario WHERE img.id_partit=".$id_partit." AND img.id_usuario=usuario.id ORDER BY img.fecha ASC");
                            	if (@mysql_num_rows($modif)){
								while($row=mysql_fetch_row($modif)){?>
                                	<li><a href="<?php echo $row[1];?>" title="<?php echo $row[1];?>"> <img src="<?php echo $row[1];?>" class="image0" title="<?php echo $row[1];?>" style="height:150px;" /></a></li>
                                    
                             	<?php }
								}else{
									echo "<li><a style='float:left; font-size:14px; text-align:left; width:100%; margin:20px 0px; padding:0px; color:#4A9DCA;'>No se han publicado imagenes en este partido</a></li>";
									
								}?>
                            </ul>
                        </div>
                    </div>
                </div><!-- fin gallery -->
			

 <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:940px; float:left; margin:0px 0px 40px 0px;">
			<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;"><a href="#" title="Ir arriba" style="text-decoration:none; color:#fff;">Ir arriba</a></p>
		</div>
   </div><!-- fin div galeria --> 
    
    
    
    
    </div> <!-- fi general -->
  
 
  
 
<!--<div id="resultados" style="float:right; height:auto; border:1px solid #ccc; background-color:#dedede; margin-top:8px; width:200px; margin-left:20px;">
               <div style="float:left; width:50px; padding:4px;">
                    <img src="icons/icon-consult.png" width="40" />
                </div>
                <div style="float:left; width:140px;">
                    <p style="font-size:11px; padding:8px; float:left; text-align:left;"><a href="http://www.basquetcatala.cat/competicions/resultats/03710101-1/" target="_blank" style="text-decoration:none;">Consultar la jornada en BQCAT</a></p>
                </div>
            </div>--><!-- fin resultados --> 
 
 

</div><!-- fin wrap -->
<?php include "lib/footer.php"; ?>
</body>
</html>     
        