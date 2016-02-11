<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>

<title>Socialesports</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<!--<link rel="stylesheet" href="css/reset.css" />-->

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true_or_false&amp;key=ABQIAAAAftJZsJEylx0lks-kbTjo2RTL8dc_M-RNbKztyf5pIpX04VzEgBTSYB1irLhylJSPE7-9-gfeJ6bVYQ&sensor=false" type="text/javascript"></script>

<? include "lib/js.php";?>


<script language="javaScript" type="text/javascript">
<!-- para validar el registro de los usuarios en la pagina de alta.php -->
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
    <body onload="load(41.689322, 1.582031, 7);">
    <?php include 'lib/config.php'; ?>
        <div class="header"> <!-- Fondo de repetición -->
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
        
    <!-- Contenido -->
    <div class="slider">
    	<a href="#" class="imagen"><span>Slider Promo</span></a>
    </div>
    <div class="content"> <!-- Fondo de repetición contenido -->
    	<div class="contenido"> <!-- Contenido de la web -->
			<h1 class="elige">Busca el partit que hi ha en joc per esport, població i pavelló</h1>
                     
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
		
        
        </div> <!-- Fin contenido -->
        
            
      	<?php include "lib/colaboradores.php"; ?>   
        
	</div>  <!-- Fin content -->
              
    <?php include "lib/footer.php"; ?>
    
    
    
    </body>
</html>