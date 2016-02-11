<?php session_start();
include 'lib/config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Cómo funciona</title>
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
	<h3>¿Cómo funciona?</h3>
               
    <div style="width:920px; margin-left:20px; margin-bottom:60px;">
    	<section class="fase">
        	<p style="font-size:18px; color:#4a9dca; margin:0px;"><img src="icons/buscar.png" style="vertical-align:top;" height="20" /> Busca</p>
        	<p>Encuentra tu deporte en la ciudad o pabellón que te interese</p>
        </section>
        
        <section class="fase">
            <p style="font-size:18px; color:#4a9dca; margin:0px;"><img src="icons/basket_ball_azul.png" style="vertical-align:top;" height="20" /> Accede</p>
            <p>Entra en el partido que se está jugando</p>
        </section>
        
        <section class="fase">
            <p style="font-size:18px; color:#4a9dca; margin:0px;"><img src="icons/notificacion.png" style="vertical-align:top;" height="20" /> Comparte</p>
            <p>Disfruta siguiendo el partido con el resto de usuarios</p>
		</section>
        
        <!--<img src="imgs/banner_slider.png" alt="" title="" style="margin-top:10px;" />-->
       
        <p style="font-size:20px; color:#4a9dca; margin:20px 0px 0px 20px; float:left; width:920px; font-family:'Brannbol';">Y todo esto lo puedes hacer desde tu ordenador o tu smartphone Android.</p>
       
        <div style="float:left; margin:0px 0px 40px 0px; padding:0px; width:740px; margin-left:220px;">
			<img src="imgs/laptop.png" alt="" title="" style="height:200px; margin-top:0px; float:left; margin-right:20px;" /> 
            <img src="imgs/smartphone.png" alt="" title="" style="margin-top:65px; height:100px; float:left; margin-right:20px;" />
            <img src="imgs/android_.png" alt="" title="" style="margin-top:65px; height:100px; float:left;" />
        </div>
		<!--<p><a href="#" title=""style="text-decoration:none; color:#4a9dca;">xxx@xxx.com</a></p> -->
                              
	</div>               
</div>
<?php include "lib/footer.php"; ?>
</body>
</html>