<?php
include "lib/config.php";
$id_equipo = $_GET['id_equipo'];
$id_user = $_GET['id_user'];

$seguidor = "SELECT * FROM seguidor WHERE id_equipo = '$id_equipo' AND id_user = '$id_user'";
	$query_seguir = mysql_query($seguidor, $link);
		if (mysql_num_rows($query_seguir)>0)
		{
			echo '<p id="supporter" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; color:#fff; text-decoration:none; text-align:left; width:180px; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:10px; margin-left:40px; margin-bottom:15px;"><a href="javascript:void(0)" onClick="$(\'#supporter\').hide();" style="float:right;" title="Cerrar"><img src="icons/lightbox-btn-close.png" title="Cerrar" style="width:15px; border:none;" /></a>Ya eres segudior de este equipo</p>';
		}else{
			$res = "INSERT INTO seguidor (id_equipo, id_user) VALUES ('$id_equipo','$id_user')";
			mysql_query($res, $link);
			echo '<p id="supporter" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; color:#fff; text-decoration:none; text-align:left; width:180px; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:10px; margin-left:40px; margin-bottom:15px;"><a href="javascript:void(0)" onClick="$(\'#supporter\').hide();" style="float:right;" title="Cerrar"><img src="icons/lightbox-btn-close.png" title="Cerrar" style="width:15px; border:none;" /></a>Te has hecho seguidor de este equipo!</p>';
		}
?>