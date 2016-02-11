<?php include "autentifica.php";
include('lib/config.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Mensaje directo</title>
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
			<h3>Leer mensajes directos</h3>


<?php 
# Incluimos la configuracion
include('lib/config.php'); 
//include "autentifica.php"; 


//$sql = "SELECT * FROM dm WHERE para='".$_SESSION['usuario']."' and leido IS NULL";
//$res = mysql_query($sql, $link) or die(mysql_error());
//$tot = mysql_num_rows($res);
?>
<!-- Tienes <?php //echo $tot?> mensajes sin leer.-->

<?php
# Obtenemos el mensaje privado
$id = $_GET['id'];
$sql = "SELECT * FROM dm WHERE para='".$_SESSION['usuario']."' and ID='".$id."'";
$res = mysql_query($sql, $link) or die(mysql_error());
$row = mysql_fetch_assoc($res);
?>
<p style="margin-left:20px; float:left; margin-top:0px; width:100%;"><a href="list_dm.php" style="text-decoration:none; float:left; font-size: 14px; font-weight: bold; border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">Ver mensajes</a>
<a href="crear_dm.php" style="text-decoration:none; float:left; font-size: 14px; font-weight: bold; border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-left:10px;">Crear DM</a></p>


<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px; margin-top:20px; margin-left:20px;">De:</label>
<p style="float:left; margin-left:20px; width:100%; margin-top:0px;"><?php echo utf8_encode($row['de'])?></p>
<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px; margin-left:20px;">Fecha:</label>
<p style="float:left; margin-left:20px; width:100%; margin-top:0px;"><?php echo $row['fecha']?></p>
<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px; margin-left:20px;">Asunto:</label>
<p style="float:left; margin-left:20px; width:100%; margin-top:0px;"><?php echo utf8_encode($row['asunto'])?></p>
<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px; margin-left:20px;">Mensaje:</label>
<p style="float:left; margin-left:20px; width:100%; margin-bottom:40px; margin-top:0px;"><?php echo utf8_encode($row['texto'])?></p>

<?php 
# Avisamos que ya lo leimos
if($row['leido'] != "si")
{
	mysql_query("UPDATE dm SET leido='si'",$link) or die(mysql_error());
}
?>

</div>


<?php include "lib/footer.php"; ?>

</body>
</html>