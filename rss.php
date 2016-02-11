<?
header('Content-Type: text/xml'); //Indicamos al navegador que es un documento en XML
//Versión y juego de carácteres de nuestro documento
echo '<?xml version="1.0" encoding="ISO-8859-1"?>'; 
// Y generamos nuestro documento
echo '<rss version="2.0">';
echo "<channel>";
    echo "<title>Socialesports</title>";
    echo "<link>http://127.0.0.1/socialesports/rss.php</link>";
	echo "<description>Noticias y novedades relacionadas con Socialesports</description>";
    echo "<language>es</language>";
    echo "<generator>Socialesports</generator>";

echo "<image>";
	echo "<title>Socialesports</title>";
	echo "<url>http://127.0.0.1/imgs/logo_socialesports.png</url>";
	echo "<link>http://127.0.0.1/socialesports</link>";
	echo "<width>301</width>";                              
    echo "<height>59</height>";
	echo "<description>socialesports.com</description>";
echo "</image>";

//Aquí la conexión o archivo de conexión a la base de datos
//Hacemos la consulta y la ordenamos por post para mostrar siempre el último
$link=mysql_connect("localhost", "root",""); 
mysql_select_db('eventracker',$link); 
$resultado=mysql_query("select * from noticia order by id desc",$link);
while($row = mysql_fetch_array($resultado)) 
	{ 
		echo "<item>";
		echo "<title>$row[1]</title>";
		echo "<link>http://127.0.0.1/socialesports/noticia.php?id=$row[0]</link>";
		echo "<pubDate>$row[5]</pubDate>";
		echo "<description><![CDATA[$row[2] <a href='$row[4]' target='_blank'>$row[4]</a><br/><br/> <img src='http://127.0.0.1/socialesports/img/$row[3]' /><br/>]]></description>";
		echo "</item>";
	} 
echo "</channel></rss>";
?> 