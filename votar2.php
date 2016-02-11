<?php
include "lib/config.php";
$idpartit = $_GET['idpartit'];

if(isset($_GET["valor2"])){ //si recibe valor2
	$valor2 = $_GET["valor2"]+1;
	$consult= "UPDATE partido SET valor2 = '".$valor2."' WHERE id = '$idpartit'";
	$dada = mysql_query($consult, $link);
}
?>