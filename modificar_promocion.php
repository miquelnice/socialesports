<?php 
include "autentificaempresa.php"; 
include('lib/config.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Crear promoción</title>
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
            
            <?php //include "lib/menu.php"; ?>
            
        </div> <!-- Fin cabecera -->
	</div> <!-- Fin header -->

 
 
		<div id="wrap">
			<h3>Modificar promoción</h3>

<?php 
# Incluimos la configuracion
//include('lib/config.php'); 
 


if($_POST['modificar'])
{
	$res="UPDATE cupon SET titulo='".$_POST['titulo']."', texto='".$_POST['texto']."', fecha_validacion='".$_POST['fecha_validacion']."' WHERE id='".$_GET['id_cupon']."'";
            //echo $res;
            mysql_query($res);
            echo "<p style='float:left; width:500px; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:20px; margin-bottom:30px;'>Los datos de la promoción se han modificado correctamente.</p>";
}?>


<?php if($_POST['avatar'])
{
$nombre_archivo = $_FILES['userfile']['name'];
$id = $_POST['id_empresa'];
if ($nombre_archivo==""){
 echo "<p style='float:left; width:500px; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:20px; margin-bottom:30px;'>Debe seleccionar un archivo.</p>";

}
else{
    if (copy($_FILES['userfile']['tmp_name'], "cupon/img/".$nombre_archivo)){

$res="UPDATE cupon SET img='".$nombre_archivo."' WHERE id=".$_GET['id_cupon'];
mysql_query($res,$link);
echo "<p style='float:left; width:500px; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:20px; margin-bottom:30px;'>La imagen de la promoción se han modificado correctamente.</p>";

}else{ 
       echo "<p style='float:left; width:500px; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:20px; margin-bottom:30px;'>Ocurrió algún error al subir el fichero. No pudo guardarse.</p></div>"; 
    } 
} 
}	
?>

<p style="float:left; margin-left:20px; margin-top:0px; width:100%;"><a href="loginempresa.php?id=<?php echo $_GET['id']?>" style="text-decoration:none; float:left; font-size: 14px; font-weight: bold; border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">Ver promociones</a></p>




<form method="post" action="" enctype="multipart/form-data" style="width:400px; float:left; margin-top:30px; margin-bottom:60px; margin-left:20px;">

<input name="id_empresa" type="hidden" id="id_empresa" value="<?php echo $_GET['id'] ?>">

<?php 
$usuario="SELECT * FROM cupon WHERE id='".$_GET['id_cupon']."'"; //si el login existe en la BBDD
	$query_usuario = mysql_query($usuario, $link);
	if (@mysql_num_rows($query_usuario)){
		while ($row = mysql_fetch_row($query_usuario)){ ?>	

<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Título</label>
<input type="text" name="titulo" id="titulo" size="30" style="float:left; width:240px; margin-bottom:8px;" value="<?php echo utf8_encode($row[2]); ?>" />
<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px; height:24px; line-height:10px;">Fecha validación <span style="font-size:14px;">(formato: aaaa-mm-dd)</span></label>
<input type="text" name="fecha_validacion" id="fecha_validacion" size="30" style="float:left; width:240px; margin-bottom:8px;" value="<?php echo $row[5]; ?>" />
<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:100%;">Texto descriptivo promoción</label>
<textarea name="texto" rows="8" cols="30"  style='width:100%; float:left; margin-bottom:8px;'><?php echo utf8_encode($row[3]); ?></textarea>
<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Imagen promocional</label>

<?php if ($row[4]==""){ //si el campo de img está vacío hago link para subir imagen de perfil
		echo "<div style='float:left; text-align:left; font-size:14px;'>No hay ninguna imagen promocional.</div>";
	?>
    	<a href="javascript:void(0)" onClick="$('#cargar2').show();" style='text-decoration:none; font-size:11px; float:left; font-size:14px; color:#4A9DCA; width:200px;'>Aplicar una?</a>
    <?php }else{ //si el campo img está lleno doy la posibilidad de modificar imagen de perfil?>
    	<a href="javascript:void(0)" onClick="$('#cargar2').show();" style='text-decoration:none; font-size:11px; float:left; font-size:14px; color:#4A9DCA; width:200px;'>
    	<img src="cupon/img/<?php echo $row[4]; ?>" id="userfile" style="float:left; text-align:left; border:none;" width="150" alt="Modificar imagen promocional" title="Modificar imagen promocional" /></a>
    <?php } ?>
    
<?php }} ?>
<input type="submit" value="MODIFICAR" name="modificar" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" />
</form>


</div>


<div id="cargar2" style="display:none; float:left; width:300px; margin-top:0px; margin-left:40px;">
<a href="#" onClick="$('#cargar2').hide();" style="float:right;" title="Cerrar"><img src="icons/lightbox-btn-close.png" title="Cerrar" style="width:15px; border:none;" /></a>
<h3>Imagen promocional</h3>
<p style="font-size:14px; float:left; text-align:left; margin-left:20px; width:100%; margin-top:0px;">Sube primero la imagen y luego modifica los campos de la promoción o del cupón.</p>
<form action="" method="post" enctype="multipart/form-data" style="float:left; text-align:left; width:300px;"> <!-- upload_perfil.php -->
	<input name="id_cupon" type="hidden" id="id_cupon" value="<?php echo $_GET['id_cupon']; ?>">
    
    <input name="userfile" type="file" id="userfile" size="60" style="float:left; text-align:left; width:350px;">
    <input type="submit" value="SUBIR IMAGEN" name="avatar" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" />
</form>
</div>


<?php include "lib/footer.php"; ?>

</body>
</html>