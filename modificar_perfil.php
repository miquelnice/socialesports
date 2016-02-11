<?php include "autentifica.php";
include('lib/config.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Modificar perfil</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<!--<link rel="stylesheet" href="css/reset.css" />-->

<? include "lib/js.php";?>

<script language="javaScript" type="text/javascript">
<!-- para validar la modificacion de los datos de los usuarios en la pagina de modificar_perfil.php
function modificar2()  
	{
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
			<h3>Modificar perfil</h3>

			<?php if($_POST['modificar'])
            {
            $res="UPDATE usuario SET mail='".$_POST['correo']."', password='".$_POST['contrasenya']."', ciudad='".$_POST['ciudad']."', edad='".$_POST['edad']."', sexo='".$_POST['sexo']."' WHERE id='".$_POST['id_usuario']."'";
            //echo $res;
            mysql_query($res);
            echo "<p style='float:left; width:500px; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:20px; margin-bottom:30px;'>Los datos del perfil se han modificado correctamente.</p>";
            }?>       



<?php if($_POST['avatar'])
            {
				$nombre_archivo = $_FILES['userfile']['name'];
$tipo_archivo = $_FILES['userfile']['type'];
$tamano_archivo = $_FILES['userfile']['size'];
$id = $_POST['id_usuario'];
if ($nombre_archivo==""){
 echo "<p style='float:left; width:500px; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:20px; margin-bottom:30px;'>Debe seleccionar un archivo.</p>";

}
else{
if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png"))&& ($tamano_archivo < 900000))) { 
    echo "<p style='float:left; width:500px; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:20px; margin-bottom:30px;'>La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif, .png o .jpg de 900 Kb máximo.</p>"; 
}else{
    if (copy($_FILES['userfile']['tmp_name'], "perfiles/".$id."_".$nombre_archivo)){

$res="UPDATE usuario SET img='".$id."_".$nombre_archivo."' WHERE id=$id";
mysql_query($res,$link);
echo "<p style='float:left; width:500px; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:20px; margin-bottom:30px;'>Los imagen del perfil se han modificado correctamente.</p>";

}else{ 
       echo "<p style='float:left; width:500px; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:20px; margin-bottom:30px;'>Ocurrió algún error al subir el fichero. No pudo guardarse.</p></div>"; 
    } 
} 
}	
}?>




<form action="" method="post" enctype="multipart/form-data" style="width:400px; float:left; margin-left:20px; margin-bottom:40px;" id="insertant" name="insertant" onSubmit="return modificar2()"> <!-- modificar.php -->
	<input name="id_usuario" type="hidden" id="id_usuario" value="<?php echo $_GET['id_usuario'] ?>">
    
    <label style="float:left; text-align:left; margin-bottom:20px; width:100%; font-size:12px;">* Campos obligatorios</label>
    
    <?php include "lib/config.php";
	$usuario="SELECT * FROM usuario WHERE id='".$_GET['id_usuario']."'"; //si el login existe en la BBDD
	$query_usuario = mysql_query($usuario, $link);
	if (@mysql_num_rows($query_usuario)){
		while ($row = mysql_fetch_row($query_usuario)){ ?>	
               
            
    <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">* E-mail</label>
    <input name="correo" type="email" id="correo" size="30" value="<?php echo $row[2]; ?>" style='background-color:#CCCCCC; border:0; width:180px; float:left; margin-bottom:8px;' />   
            
    <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">* Password</label>
    <input name="contrasenya" type="password" id="contrasenya" size="30" value="<?php echo $row[3]; ?>" style='background-color:#CCCCCC; border:0; width:180px; float:left; margin-bottom:8px;' />
    
    <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Ciudad</label>
    <input name="ciudad" type="text" id="ciudad" size="30" value="<?php echo $row[6]; ?>" style='background-color:#CCCCCC; border:0; width:180px; float:left; margin-bottom:8px;' />
    
    <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Edad</label>
    <input name="edad" type="text" id="edad" size="30" value="<?php echo $row[7]; ?>" style='background-color:#CCCCCC; border:0; width:180px; float:left; margin-bottom:8px;' />

    <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Sexo</label>
	<select id="sexo" name="sexo" style="float:left; width:185px; margin-bottom:8px;">    
    	<option selected value="<?php echo $row[8]; ?>"><?php echo $row[8]; ?></option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
   	</select>
    
    <label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">Imagen de perfil</label>
    <?php if ($row[4]==""){ //si el campo de img está vacío hago link para subir imagen de perfil
		echo "<div style='float:left; text-align:left; font-size:14px;'>No tienes ninguna imagen de perfil.</div>";
	?>
    	<a href="javascript:void(0)" onClick="$('#cargar2').show();" style='text-decoration:none; font-size:11px; float:left; font-size:14px; color:#4A9DCA; width:200px;'>Aplicar una?</a>
    <?php }else{ //si el campo img está lleno doy la posibilidad de modificar imagen de perfil?>
    	<a href="javascript:void(0)" onClick="$('#cargar2').show();" style='text-decoration:none;'>
    	<img src="perfiles/<?php echo $row[4]; ?>" id="userfile" style="float:left; text-align:left; border:none;" width="150" alt="Modificar imagen del perfil" title="Modificar imagen del perfil" /></a>
    <?php } ?>
    
    <!--<input name="userfile" type="file" id="userfile" size="60" style="float:left; text-align:left;">-->
    <?php }} ?>
        
    <input type="submit" value="MODIFICAR" name="modificar" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" />

</form>
</div>


<div id="cargar2" style="display:none; float:left; width:300px; margin-top:0px; margin-left:40px;">
<a href="#" onClick="$('#cargar2').hide();" style="float:right;" title="Cerrar"><img src="icons/lightbox-btn-close.png" title="Cerrar" style="width:15px; border:none;" /></a>
<h3>Cambiar imagen de perfil</h3>

<form action="" method="post" enctype="multipart/form-data" style="float:left; text-align:left; width:300px;"> <!-- upload_perfil.php -->
	<input name="id_usuario" type="hidden" id="id_usuario" value="<?php echo $_GET['id_usuario'] ?>">
    
    <input name="userfile" type="file" id="userfile" size="60" style="float:left; text-align:left; width:350px;">
    <input type="submit" value="SUBIR IMAGEN" name="avatar" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" />

</form>

</div>

<?php include "lib/footer.php"; ?>
</body>
</html>