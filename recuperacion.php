<?php
include "lib/config.php";

if($_POST['rcorreo']!=""){
	$correo = $_POST['rcorreo'];
	
	$tra = "SELECT * FROM usuario WHERE mail='$correo'"; //selecciono el password del mail insertado
	$query_tra = mysql_query($tra);
		if (@mysql_num_rows($query_tra)>0){ //si devuelve registros
			while ($pw = mysql_fetch_row($query_tra))
			{
				$password= $pw[3]; //guardo el password
				$nombre = $pw[1]; //guardo el nombre
				$para = $pw[2];
				$mail = "no-reply@socialesports.com";
				
				
				//mando el mail con la funcion de correo
				$header = "From: " . $mail . " \r\n";
				$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
				$header .= "Mime-Version: 1.0 \r\n";
				$header .= "Content-Type: text/html; charset=iso-8859-1";
				
				$mensaje = "Hola " . $nombre . "!<br/>";
				$mensaje .= "A continuacion le facilitamos el password que ha solicitado: " . $password . " <br/>";
				
				
				$asunto = "Recuperacion de password Socialesports";
				
				mail($para, $asunto, $mensaje, $header);
				
				header ("Location: enviado.php"); //una vez mandado el mail, muestro mensaje conforme se mandó correctamente
							
			 }
		}else{?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Recuperación de contraseña</title>
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
        <h3>Recuperación de contraseña</h3>			
        
        <?php echo "<div id='error' style='width: 920px; float:left; padding:8px; margin-top:0px; margin-left:20px; margin-bottom:40px;'>
<p style='float:left; font-size:14px; color:#4a9dca; text-align:left; width:100%;'>No exite este correo. Inténtalo de nuevo.</p></div>";
		 
		echo "</div>"; //cierre wrap	 
include "lib/footer.php"; ?>
</body>
</html>
		
<?php }
} ?>