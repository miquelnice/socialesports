<?php
include "autentifica.php";
include "lib/config.php";
//$id_equipo = $_GET['id_equipo'];
//$id_user = $_GET['id_user'];

$id_equipo = $_GET['id'];
$query_grup = "SELECT clubfans.id_user, usuario.id, usuario.nombre FROM clubfans, usuario WHERE clubfans.id_equipo=$id_equipo AND clubfans.id_user=usuario.id AND usuario.nombre='".$_SESSION['usuario']."'";
$query_grupo = mysql_query($query_grup, $link);
if (@mysql_num_rows($query_grupo)){
	while ($claro = mysql_fetch_row($query_grupo)){	
		$id_user = $claro[0];
		$user = $claro[2];
	}
}


if($_SESSION["usuario"]!= $user){ //si no eres el usuario de la sesion no tienes acceso a la pagina del club de fans 
	echo "<div style='float:left; text-align:left; border:1px solid #ccc; background-color:#dedede; margin-top:8px; width:258px;'><p style='font-size:11px; color:#E3001B; padding:8px 14px;'>No puedes acceder a esta página. No formas parte del club de fans del equipo.<br/><br/><a href='index.php' style='text-decoration:none; font-size:11px;'>Volver a la pagina principal</a></p></div>";
	}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Club de fans</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<!--<link rel="stylesheet" href="css/reset.css" />-->

<? include "lib/js.php";?>

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
/* funcion más, para ver más comentarios en los clubs de fans */

