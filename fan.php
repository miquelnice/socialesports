<?php
include "lib/config.php";
$id_equipo = $_GET['id_equipo'];
$id_user = $_GET['id_user'];

$fan = "SELECT * FROM clubfans WHERE id_equipo = '$id_equipo' AND id_user = '$id_user'";
	$query_fan = mysql_query($fan, $link);
		if (mysql_num_rows($query_fan)>0)
		{
			echo '<p style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:40px; margin-bottom:30px;">Ya eres de este club de fans<a href="javascript:void(0)" onClick="$(\'#fan\').hide();" style="float:right;" title="Cerrar"><img src="icons/lightbox-btn-close.png" title="Cerrar" style="width:15px;margin-left:8px; border:none;" /></a></p>';
			//echo '</div>';
		}else{
			$res = "INSERT INTO clubfans (id_equipo, id_user) VALUES ('$id_equipo','$id_user')";
			mysql_query($res, $link);
			echo '
			<p style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:0px; margin-left:40px; margin-bottom:30px;">Has ingresado en el club de fans<a href="javascript:void(0)" onClick="$(\'#fan\').hide();" style="float:right;" title="Cerrar"><img src="icons/lightbox-btn-close.png" title="Cerrar" style="width:15px;margin-left:8px; border:none;" /></a></p>';
		}
?>