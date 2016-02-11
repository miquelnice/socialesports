<?php 
$link = mysql_connect("localhost", "root","") or die("No pudo conectarse : " . mysql_error());
mysql_select_db("eventracker") or die("No pudo seleccionarse la BD.");
?>