<?php
include "lib/config.php";
$elimina="DELETE from cupon WHERE id=".$_GET['id_cupon'];
mysql_query($elimina, $link);
header("Location: loginempresa.php?id=".$_GET['id']);
?>