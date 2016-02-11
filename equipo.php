<?php include "autentifica.php";
include "lib/config.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Equipo</title>
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
        	<h3>Equipo</h3>
            
            <div id='esquerra' style='float:left; width:620px; margin-left:0px; margin-right:40px;'>
            
			<div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:620px; float:left; margin-left:20px;">
        		<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">INFORMACIÓN DEL EQUIPO</p>
            	<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
        	</div>	 
       
        
<?php
$id_equipo = mysql_real_escape_string($_GET['id']);
$id_club = mysql_real_escape_string($_GET['club']);
//$id = mysql_real_escape_string($_GET['pabellon']);

$usuari = "SELECT id FROM usuario WHERE nombre='$_SESSION[usuario]'"; //sacamos el usuario de la session
	$query_usuari = mysql_query($usuari, $link);
		if (@mysql_num_rows($query_usuari)){
			while ($pt = mysql_fetch_row($query_usuari))
			{		
				$id_usuario = $pt[0];									
			}
		}


echo "<div id='partit-live' style='width:620px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;'>";//width:512px;

$local = "SELECT equipo.id, equipo.categ, club.id, club.nombre, club.img, equipo.grupo, equipo.genero FROM equipo, club WHERE equipo.id='$id_equipo' AND club.id='$id_club'";
$query_local = mysql_query($local, $link);
if (@mysql_num_rows($query_local)){
	while ($puni = mysql_fetch_row($query_local)){
		echo "<div style='width:auto; float:left; height:100%; padding-top:18px; padding-bottom:20px; margin-left:40px;'>";
			echo "<div style='float:left; width:50px; border:1px solid #000; margin-right:5px; height:auto;'><a href='equipo.php?id=".$puni[0]."&club=".$puni[2]."'><img src='".$puni[4]."' alt='".utf8_encode($puni[1])." ".utf8_encode($puni[3])."' title='".utf8_encode($puni[1])." ".utf8_encode($puni[3])."' style='border:none;' /></a></div>";
		echo "<div style='float:right; margin-left:4px; width:auto;'>";
			echo "<p style='font-size:14px; margin:0px;'><a href='equipo.php?id=".$puni[0]."&club=".$puni[2]."' style='text-decoration:none; color:#4A9DCA;'>".utf8_encode($puni[1])." ".utf8_encode($puni[3])."</a></p>";
			echo "<p style='font-size:14px; color:#4A9DCA; margin:0px;'>".utf8_encode($puni[5])."</p></div></div>";
			
							
		$categ = $puni[1];
		$nombre_club = $puni[3];		
	}
}
echo "</div>";	
	?>               
           
           
           

			
            
            <div id="calendarios" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:620px; float:left; margin-left:20px;">
        		<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">CALENDARIO</p>
            	<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
        	</div>	 
            
			<div style="width:620px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;">   
            	<div style="float:left; width:50px; margin-top:18px; margin-left:40px; margin-bottom:20px;"><img src="icons/calendar-icon.png" width="40" /></div>
                <div style="float:left; width:140px;">
                    <p style="font-size:14px; padding:8px; float:left; text-align:left; width:100%;"><a href="javascript:void(0);" title="<?php echo $categ." ".utf8_encode($nombre_club) ?>" onClick="$('#calendari').show(); calendari(<?php echo $id_equipo ?>);" style="text-decoration:none; color:#4A9DCA;"><?php echo $categ." ".utf8_encode($nombre_club) ?></a></p>
                </div>
                
                <div id="calendari" style="float:left; margin-top:0px; width:580px; margin-left:20px;"></div>
            </div><!-- fin calendarios -->
            
            
			
  
            
            
            <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:600px; float:left; margin:0px 0px 40px 20px;">
	<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;">&nbsp;</p>
