<?php include "autentifica.php";
include('lib/config.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<? include "lib/metas.php";?>
<title>Socialesports</title>
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


        
         <?php 					
					
					$usuari = "SELECT id FROM usuario WHERE nombre='$_SESSION[usuario]'"; //sacamos el usuario de la session
					$query_usuari = mysql_query($usuari, $link);
						if (@mysql_num_rows($query_usuari)){
							while ($pt = mysql_fetch_row($query_usuari))
							{		
								$id_usuario = $pt[0];									
							}
						}
				?>
        
        <div id="wrap">
            <h3>Buscar partidos</h3>
            
            <p style="float:left; text-align:left; width:100%; font-size:14px; margin-top:0px; margin-left:20px;">Selecciona los campos:</p>
			<form action="#" method="post" id="formulario" style="margin-left:20px; width:500px; float:left;">
       
                    <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">DEPORTE</label>
                	<select name='sport' id='sport' style='width:290px; float:left; border: 0 none; border-radius: 3px;	-webkit-border-radius: 3px; -moz-border-radius: 3px; box-shadow: 2px 2px 5px rgba(27, 100, 140, 0.4); color: #4A9DCA; font-family: "FSAlbert"; font-size: 16px; height: auto;' onChange="enviosport(this.value)">
					<?php 
					echo '<option value="Elige">Elige deporte</option>';
					$result = mysql_query("SELECT sport FROM pabellon GROUP BY sport", $link);
					if (@mysql_num_rows($result)){
						while ($row=mysql_fetch_row($result)){ 
							echo '<option value="'.$row[0].'">'.$row[0].'</option>';
						}
					}
					?>
					</select>
                                      
                                       
                    <div id="genero" style="margin:0px; float:left; width:500px;"></div>           
                    <div id="categoria" style="margin:0px; float:left; width:500px;"></div>  
                    <div id="grupo" style="margin:0px; float:left; width:500px;"></div>                   
                    <div id="equipo1" style="margin:0px; float:left; width:500px;"></div>
                    <div id="equipo2" style="margin:0px; float:left; width:500px; margin-bottom:30px;"></div>
                             
               
            </form>
            
            <div id="myContent">
            
            </div>
       
            
            
</div>
<?php include "lib/footer.php"; ?>
</body>
</html>