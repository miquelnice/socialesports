<?php
$id = $_GET['id']; 
session_start(); 
if (!empty($_SESSION["autentificado"])){
	if($_SESSION["autentificado"] != "SI")  { 
	    header("Location: salir.php"); 
	    exit(); 
	}
}else{
	 header("Location: loginempresa.php?id=$id");
}?> 