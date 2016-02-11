<?php
include "lib/config.php";
$user = $_GET['user'];
$elimina = mysql_query ('DELETE from messages WHERE msg_id='.$_GET['id'], $link);
//header("Location: perfil.php?id=".$user);
?>