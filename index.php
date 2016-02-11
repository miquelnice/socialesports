<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>

<title>Socialesports</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/global.css"> <!-- css del slider -->
<!--<link rel="stylesheet" href="css/reset.css" />-->

<script src="http://maps.google.com/maps?file=api&amp;v=3&amp;sensor=true_or_false&amp;key=ABQIAAAAftJZsJEylx0lks-kbTjo2RTL8dc_M-RNbKztyf5pIpX04VzEgBTSYB1irLhylJSPE7-9-gfeJ6bVYQ&sensor=false" type="text/javascript"></script>

<? include "lib/js.php";?>
<script src="js/slides.min.jquery.js"></script>

<script language="javaScript" type="text/javascript">
<!-- //para validar el registro de los usuarios en la pagina de alta.php -->
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

$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'imgs/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});

//end function
-->
</script>  
</head>
    <body onload="load(41.689322, 1.582031, 7);">
    <?php include 'lib/config.php'; ?>
        <div class="header"> <!-- Fondo de repetición -->
        
       	<?php include 'lib/publicidad_top.php'; ?>
        
            <div class="cabecera"> <!-- Contenedor cabecera -->
                <a href="index.php" class="logo"><span>socialesports</span></a>
                
                
                <form name="language" id="language" action="#"> <!-- Selector de idioma -->
                    <select name="idioma" id="idioma" onchange="CIdioma(this.id);">
                        <option value="">Español</option>
                        <option value="ca">Català</option>
                        <option value="en">English</option>
                    </select>
                </form>
				<script type="text/javascript">
                    function CIdioma(id){
                       var NuevaPagina = document.getElementById(id);
                       <?php //include "en/EN_en.php"; ?>
                        location.href = 'http://127.0.0.1/socialesports/' + NuevaPagina.value;
					   //location.href = 'http://127.0.0.1/socialesports/' + NuevaPagina.value + '.php';
                    }
                </script>
                
                
                
                <?php include "lib/panel.php"; ?>
            
            <?php include "lib/menu.php"; ?>
            
        </div> <!-- Fin cabecera -->
	</div> <!-- Fin header -->
            
    <!-- Contenido -->
    
	<div id="slides"> <!-- inicio slider -->	
		<div class="slides_container">
           	<a href="#" title="" target="_blank"><img src="imgs/banner_slider.png" width="941" height="235" alt="Slide 1"></a>
            <a href="#" title="" target="_blank"><img src="imgs/rugby.jpg" width="941" height="235" alt="Slide 2"></a>
			<a href="#" title="" target="_blank"><img src="imgs/basquet.jpg" width="941" height="235" alt="Slide 3"></a>
			<!--<a href="#" title="" target="_blank"><img src="http://slidesjs.com/examples/standard/img/slide-7.jpg" width="941" height="235" alt="Slide 7"></a>-->
		</div>
        <!-- <a href="#" class="prev"><img src="imgs/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
		<a href="#" class="next"><img src="imgs/arrow-next.png" width="24" height="43" alt="Arrow Next"></a> -->               
	</div> <!-- fin slider -->
 
    
    <div class="content"> <!-- Fondo de repetición contenido -->
    	<div class="contenido"> <!-- Contenido de la web -->
			<h1 class="elige">Busca el partido que hay en juego por deporte, población y pabellón</h1>
                     
            <div class="buscadores">
            	<form action="#" method="post" id="formulario" style="width:auto;">
					<select id="deportes" name="deportes" onChange="enviodeporte(this.value);">
                    <?php $result = mysql_query("SELECT sport FROM pabellon GROUP BY sport", $link);
					echo '<option value="Selecciona deporte">Selecciona deporte</option>';
					if (@mysql_num_rows($result)){
						while ($row=mysql_fetch_row($result)){ 
							echo '<option value="'.$row[0].'">'.$row[0].'</option>';
						}
					}?>
                    </select>
               	</form>
                    
                <div id="ciudad" style="width:auto;">
                	<select id="city" name="city">
                      	<option>Selecciona población</option>
                    </select>
                </div> 
                            
                <div id="pabellon" style="width:auto;"> 
                   	<select id="pabellon" name="pabellon">
                       	<option>Selecciona pabellón</option>
                    </select>
                </div> 
			</div><!-- Fin buscadores -->
            
            
            
            <div class="fondo_resultados" style="display:none;"> <!-- Fondo repetición resultados -->
                <div class="resultados" style="display:none;"> <!-- Contenido Resultados -->
                    <div id="partit"></div>
                </div>
            </div>            
            
                
            <div class="mapa_sup">
            	<div class="mapa_inf">
                	<div class="mapa" id="map_canvas" style="width: 960px; height: 300px; margin:0px auto;">  <!--Mapa de google --> </div>            	  
                </div>
            </div>
		 
        <!-- publicidad -->
		<div id="banner_robapaginas" style="height:250px; width: 960px; margin: 0 auto; margin-top:10px;">
        	<section style="float: left; width: 300px; height:250px; margin-left: 0px;">
            	<embed src="http://media.adpv.com/PLANTILLA.swf" allowscriptaccess="always" flashvars="peli=Thu2012053194845.swf&amp;web=es.infodrinks.com%2Fbebidas-sin-alcohol%2Fdeportivas%2F&amp;id_zona_web=10640&amp;id_contrato_web=172663&amp;tipo=Click&amp;cantidad=0&amp;campana=4832&amp;b=0&amp;bs=0" height="250" width="300" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
            </section>
            
            <section style="float: left; width: 300px; height:250px; margin-left: 30px;">
            	<img src="http://track.effiliation.com/servlet/effi.show?id_compteur=12246725" alt="" border="0" />
            </section>
            
            <section style="float: left; width: 300px; height:250px; margin-left: 30px;">
            	<img src="http://pagead2.googlesyndication.com/simgad/10672927185830759651" border="0" width="300" height="250" />
            </section>
        </div> <!-- fin publicidad -->
        
	</div> <!-- Fin contenido -->
        
    <?php include "lib/colaboradores.php"; ?>   
        
	</div>  <!-- Fin content -->
              
    <?php include "lib/footer.php"; ?>
    
    
    
    </body>
</html>