<?php session_start();
include 'lib/config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Contacta</title>
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

function contacto()  
	{
	if(document.getElementById('contact').nombre.value!=""){ //introduir algun valor
		if(document.getElementById('contact').correo.value!=""){ //introduir algun valor
			if(document.getElementById('contact').mensaje.value!=""){ //introduir algun valor
				if(document.getElementById('contact').acepto.checked){
					return true;
				}else{
				document.getElementById('alerta').style.border="1px solid #E3001B";	
				document.getElementById('alerta').style.width="88";
				document.getElementById('alerta').style.padding="10px";	
				return false;
				}
			}else{
			document.getElementById('contact').mensaje.style.border="1px solid #E3001B";
			return false;
			}
		}else{
		document.getElementById('contact').correo.style.border="1px solid #E3001B";
		return false;
		}
	}else{
	document.getElementById('contact').nombre.style.border="1px solid #E3001B";
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
	<h3>Contacta</h3>
               
    <div style="width:920px; margin-left:20px; margin-bottom:60px;">
    	
        <p style="margin:0px;">¿Tienes alguna duda, sugerencia o un mensaje que quieras hacernos llegar?</p>
		<p>En Socialesports queremos mejorar tu experiencia y para ello estamos abiertos a escuchar tus sugerencias y opiniones. Con tu ayuda, podemos mejorar cada día.</p>
		<p>Escríbenos un email a <a href="mailto:info@socialesports.com" title="Enviar correo" style="text-decoration:none; color:#4a9dca;">info@socialesports.com</a> o rellena el formulario. Leeremos y estudiaremos todas las opiniones detenidamente. </p>
		<p>¡Saludos!</p>
		<p>Equipo de Socialesports</p>
        
        
        
        <form action="#" method="post" enctype="multipart/form-data" id="contact" name="contact" onSubmit="return contacto()" style="width:400px;float:left; margin-top:30px; margin-bottom:60px;">
		
			
			               
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Nombre</label>
            <input name="nombre" type="text" id="nombre" size="30" style='width:240px; float:left; margin-bottom:8px;' />              
            
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">E-mail</label>
            <input name="correo" type="email" id="correo" size="30" style='width:240px; float:left; margin-bottom:8px;' />   
            
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Mensaje</label>
            <textarea name="mensaje" type="text" id="mensaje" rows="6" style='width:240px; float:left; margin-bottom:15px;'></textarea>
			
            <p id="alerta" style="float:left; text-align:left; font-size:12px; color:#666; width:100%;"><input type="checkbox" name="acepto" id="acepto" /> He leído y acepto la <a href="aviso_legal.php" style="text-decoration:none; color: #4A9DCA;" onclick="$(this).modal({width:800, height:400}).open(); return false;">política de protección de datos</a></p>
            
            <input type="submit" value="ENVIAR" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" />
            </form>
            
        

                              
	</div>               
</div>
<?php include "lib/footer.php"; ?>
</body>
</html>