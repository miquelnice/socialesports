<?php
include "lib/config.php";
$idpartit = $_GET['idpartit'];
$usuario = $_GET['usuario'];
mysql_query("INSERT INTO checkin (id_user, id_partido) VALUES ('$usuario','$idpartit')",$link); //actualitzo el contador
?>