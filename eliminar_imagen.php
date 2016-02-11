<?php
include "lib/config.php";
$elimina = mysql_query ('DELETE from img WHERE id='.$_GET['id'], $link);
?>