<?php session_start();
include 'lib/config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Sobre nosotros</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<!--<link rel="stylesheet" href="css/reset.css" />-->

<? include "lib/js.php";?>

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
	<h3>Sobre nosotros</h3>
               
    <div style="width:920px; margin-left:20px; margin-bottom:60px;">
    	<p style="font-size:18px; color:#4a9dca; margin:0px;">¿Qué es Socialesports?</p>
        <p>Socialesports es una red social en la que el usuario puede conocer todo tipo de eventos deportivos y sus ubicaciones. Podrá seguir los partidos de diferentes deportes y competiciones  y crear comunidades entorno a entidades deportivas y fomentar, de este modo, una red de seguidores de equipos amateur, de formación o de base.</p>
        <p>Es accesible en dos entornos. Por un lado el entorno web tradicional, y por otro, la aplicación para dispositivos móviles Android.</p>
		
        <p style="font-size:18px; color:#4a9dca;">El equipo</p>
        <p>Socialesports está formado por un equipo joven y emprendedor cuya pasión es el deporte.</p>
        
                
        <div style="width:960px; margin:0px auto; float:left;">     
            <div style='float:left; margin-right:10px;'>
                <img src="imgs/edgar.jpg" alt="Edgar Frías Jiménez" title="Edgar Frías Jiménez" style="width:120px;" />
            </div>
            <div style='float:left; width:250px;'>
                <p style='font-size:16px; text-align:left; color:#4a9dca; font-weight:bold;'>Edgar Frías Jiménez</p>
                <p style='font-size:14px; text-align:left;'>Co-fundador</p>
                <p style='font-size:14px; text-align:left;'><a href="http://es.linkedin.com/in/edfriasji" target="_blank" title="Ver perfil" style="text-decoration:none; color:#4a9dca;">Ver perfil</a></p>
            </div>
		</div>
        
        <div style="width:960px; margin:0px auto; float:left; margin-top:10px;">
            <div style='float:left; margin-right:10px;'>
                <img src="imgs/miquel.jpg" alt="Miquel Fradera Domingo" title="Miquel Fradera Domingo" style="width:120px;" />
            </div>
            <div style='float:left; width:250px;'>
                <p style='font-size:16px; text-align:left; color:#4a9dca; font-weight:bold;'>Miquel Fradera Domingo</p>
                <p style='font-size:14px; text-align:left;'>Co-fundador</p>
                <p style='font-size:14px; text-align:left;'><a href="http://es.linkedin.com/in/miquelfradera" target="_blank" title="Ver perfil" style="text-decoration:none; color:#4a9dca;">Ver perfil</a></p>
            </div>
		</div>  
        
		<!--<p style="font-size:18px; color:#4a9dca; float:left; width:960px;">¿Dónde encontrarnos?</p>
        <p>Nuestra startup está ubicada en Barcelona. Nuestras oficinas se encuentran en el 021Espai Coworking Barcelona, muy cerca de la plaza de Les Glories, el Disseny Hub Barcelona, el Teatro Nacional de Catalunya, el Auditorio de Barcelona, el Fórum y a ¡sólo 10 minutos a pie de la playa de la Marbella!</p>
        
        
        
        <div style="widht:960px;">
        
        <iframe src="http://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=calle+badajoz,+88,+barcelona&amp;aq=&amp;ie=UTF8&amp;hq=&amp;hnear=Carrer+de+Badajoz,+88,+08005+Barcelona,+Catalu%C3%B1a&amp;t=m&amp;vpsrc=6&amp;ll=41.398494,2.195656&amp;spn=0.003461,0.010428&amp;z=16&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="486" height="315" style="float:left; margin-right:20px;"></iframe>
        
        <div style="float:left; width:400px;">
            <p><strong><span style="color: #4a9dca;"><br>
                021Espai Coworking Barcelona<br>
                C/ Badajoz 88</span></strong> - 08005 Barcelona<br>
                <span style="color: #4a9dca;"><strong>Teléfono</strong></span>&nbsp;93 177 83 42&nbsp;&nbsp;&nbsp;</p>
                
                <p><span style="color: #4a9dca;"><strong>Metro:</strong></span> Llacuna /&nbsp;línea L4 o Glories /&nbsp;línea L1.<br>
                <span style="color: #4a9dca;"><strong>Autobus:</strong></span> 71, 192, 92, 6, 141, N8.<br><br>
                Si vienes fuera de Barcelona, el acceso es muy fácil desde la ronda del Litoral.</p>
		</div>
        </div>-->

        
        
        
        
        <!--<p style="font-size:18px; color:#4a9dca; float:left; width:960px;">Premios y prensa</p> 
         <img src="imgs/yuzz.png" alt="Yuzz" title="Yuzz" style="float:left; margin-right:20px;" /><img src="imgs/impulsa.png" alt="Fòrum Impulsa 2012" title="Fòrum Impulsa 2012" style="float:left;" /> -->
        
        <p style="font-size:18px; color:#4a9dca; float:left; width:960px;">Colaboradores</p> 
        <a href="http://www.yuzz.org" title="Yuzz. Fundación Banesto" target="_blank"><img src="imgs/yuzz.png" alt="Yuzz" title="Yuzz" style="float:left; margin-bottom:60px; margin-right:20px; border:none;" /></a><a href="http://www.basquetcatala.com" title="Federació Catalana de Bàsquet" target="_blank"><img src="imgs/fcbq.png" alt="Federació Catalana de Bàsquet" title="Federació Catalana de Bàsquet" style="float:left; margin-right:20px; border:none;" /></a><a href="http://www.rugby.cat" title="Federació Catalana de Rugby" target="_blank"><img src="imgs/fcr.png" alt="Federació Catalana de Rugby" title="Federació Catalana de Rugby" style="float:left; margin-right:20px; border:none;" /></a>                  
	
    
    </div>               
</div>
<?php include "lib/footer.php"; ?>
</body>
</html>