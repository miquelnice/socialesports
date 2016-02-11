<?php
$link = mysql_connect("localhost", "root","") or die("No pudo conectarse : " . mysql_error());
mysql_select_db("eventracker") or die("No pudo seleccionarse la BD.");
$res="INSERT INTO empresa (nombre, nif, direccion, ciudad, cp, provincia, telefono, mail, web, alta) VALUES ('$_POST[nombre]', '$_POST[nif]', '$_POST[direccion]', '$_POST[ciudad]', '$_POST[cp]', '$_POST[provincia]', '$_POST[telefono]', '$_POST[correo]', '$_POST[web]', now())";
mysql_query($res);
header("location:registrado_empresa.php");	
?>