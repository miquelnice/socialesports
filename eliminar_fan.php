<?php
include "lib/config.php";
$elimina = mysql_query ('DELETE FROM clubfans WHERE id='.$_GET['id'], $link);
?>