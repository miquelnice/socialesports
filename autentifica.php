<?php session_start();
if($_SESSION["access"]==true){
	//echo $_SESSION["usuario"];
}else{
	//session_destroy();
	//echo "Error, no tienes permiso.";
	header("Location: index.php");
}
?>