<?php
include "lib/config.php";
//$idcupon = $_GET['idcupon'];
$idcupon = $_GET['id'];
//$descargas = $_GET['descargas'];

//miramos cuantas descargas aparecen en la BBDD
$res = "SELECT descargas FROM cupon WHERE id='$idcupon'";
$query_res = mysql_query($res, $link);
if (@mysql_num_rows($query_res)){
	while ($cupon = mysql_fetch_row($query_res)){
		$descargas = $cupon[0];
	}
}

//print_r($descargas);

if(!is_bot())
	if(isset($descargas)){ //si recibe valor1
		$valor1 = $descargas+1;
		$consult= "UPDATE cupon SET descargas = '".$valor1."' WHERE id = '$idcupon'";
		$dada = mysql_query($consult, $link);
	}

function is_bot(){
/* comprobar si el visitante es un robot motor de búsqueda */
 
	$botlist = array("Teoma", "alexa", "froogle", "Gigabot", "inktomi",
	"looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory",
	"Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot",
	"crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp",
	"msnbot", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz",
	"Baiduspider", "Feedfetcher-Google", "TechnoratiSnoop", "Rankivabot",
	"Mediapartners-Google", "Sogou web spider", "WebAlta Crawler","TweetmemeBot",
	"Butterfly","Twitturls","Me.dium","Twiceler");
	 
	foreach($botlist as $bot){
		if(strpos($_SERVER['HTTP_USER_AGENT'],$bot)!==false)
		return true;	// Es un bot
	}
 
return false;	// no es un bot
}
?>