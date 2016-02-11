<?php session_start();
include 'lib/config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Alta empresa</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<!--<link rel="stylesheet" href="css/reset.css" />-->

<? include "lib/js.php";?>

<script language="javaScript" type="text/javascript">
<!-- para validar el registro de los usuarios en la pagina de alta.php
	function empresa()  
	{
	if(document.getElementById('insertant').nombre.value!=""){ //introduir algun valor
		if(document.getElementById('insertant').nif.value!=""){ //introduir algun valor
			if(document.getElementById('insertant').direccion.value!=""){ //introduir algun valor
				if(document.getElementById('insertant').ciudad.value!=""){ //introduir algun valor
					if(document.getElementById('insertant').cp.value!=""){ //introduir algun valor
						if(document.getElementById('insertant').provincia.value!=""){ //introduir algun valor
							if(document.getElementById('insertant').telefono.value!=""){ //introduir algun valor
								if(document.getElementById('insertant').correo.value!=""){ //introduir algun valor	
									if(document.getElementById('insertant').web.value!=""){ //introduir algun valor
										if(document.getElementById('insertant').acepto.checked){
											return true;
										}else{
										document.getElementById('alerta').style.border="1px solid #E3001B";	
										document.getElementById('alerta').style.width="88";
										document.getElementById('alerta').style.padding="10px";	
										return false;
										}
									}else{
									document.getElementById('insertant').web.style.border="1px solid #E3001B";
									return false;
									}
								}else{
								document.getElementById('insertant').correo.style.border="1px solid #E3001B";
								return false;
								}
							}else{
							document.getElementById('insertant').telefono.style.border="1px solid #E3001B";
							return false;
							}
						}else{
						document.getElementById('insertant').provincia.style.border="1px solid #E3001B";
						return false;
						}
					}else{
					document.getElementById('insertant').cp.style.border="1px solid #E3001B";
					return false;
					}
				}else{
				document.getElementById('insertant').ciudad.style.border="1px solid #E3001B";
				return false;
				}
			}else{
			document.getElementById('insertant').direccion.style.border="1px solid #E3001B";
			return false;
			}
		}else{
		document.getElementById('insertant').nif.style.border="1px solid #E3001B";
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
            <h3>Alta empresa</h3>
            <form action="registro_empresa.php" method="POST" enctype="multipart/form-data" id="insertant" name="insertant" onSubmit="return empresa()" style="width:400px; float:left; margin-left:20px; margin-bottom:70px;">
            <p class="mini-title" style="width:100%; text-align:left; color:#333; font-weight:bold; margin:0px 0px 20px 0px; color: #4A9DCA; font-family: 'Brannbol'; font-size:18px;">Regístrate</p>  
            <label style="float:left; text-align:left; margin-bottom:20px; width:100%; font-size:12px;">Todos los campos son obligatorios</label>
              
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Nombre</label>
            <input name="nombre" type="text" id="nombre" size="30" style='width:240px; float:left; margin-bottom:8px;' />
            
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">NIF</label>
            <input name="nif" type="text" id="nif" size="30" style='width:240px; float:left; margin-bottom:8px;' />
            
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Dirección</label>
            <input name="direccion" type="text" id="direccion" size="30" style='width:240px; float:left; margin-bottom:8px;' />
            
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Ciudad</label>
            <input name="ciudad" type="text" id="ciudad" size="30" style='width:240px; float:left; margin-bottom:8px;' />
            
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Código postal</label>
            <input name="cp" type="text" id="cp" size="30" style='width:240px; float:left; margin-bottom:8px;' />
                          
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Província</label>
            <input name="provincia" type="text" id="provincia" size="30" style='width:240px; float:left; margin-bottom:8px;' />
            
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Teléfono</label>
            <input name="telefono" type="text" id="telefono" size="30" style='width:240px; float:left; margin-bottom:8px;' />
            
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">E-mail</label>
            <input name="correo" type="email" id="correo" size="30" style='width:240px; float:left; margin-bottom:8px;' /> 
            
            <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Web</label>
            <input name="web" type="text" id="web" size="30" style='width:240px; float:left; margin-bottom:8px;' />  
            
            			
            <p id="alerta" style="float:left; text-align:left; font-size:12px; color:#666; width:100%;"><input type="checkbox" name="acepto" id="acepto" /> He leído y acepto la <a href="aviso_legal.php" style="text-decoration:none; color: #4A9DCA;" onclick="$(this).modal({width:800, height:400}).open(); return false;">política de protección de datos</a></p>
            
            <input type="submit" value="REGISTRARSE" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" />
            </form>
            
            <div style="width:300px; float:right; margin-right:0px;">
                <img src="imgs/imago.png" alt="" title="" style="margin-top:-90px;" /> 
                                  
            </div>   
		
        </div>


<?php include "lib/footer.php"; ?>

</body>
</html>
