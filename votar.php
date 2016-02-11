<?php
include "lib/config.php";
$idpartit = $_GET['idpartit'];

if(isset($_GET["valor1"])){ //si recibe valor1
	$valor1 = $_GET["valor1"]+1;
	$consult= "UPDATE partido SET valor1 = '".$valor1."' WHERE id = '$idpartit'";
	$dada = mysql_query($consult, $link);
}
?>