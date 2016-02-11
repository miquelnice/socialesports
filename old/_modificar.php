<?php
//include "lib/config.php";
$link = mysql_connect("localhost", "root","") or die("No pudo conectarse : " . mysql_error());
mysql_select_db("eventracker") or die("No pudo seleccionarse la BD.");

//if(($_GET['correo']!="")&&($_GET['contrasenya']!="")&&($_GET['ciudad']!="")&&($_GET['edad']!="")&&($_GET['sexo']!="")){
$res="UPDATE usuario SET mail='".$_POST['correo']."', password='".$_POST['contrasenya']."', ciudad='".$_POST['ciudad']."', edad='".$_POST['edad']."', sexo='".$_POST['sexo']."' WHERE id='".$_POST['id_usuario']."'";
//echo $res;
mysql_query($res);
header("location:modif_perfil.php");
//}else{ ?>
<!--<div id="registrado" style="width: 180px; border: 1px solid #ccc; float:left; padding:8px; margin-top:10px; margin-left:15px; background-color:#dedede;">
	<p style='float:left; font-size:11px; color:#E3001B; text-align:left; width:auto;'>Rellene los campos correctamente.</p>
</div>-->
<?php //}?>