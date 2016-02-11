<?php
include "lib/config.php";
$elimina = mysql_query ('DELETE FROM seguidor WHERE id='.$_GET['id'], $link);
?>