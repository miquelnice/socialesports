<?php
include("lib/config.php");

$usuario = $_POST["id_usuario"];
$tra = "SELECT id FROM usuario WHERE nombre='$usuario'";
$query_tra = mysql_query($tra);
	if (@mysql_num_rows($query_tra)){
		while ($pw = mysql_fetch_row($query_tra))
		{
			$id_usuario = $pw[0];
		}
	}

$res = "INSERT INTO comentarios (comentario, fecha_c, id_equipo, id_usuario) VALUES ('$_POST[comentario]', now(), '$_POST[id_equipo]', '$id_usuario')";
mysql_query($res);
$cadena = $_SERVER['HTTP_REFERER'];
$vengo = substr($cadena, 31,60);
//echo $subcadena;
header("Location: $vengo");
?>