//More Button
	$('.more').live("click",function() 
	{
		var ID = $(this).attr("id");
		if(ID)
		{
			$("#more"+ID).html('<img src="icons/loader.gif" />');
			$.ajax({
				type: "POST",
				url: "mas_clubdefans.php",
				data: "lastmsg="+ ID +"&id_equipo="+ <?php echo $_GET['id'];?>, 
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
			<h3>Club de fans</h3>
			
            <div id='esquerra' style='float:left; width:500px; margin-left:20px; margin-right:40px;'>
            
            <div id="clubfans" style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:520px; float:left; margin-left:20px; height:40px;">

			<?php $fan = "SELECT clubfans.id_equipo, equipo.categ, club.nombre, club.img FROM clubfans, equipo, club WHERE clubfans.id_equipo=$id_equipo AND equipo.id=clubfans.id_equipo AND club.id=equipo.id_club GROUP BY clubfans.id_equipo"; // sacamos el club de fans del equipo al que sigue el usuario
			$query_fan = mysql_query($fan, $link);
		       			
			if (mysql_num_rows($query_fan)){
				while ($row = mysql_fetch_row($query_fan))
				{
				echo "<img src='".$row[3]."' alt='".utf8_encode($row[1]).' '.utf8_encode($row[2])."' title='".utf8_encode($row[1]).' '.utf8_encode($row[2])."' width='30' style='float:left; width:30px; border:1px solid #000; height:30px; margin-top:5px; margin-left:5px; margin-bottom:5px;' />";
				echo '<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">'.utf8_encode($row[1])." ".utf8_encode($row[2]).'</p>';
				echo '<span style="position:absolute; top:38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>';
				}
			}?>
			</div>	
              
                
	<div style="width:520px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;">              
		
        
             
        
        
        <p style="float:left; width:100%; height:100%; margin-top:15px; margin-left:40px; margin-bottom:0px; color:#4A9DCA;">Comentarios en el club de fans del equipo</p>
          
        <div id='container'>
        	<ol class="timeline" id="updates">
            <?php
            $sql=mysql_query("SELECT comentarios.*, usuario.* FROM comentarios, usuario WHERE comentarios.id_equipo='$id_equipo' AND comentarios.id_usuario=usuario.id ORDER BY comentarios.fecha_c DESC LIMIT 5");
					
            while($row=mysql_fetch_array($sql))
            {
            $comentario_id=$row['comentario_id'];
            $comentario=stripslashes($row['comentario']);
			$fecha=$row['fecha_c'];
			$usuario=$row['nombre'];
			$img = $row['img'];
			$us_id = $row['id_usuario'];
            ?>

            <li>
            	<p style="margin:0px; font-size:14px; color:#4A9DCA; padding-bottom:10px;"><?php echo utf8_encode($comentario); ?></p>
                    
                            
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
				}
					
							
				if (($img)!=""){?>
                	<p style='font-size:11px; text-align:left; width:100%; color:#4A9DCA; line-height:20px; margin:0px;'><a href="usuario.php?id=<?php echo $us_id ?>"><img src="perfiles/<?php echo $img; ?>" alt="<?php echo utf8_encode($usuario); ?>" title="<?php echo utf8_encode($usuario); ?>" style="border:1px solid #ccc; width:32px; height:32px;" /></a> Comentado el <?php echo $desfechahora;?></p>
                <?php }else{ ?>
                	<p style='font-size:11px; text-align:left; width:100%; color:#4A9DCA; line-height:20px; margin:0px;'><a href="usuario.php?id=<?php echo $us_id ?>"><img src="perfiles/default.png" alt="<?php echo utf8_encode($usuario); ?>" title="<?php echo utf8_encode($usuario); ?>" style="border:1px solid #ccc" /></a> Comentado el <?php echo $desfechahora;?></p>
                <?php } ?>                     
			</li>
		<?php } ?>
        </ol>
                   
        <div id="more<?php echo $comentario_id; ?>" class="morebox" style="margin-left:40px;">
			<a href="#" class="more" id="<?php echo $comentario_id; ?>">ver más comentarios</a>
		</div>
                    
	</div><!--fin container-->
                
                
	<p style="float:left; font-size:14px; text-align:left; width:100%; margin:0px; color:#4A9DCA; margin-left:40px;">Escribe tu comentario</p>
    <form action="comentar_clubfans.php" method="post" enctype="multipart/form-data" id="insertant" name="insertant" onSubmit="return validar()" style="float:left; margin-left:40px; margin-bottom:20px;">                
    	<div style="mensaje">
           	<input type="hidden" id="id_equipo" name="id_equipo" value="<?php echo $_GET['id'] ?>"/>
            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['usuario']; ?>"/>
            <textarea name="comentario" id="comentario" rows="3" cols="70" maxlength="250" style="font-size:12px; width:460px;"></textarea>
            <input name="insertar" type="submit" value="Añadir comentario" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:20px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" />
        </div>
	</form>
         
</div><!-- fin div sin nombre -->
 <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:500px; float:left; margin:0px 0px 40px 20px;">
	<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;"><a href="#" title="Ir arriba" style="text-decoration:none; color:#fff;">Ir arriba</a></p>
</div>               
   
   
 </div><!-- fin esquerra -->
   
   
   			<div style="float:left; width:360px"> <!-- inicio dreta -->  
   
   
   
   
   
   
   
   <div id="grupo" style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:360px; float:left; margin-left:20px; height:40px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">Miembros</p>
			<span style="position:absolute; top: 36px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
			<div style="width:360px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:0px;">       
            
            <div style="width:330px; margin-left:40px; float:left;">
			<?php //conto els usuaris que hi ha dins del clubdefans SELECT COUNT(*) FROM clubfans WHERE id_equipo=$id_equipo
			$checkin = "SELECT clubfans.id_user, usuario.nombre, usuario.img FROM clubfans, usuario WHERE clubfans.id_equipo=$id_equipo AND usuario.id=clubfans.id_user";
			$query_ch= mysql_query($checkin, $link);
			if (@mysql_num_rows($query_ch)){
				while ($pl = mysql_fetch_row($query_ch))
				{
					echo '<div style="float:left; width:32px; margin:3px;">';	
					if(($pl[2])!=""){
						echo '<a href="usuario.php?id='.$pl[0].'" title="Ir al perfil de '.utf8_encode($pl[1]).'"><img src="perfiles/'.$pl[2].'" style="float:left; width:32px; height:32px; border:none;" /></a></div>';
					}else{
						echo '<a href="usuario.php?id='.$pl[0].'" title="Ir al perfil de '.utf8_encode($pl[1]).'"><img src="perfiles/default.png" style="float:left; border:none;" /></a></div>';
					}?>
			    <?php }
			}else{
				echo "<p style='float:left; font-size:14px; text-align:left; width:100px; padding:8px; color:#4A9DCA;'>No hay ningún usuario</p>";
			}?>   
            </div>
            </div> 
             
            <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:340px; float:left; margin:0px 0px 40px 0px;">
	<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;">&nbsp;</p>
</div>     
		</div><!-- fin grupo -->
   
            
     
   
   
   
   
   
   
</div><!-- fin dreta -->   
        
</div><!-- fin wrap -->
<?php include "lib/footer.php"; ?>
	</body>
</html>
<?php } ?> 