</div>        
                      
  
            
 
 </div><!-- fin esquerra -->
 <div style="float:left; width:260px"> <!-- inicio dreta -->
 
 
 
 <div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; position:relative; background-color:#4A9DCA; width:260px; float:left; margin-left:20px;">
        	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">Ser seguidor</p>
        	<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
        </div>
        
        <div style="width:260px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px; margin-bottom:0px;">
        	   
            <p style="float:left; width:100%; height:100%; margin:20px 0px 10px 40px; text-align:left; color:#4A9DCA">Te sugerimos que sigas a</p>
    
                      	
                
                <?php 
				$nui="SELECT equipo.id, equipo.categ, club.id, club.nombre, club.img FROM partido, equipo, club, seguidor WHERE partido.local=equipo.id  AND equipo.id_club=club.id AND seguidor.id_equipo=equipo.id AND seguidor.id_user!='$id_usuario' AND equipo.id!='$id_equipo' GROUP BY equipo.id ORDER BY RAND() LIMIT 5"; //con random para mostrar 5 equipos sugeridos
				$query_nui = mysql_query($nui, $link);
				if (@mysql_num_rows($query_nui)){
					while ($guai = mysql_fetch_row($query_nui)){
						echo '<div id="sugerencia" style="float:left; height:auto; width:260px; color:#000; padding:8px; margin-left:40px; ">';										
							echo "<div style='float:left; width:50px; border:1px solid #000; margin-right:8px; height:auto;'><img src='".$guai[4]."' alt='".utf8_encode($guai[1])." ".utf8_encode($guai[3])."' title='".utf8_encode($guai[1])." ".utf8_encode($guai[3])."' width='50' /></div>";
							echo "<div style='float:left; width:200px;'>";
								echo "<p style='float:left; text-align:left; font-size:14px; width:150px; margin-top:0px;'>"; ?>
                                	<a href="javascript:void(0);" title="<?php echo $guai[1]." ".$guai[3] ?>" onClick="$('#supporter').show(); seguir(<?php echo $guai[0] ?>, <?php echo $id_usuario ?>);" style="text-decoration:none; color:#4A9DCA;"><?php echo utf8_encode($guai[1])." ".utf8_encode($guai[3])."</a></p></div></div>";
					}
				}else{
					echo "<p style='float:left; width:100%; height:100%; margin:18px 0px 0px 10px; text-align:left; color:#4A9DCA;'>No hay sugerencias</p>";
				}//cierre if				
               ?>
               
             <p id="supporter"></p>  
			</div>
 <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:240px; float:left; margin:0px 0px 40px 20px;">
	<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;">&nbsp;</p>
</div>
 
 
 
 
 
 
 <div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:260px; float:left; margin-left:20px;">
        		<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">Compartir en redes sociales</p>
            	<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
        	</div>	 
           
            <div style='width:260px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;'>
                <!-- publicar equipo en Facebook -->
                <a style="float:left; margin-left:40px; padding-top:18px; padding-bottom:20px; margin-right:10px;" href='http://www.facebook.com/sharer.php?u=http://127.0.0.1/eventracker/equipo.php?id=<?php echo $id_equipo ?>' target='_blank'><img style='border:none;' src='icons/facebook.png' title='Publicar partido en Facebook' /></a> 
                <!-- fin equipo Facebook -->
                
                <!-- publicar equipo en Twitter -->
                <a style="float:left; padding-top:18px; padding-bottom:20px;" target="_blank" href="http://twitter.com/share?text=<?php echo utf8_encode($categ." ".$nombre_club)?> - &hashtags=Eventracker"><img src="icons/twitter.png" alt="Publicar partido en Twitter" title="Publicar partido en Twitter" style="border:none;" /></a><!-- fin equipo Twitter -->
            </div>
 
 
 
 
 
          <div id="buscar" style="margin-bottom:0px; position:relative; background-color:#4A9DCA; width:260px; float:left; margin-left:20px;">
    	<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">Buscar partidos</p>
        <span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
	</div>     
    <div style="width:260px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px;">
    	<div style="float:left; width:50px; margin-top:18px; margin-bottom:0px; margin-left:40px;"><img src="icons/buscar.png" width="38" title="Buscar partidos" alt="Buscar partidos" /></div>
        <div style="float:left; width:140px; ">
        	<p style="font-size:14px; float:left; text-align:left; margin-top:18px;"><a href="buscar.php" style="text-decoration:none; color: #4A9DCA;" title="Buscar partidos anteriores">Buscar partidos</a></p>
		</div>
	</div><!-- fin buscar -->
 <div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:240px; float:left; margin:0px 0px 40px 20px;">
	<p style="text-align:center; margin:0px; text-transform: uppercase; font-size:12px;">&nbsp;</p>
</div>        
 
 
          
            
 </div><!-- fin dreta -->        
</div>
<?php include "lib/footer.php"; ?>
</body>
</html>             