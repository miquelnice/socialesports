<?php
session_start();
include "lib/config.php";

$user = $_GET['user'];
$password = md5($_GET['password']);


$visitant="SELECT *	FROM usuario WHERE nombre='$user' AND password = '$password'"; //si el login existe en la BBDD
$query_visitant = mysql_query($visitant, $link);
if (@mysql_num_rows($query_visitant)){
	while ($puni2 = mysql_fetch_row($query_visitant))
	{	
	
	echo "<div id='mensaje' style='float:left; width:210px; height:auto; border:2px solid #226c94; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>";

		$_SESSION["access"] = true;
		$_SESSION["usuario"] = $puni2[1];		



echo '<div style="float:left; width:32px; padding:4px; margin-right:8px;">';
	echo '<a href="modificar_perfil.php?id_usuario='.$puni2[0].'" style="text-decoration:none;" title="Modificar perfil">';								
	if(($puni2[4])!=""){
		echo '<img src="perfiles/'.$puni2[4].'" style="float:left; border:1px solid #fff; width:32px; height:32px;" /></a></div>';
	}else{
		echo '<img src="perfiles/default.png" style="float:left; border:1px solid #fff" /></a></div>';
	}
											
	echo '<div style="float:left; width:100px; margin-top:5px;">';
		echo "<p style='font-size:14px; float:left; text-align:left; width:100%; margin:0px; color:#226c94;'>".$puni2[1]."</p>";
		echo '<p style="float:left; font-size: 14px; text-align:left; margin:0px;"><a href="perfil.php?id='.$puni2[0].'" style="text-decoration:none; color:#226c94;" title="Mis acciones">Mis acciones</a></p></div></div>';
											
	
	}?>



	<div id="mensajesdirectos" style="float:left; height:auto; border:2px solid #226c94; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:8px; width:210px;">
        <div style="float:left; width:16px; padding:4px;">
            <img src="icons/mail.png" width="16" />
        </div>
        <div style="float:left; width:185px;">
            <p style="font-size:14px; padding-left:8px; padding-top:4px; float:left; text-align:left; color:#226c94; margin:0px;">Mensajes directos</p>
            <?php
            $sql = "SELECT * FROM dm WHERE para='".$_SESSION['usuario']."' and leido IS NULL";
            $res = mysql_query($sql, $link) or die(mysql_error());
            $tot = mysql_num_rows($res);
            ?>
            <p style="font-size:12px; float:left; text-align:left; margin-left:8px; width:100%;">Tienes <a href="list_dm.php" title="Listado de mensajes directos" style="font-size:16px;color:#226c94; text-decoration:none;"><?=$tot?></a> mensajes sin leer.</p>
            <div>
            	<p style="font-size:12px; float:left; text-align:left; margin-left:8px; margin-bottom:4px; "><a href="crear_dm.php" style="text-decoration:none; color:#226c94;" title="Crear mensaje directo">Crear MD</a></p></div>
        </div>
    </div><!-- fin mensajesdirectos -->
	
    <div id="cerrar-sesion" style="float:left; height:auto; margin-top:8px; width:180px;">
    	<a href="salir.php" title="Cerrar sesión" id="logout">CERRAR SESION</a>
    </div>

	
<?php }else{//si esta mal el login
	echo "<div id='mensaje' style='float:left; width:210px; height:auto; border:2px solid #226c94; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>";
	echo "<p style='font-size:11px; color:#E3001B; text-align:left; margin:8px;'>El nombre de usuario o el password no son correctos.</p>
	<a href='javascript:void(0)' onClick='window.location.reload();' style='text-decoration:none; text-align:left; margin-top:10px; padding-bottom:8px; padding-left:8px; color:#226c94; font-size:11;' title='Intentarlo de nuevo'>INTENTALO DE NUEVO</a></div>";
}
?>