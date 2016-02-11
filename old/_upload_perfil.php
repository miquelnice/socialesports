<?php
$nombre_archivo = $_FILES['userfile']['name'];
$tipo_archivo = $_FILES['userfile']['type'];
$tamano_archivo = $_FILES['userfile']['size'];
$id = $_POST['id_usuario'];
include "lib/config.php";

$cadena = $_SERVER['HTTP_REFERER'];
$vengo = substr($cadena, 29,60);
//echo $subcadena;
//header("Location: $vengo");

if ($nombre_archivo==""){
 echo "<div id='registrado' style='padding:8px 14px; background-color:#dedede; border:1px solid #ccc; height:auto; float:left; width:300px;'>
	<p style='font-size:11px; float:left; text-align:left; width:100%;'>Debe seleccionar un archivo.<br><a href='$vengo' style='font-size:11px; color:#E3001B; text-decoration:none; float:left; text-align:left; width:100%'>Volver</a></p></div>";

}
else{
if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png"))&& ($tamano_archivo < 900000))) { 
    echo "<div id='registrado' style='padding:8px 14px; background-color:#dedede; border:1px solid #ccc; height:auto; float:left; width:300px;'>
	<p style='font-size:11px; float:left; text-align:left; width:100%;'>La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif, .png o .jpg de 900 Kb máximo.<br><a href='$vengo' style='font-size:11px; color:#E3001B; text-decoration:none; float:left; text-align:left; width:100%'>Volver</a></p></div>"; 
}else{
    if (copy($_FILES['userfile']['tmp_name'], "perfiles/".$id."_".$nombre_archivo)){

$res="UPDATE usuario SET img='".$id."_".$nombre_archivo."' WHERE id=$id";
mysql_query($res,$link);
$cadena = $_SERVER['HTTP_REFERER'];
$vengo = substr($cadena, 29,60);
//echo $subcadena;
header("Location: $vengo");
//header("Location: partido.php?id='$_POST[id_partit]'");
	
}else{ 
       echo "<div id='registrado' style='padding:8px 14px; background-color:#dedede; border:1px solid #ccc; height:auto; float:left; width:300px;'>
	<p style='font-size:11px; float:left; text-align:left; width:100%;'>Ocurrió algún error al subir el fichero. No pudo guardarse.<br><a href='$vengo' style='font-size:11px; color:#E3001B; text-decoration:none; float:left; text-align:left; width:100%'>Tornar</a></p></div>"; 
    } 
} 
}	
?>
 