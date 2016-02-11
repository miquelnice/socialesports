<?php session_start(); 
include 'lib/config.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include "lib/metas.php";?>
<title>Socialesports - Novedades</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<!--<link rel="stylesheet" href="css/reset.css" />-->

<?php include "lib/js.php";?>

<script language="javaScript" type="text/javascript">
function validar()  
	{
	if(document.getElementById('insertant').nombre.value!=""){ //introduir algun valor
		if(document.getElementById('insertant').correo.value!=""){ //introduir algun valor
			if(document.getElementById('insertant').contrasenya.value!=""){ //introduir algun valor
				return true;
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


	
               <h3>Noticias</h3>
               <!-- Inici noticia -->  
             
             <?php
				function cambiarFormatoFecha($data){
						list($anio,$mes,$dia)=explode("-",$data);
						return $dia."-".$mes."-".$anio;
						} 
				$conexion=mysql_connect('localhost','root',''); 
				mysql_select_db('eventracker', $conexion);
													
				$q = 'SELECT * FROM noticia ORDER BY data DESC';
				$query= mysql_query ($q, $conexion);
				while ($noticia = mysql_fetch_object($query)) {	
				
				echo '<div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:920px; float:left; margin-left:20px;">';
        			echo '<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center; width:900px;">'.utf8_encode($noticia->titulo).'</p>';
        			echo '<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>';
        		echo '</div>';
        
        		echo '<div style="width:920px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; margin-left:20px; margin-bottom:0px;">';
				
					echo '<p style="float:left; width:850px; height:100%; margin:18px 0px 10px 40px; text-align:left; font-weight:bold; font-size:14px;">'.utf8_encode($noticia->comentario).'</p>';
					echo "<a href='$noticia->link' target='_blank' title='".utf8_encode($noticia->link)."' style='margin-left:40px; text-decoration:none; color:#4A9DCA; font-size:14px;'>".utf8_encode($noticia->link)."</a>";
					echo "<div align='center' style='margin-top:20px;'>";
						echo "<img src='img/news/$noticia->foto' title='".$noticia->foto."' alt='".$noticia->foto."'></div>";
				
					echo "<div align='right' style='margin-right:20px;float:right;'><a href='http://www.facebook.com/share.php?u=http://127.0.0.1/eventracker/noticia.php?id=".($noticia->id)."' target='_blank' ><img style='border:none;' src='http://www.aeminguella.com/estils/icono_facebook.png' title='Comparteix al Facebook' /></a>&nbsp;&nbsp;<a href='http://twitter.com/share' class='twitter-share-button' data-count='none' data-lang='es'>Tweet</a><script type='text/javascript' src='http://platform.twitter.com/widgets.js'></script></div>";
					
				echo "</div>";
				
				echo '<div style="-webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:900px; float:left; margin-left:20px; margin-bottom:20px;" >
					<p style="text-align:center; margin:0px; font-size:14px; color:#fff">Fecha publicación: '.cambiarFormatoFecha($noticia->data).'</p></div>';
				}?>                  
                              
                          
</div>
<?php include "lib/footer.php"; ?>
</body>
</html>