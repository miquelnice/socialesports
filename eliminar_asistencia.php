<?php
include "lib/config.php";
$user = $_GET['user'];
$elimina = mysql_query ('DELETE from checkin WHERE id='.$_GET['id'], $link);
//header("Location: perfil.php?id=".$user);
?>