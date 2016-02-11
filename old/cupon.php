<?php session_start();
include 'lib/config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Cupones</title>
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
	<h3>Cupones</h3>
               
    <div style="width:920px; margin-left:20px; margin-bottom:60px;">
    	<section class="fase">
        	<p style="font-size:18px; color:#4a9dca; margin:0px;"><img src="icons/buscar.png" style="vertical-align:top;" height="20" /> Busca</p>
        	<p>Encuentra las ofertas de productos o servicios deportivos que tienes cerca</p>
        </section>
        
        <section class="fase">
            <p style="font-size:18px; color:#4a9dca; margin:0px;"><img src="icons/basket_ball_azul.png" style="vertical-align:top;" height="20" /> Descarga</p>
            <p>Recibe los cupones de forma inmediata e imprímelos tantas veces como quieras, incluso compartiéndolos con tus amigos.</p>
        </section>
        
        <section class="fase">
            <p style="font-size:18px; color:#4a9dca; margin:0px;"><img src="icons/notificacion.png" style="vertical-align:top;" height="20" /> Ahorra</p>
            <p>Nada de prepago! Paga cuando consumas en el establecimiento. Repite tantas veces como quieras mientras dure la promoción.</p>
		</section>
        
        <img src="imgs/banner_slider.png" alt="" title="" style="margin-top:10px;" />
        
        <div id="cupones" style="margin-left:20px; margin-bottom:60px; margin-top:30px;">
        
            <div style='float:left; height:200px; width: 425px; border:3px dashed #4a9dca; padding:7px; margin-bottom:10px; margin-right:8px'>
                <div id="foto" style="float:left; width:190px;"><img src="imgs/yuzz.png" title="" alt="" /></div>
                <div id="texto" style="float:left; width:225px; margin-left:10px;">
                    <p style='display:block; font-size: 12px; font-weight: bold; width:100%;'><strong>Título promoción</strong></p>
                    <p style='font-size: 12px; float:left; width:100%; margin-top:0px;'>Texto descripción promoción Texto descripción promoción Texto descripción promoción Texto descripción promoción Texto descripción promoción</p>
                    <p style='font-size: 12px; float:left; width:100%; margin:0px;'>
                        <a href='javascript:void(0)' title='Descargar cupón' style='text-decoration:none; float:left; font-size: 14px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' onClick='#'>Descargar cupón</a>
                    </p>
                    <p style='font-size: 12px; float:left; width:100%;'>Promoción abierta hasta:</p>
                </div>
            </div>
            
            <div style='float:left; height:200px; width: 425px; border:3px dashed #4a9dca; padding:7px; margin-bottom:10px;'>
                <div id="foto" style="float:left; width:190px;"><img src="imgs/yuzz.png" title="" alt="" /></div>
                <div id="texto" style="float:left; width:225px; margin-left:10px;">
                    <p style='display:block; font-size: 12px; font-weight: bold; width:100%;'><strong>Título promoción</strong></p>
                    <p style='font-size: 12px; float:left; width:100%; margin-top:0px;'>Texto descripción promoción Texto descripción promoción Texto descripción promoción</p>
                    <p style='font-size: 12px; float:left; width:100%; margin:0px;'>
                        <a href='cupon.php?id=$id' title='Descargar cupón' style='text-decoration:none; float:left; font-size: 14px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' onClick='$(this).modal({width:800, height:400}).open(); return false;'>Descargar cupón</a>
                    </p>
                    <p style='font-size: 12px; float:left; width:100%;'>Promoción abierta hasta:</p>
                </div>
            </div>
        
       </div>

        
                              
	</div>               
</div>
<?php include "lib/footer.php"; ?>
</body>
</html>