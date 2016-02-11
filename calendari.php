<div id="calendari" style="float:left; height:auto; width:580px; margin-left:20px; margin-bottom:20px;">
<a href="#" onClick="$('#calendari').hide();" style="float:right;" title="Cerrar"><img src="icons/lightbox-btn-close.png" title="Cerrar" style="width:15px; margin-right:50px; border:none;" /></a>
<?php
include "lib/config.php";
$equip_id = $_GET['equip_id'];

//query con equipo local
$calendari = "SELECT partido.horario, partido.visitante, equipo.categ, club.nombre, pabellon.nombre FROM partido, equipo, club, pabellon WHERE partido.LOCAL ='$equip_id' AND partido.local = equipo.id AND equipo.id_club=club.id AND partido.id_pabellon=pabellon.id ORDER BY partido.horario";
$query_calendari = mysql_query($calendari, $link);

	echo "<p style='float:left; text-align:left; font-size:14px; margin:0px; width:100%; color:#4A9DCA; padding-bottom:8px;'><strong>PARTIDOS COMO LOCAL:</strong></p>";
	
		if (@mysql_num_rows($query_calendari)){
			while ($pt = mysql_fetch_row($query_calendari)) 
			{		
				
				if ($pt[0]){ //si hay fecha, la cambiamos de formato de BBDD a texto
					$p=split(" ",$pt[0]);
					$f=split("-",$p[0]);
					$h=split(":",$p[1]);
									
					//cambio de fecha
					$nummes=(int)$f[1];
					$mes1="0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
					$mes1=split("-",$mes1);
									
					//cambio de hora
					$numhora=(int)$h[0];	
					$desfechahora="$f[2] de $mes1[$nummes] de $f[0] a las $numhora:$h[1] h.";
				} //fin formato fecha
				
				
				echo "<p style='float:left; text-align:left; font-size:14px; margin:0px;'><strong>Horario:</strong> ".$desfechahora." en <span style='color:#E3001B; font-weight:bold;'>".$pt[4]."</span></p>";	
				echo "<p style='float:left; text-align:left; font-size:14px; font-weight:bold; color:#4A9DCA; width:100%; margin:0px; padding-bottom:8px;'>".$pt[2]." ".utf8_encode($pt[3])." <span style='color:#E3001B; font-size:14px;'>vs. </span>";
				$visitant = $pt[1];
				
				
		
		//para sacar el equipo visitante del partido
	$calend = "SELECT equipo.categ, club.nombre FROM partido, equipo, club WHERE partido.visitante ='$visitant' AND partido.visitante = equipo.id AND equipo.id_club=club.id GROUP BY partido.visitante";
	$query_calend = mysql_query($calend, $link);
		if (@mysql_num_rows($query_calend)){
			while ($pr = mysql_fetch_row($query_calend))
		{
				echo "<span style='font-size:14px; font-weight:bold; color:green;'>".$pr[0]." ".utf8_encode($pr[1])."</span></p>";				
			
			}
		}
	}
}

		
//query con equipo visitante
$calendari_v = "SELECT partido.horario, partido.local, equipo.categ, club.nombre, pabellon.nombre FROM partido, equipo, club, pabellon WHERE partido.visitante ='$equip_id' AND partido.visitante = equipo.id AND equipo.id_club=club.id AND partido.id_pabellon=pabellon.id ORDER BY partido.horario";
$query_calendari_v = mysql_query($calendari_v, $link);

	echo "<p style='float:left; text-align:left; font-size:14px; padding-top:20px; margin:0px; color:#4A9DCA; widht:100%; padding-bottom:8px;'><strong>PARTIDOS A DOMICILIO:</strong></p>";
		if (@mysql_num_rows($query_calendari_v)){
			while ($pd = mysql_fetch_row($query_calendari_v))
			{						
				
				if ($pd[0]){ //si hay fecha, la cambiamos de formato de BBDD a texto
					$p=split(" ",$pd[0]);
					$f=split("-",$p[0]);
					$h=split(":",$p[1]);
									
					//cambio de fecha
					$nummes=(int)$f[1];
					$mes1="0-1-2-3-4-5-6-7-8-9-10-11-12";
					$mes1=split("-",$mes1);
									
					//cambio de hora
					$numhora=(int)$h[0];	
					$desfechahora2="$f[2]-$mes1[$nummes]-$f[0] a las $numhora:$h[1] h.";
				} //fin formato fecha
				
				echo "<p style='float:left; text-align:left; font-size:14px; margin:0px;'><strong>Horario:</strong> ".$desfechahora2." en <span style='color:#E3001B; font-weight:bold;'>".$pd[4]."</span></p>";		
				echo "<p style='float:left; text-align:left; font-size:14px; font-weight:bold; color:#4A9DCA; width:100%; margin:0px; padding-bottom:8px;'>".$pd[2]." ".utf8_encode($pd[3])." <span style='color:#E3001B;'>vs. </span>";
				$local = $pd[1];
								
				
				//para sacar el equipo local del partido
	$calend_v = "SELECT equipo.categ, club.nombre FROM partido, equipo, club WHERE partido.local ='$local' AND partido.local = equipo.id AND equipo.id_club=club.id GROUP BY partido.local";
	$query_calend_v = mysql_query($calend_v, $link);
		if (@mysql_num_rows($query_calend_v)){
			while ($pm = mysql_fetch_row($query_calend_v))
			{	
				echo "<span style='font-size:14px; font-weight:bold; color:green;'>".$pm[0]." ".utf8_encode($pm[1])."</span></p>";		
				
			}
		}
	}
}

?>
</div>