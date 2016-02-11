<?php include "autentifica.php";
include('lib/config.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Listado de mensajes directos</title>
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
			<h3>Listado de mensajes directos</h3>
<?php 
# Incluimos la configuracion
include('lib/config.php'); 
//include "autentifica.php"; 
# Iniciamos sesion

$sql = "SELECT * FROM dm WHERE para='".$_SESSION['usuario']."' and leido IS NULL";
$res = mysql_query($sql, $link) or die(mysql_error());
$tot = mysql_num_rows($res);
?>
<p style="margin-left:20px; float:left; margin-top:0px; width:100%;">Tienes <?php echo $tot?> mensajes sin leer.</p>


<p style="float:left; margin-left:20px; margin-top:0px; width:100%;"><a href="crear_dm.php" style="text-decoration:none; float:left; font-size: 14px; font-weight: bold; border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">Crear DM</a></p>

<?php # Buscamos los mensajes privados
$sql = "SELECT * FROM dm WHERE para='".$_SESSION['usuario']."'";
$res = mysql_query($sql, $link) or die(mysql_error());
?>
  <table width="940" border="0" align="center" cellpadding="1" cellspacing="1" style="margin-bottom:40px;">
    <tr>
      <!--<td width="53" align="center" valign="top"><strong>ID</strong></td>-->
      <td width="426" align="center" valign="top"><strong style="color:#4a9dca;">Asunto</strong></td>
      <td width="321" align="center" valign="top"><strong style="color:#4a9dca;">De</strong></td>
	  <td width="321" align="center" valign="top"><strong style="color:#4a9dca;">Fecha</strong></td>
    </tr>
    <?php
	$i = 0; 
	while($row = mysql_fetch_assoc($res)){ ?>
    <tr bgcolor="<?php if($row['leido'] == "si") { echo "#4a9dca"; } else { if($i%2==0) { echo "#226c94"; } else { echo "#226c94"; } } ?>">
      <!--<td align="center" valign="top"><?$row['ID']?></td>-->
      <td align="center" valign="top"><a href="leer_dm.php?id=<?php echo $row['ID']?>" style="text-decoration:none; color:#fff;" title="<?php echo utf8_encode($row['asunto'])?>"><?php echo utf8_encode($row['asunto'])?></a></td>
      <td align="center" valign="top" style="color:#fff;"><?php echo utf8_encode($row['de'])?></td>
	  <td align="center" valign="top" style="color:#fff;"><?php echo $row['fecha']?></td>
    </tr>
<?php $i++; 
} ?>
</table>



</div>


<?php include "lib/footer.php"; ?>

</body>
</html>