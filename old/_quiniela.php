<?php
	include("lib/config.php"); //conexio a la bbdd
	//$id = $_POST["id_partido"];
	
	//valor1
	if(isset($_GET["valor1"])){ //si recibe valor1
		$valor1 = $_GET["valor1"]+1;
		$consult= "UPDATE partido SET valor1 = '".$valor1."' WHERE id = '".$_GET["id_partido"]."'";
		$dada = mysql_query($consult, $link);
	}else if(isset($_GET["valor2"])){ //si recibe valor2
		$valor2 = $_GET["valor2"]+1;
		$consult2= "UPDATE partido SET valor2 = '".$valor2."' WHERE id = '".$_GET["id_partido"]."'";
		$dada2 = mysql_query($consult2, $link);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="shortcut icon" href="favicon.ico" />
<title>Eventracker</title>
<script type="text/javascript" src="js/jquery.js"></script>	
<script type="text/javascript" src="js/gmaps-functions.js"></script> 
<script type="text/javascript" src="js/XMLHttpRequest.js"></script>

</head>

<body>
<div id="main">
	<div id="content">
    	<div style="width: 100%; float:left;">

<?php
$local = "SELECT partido.local, equipo.id, equipo.categ, club.id, club.nombre, club.img, partido.id FROM partido, equipo, club
WHERE partido.id = 1 AND equipo.id = partido.local AND equipo.id_club = club.id";
$query_local = mysql_query($local, $link);

$visitant="SELECT partido.visitante, equipo.id, equipo.categ, club.id, club.nombre, club.img, partido.id FROM partido, equipo, club WHERE partido.id = 1 AND equipo.id = partido.visitante AND equipo.id_club = club.id";
$query_visitant = mysql_query($visitant, $link);

$consult= "SELECT * FROM partido WHERE id=1";
$dada = mysql_query($consult, $link);

	if ((@mysql_num_rows($query_local))&&(@mysql_num_rows($query_visitant)&&(@mysql_num_rows($dada)))){
		while ($row = mysql_fetch_row($query_local) and $row2 = mysql_fetch_row($query_visitant) and $tra = mysql_fetch_array($dada) )
		{
	
	//$num = 1;
	//while($tra=mysql_fetch_array($dada)) 
	//{
		
		$total1 += $tra["valor1"]; //suma total1
		$total2 += $tra["valor2"]; //suma total2
			
		$total = $total1 + $total2; //suma total1 y total2 y se guarda en total
		
		if ($total>0){
			$tantpercent1 = ($total1 * 100) / $total; // % de total1 sobre total
			$tantpercent2 = ($total2 * 100) / $total; // % de total2 sobre total
		}
		
?>
	<div style="float:left; width:100%;"> <!-- equipo local -->
        <div style='float:left; width:50px; border:1px solid #000; margin-right:5px; height:auto;'><img src="<?php echo $row[5]; ?>" alt="<?php echo $row[2]." ".$row[4]; ?>" title="<?php echo $row[2]." ".$row[4]; ?>" /></div>
        <p style="float:left; text-align:left; font-size:20px; font-weight:bold;"><?php echo $tra["valor1"]; ?></p>
        <p style="float:left; text-align:left; margin-left:10px;">
        	<span style="float:left; text-align:left; font-size:11px; font-weight:bold;"><?php if ($total>0){ echo round($tantpercent1,2)." %";}?></span>
            <a href="<?PHP print $_SERVER['PHP_SELF']; ?>?id_partido=<?php echo $row[6]; ?>&valor1=<?php echo $tra["valor1"]; ?>" style="text-decoration:none;"><img src="icons/ganador.png" title="Ganador" /></a></p>
    </div>
    
    <div style="float:left; width:400px;"> <!-- equipo visitante -->  
        <div style='float:left; width:50px; border:1px solid #000; margin-right:5px; height:auto;'><img src="<?php echo $row2[5]; ?>" alt="<?php echo $row2[2]." ".$row2[4]; ?>" title="<?php echo $row2[2]." ".$row2[4]; ?>" /></div>
        <p style="float:left; text-align:left; font-size:20px; font-weight:bold;"><?php echo $tra["valor2"]; ?></p>
        <p style="float:left; text-align:left; margin-left:10px;">
        	<span style="float:left; text-align:left; font-size:11px; font-weight:bold;"><?php if ($total>0){echo round($tantpercent2,2)." %";}?></span>
        	<a href="<?PHP print $_SERVER['PHP_SELF']; ?>?id_partido=<?php echo $row2[6]; ?>&valor2=<?php echo $tra["valor2"]; ?>" style="text-decoration:none;"><img src="icons/ganador.png" title="Ganador" /></a></p>
   	
    </div>
   <? //$num ++;
    }} ?>


</div>
</div>
</div>
</body>
</html>
