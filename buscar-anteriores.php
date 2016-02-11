<?php
include "lib/config.php";

$equipo1 = $_GET['equipo1'];
$equipo2 = $_GET['equipo2'];


$local = "SELECT partido.local, partido.id_pabellon, pabellon.id, equipo.id, equipo.categ, club.id, club.nombre, club.img, partido.id
FROM partido, pabellon, equipo, club
WHERE equipo.id='$equipo1'
AND equipo.id = partido.local
AND equipo.id_club = club.id
GROUP BY equipo.id";
$query_local = mysql_query($local, $link);

	$visitant="SELECT partido.horario, partido.visitante, equipo.id, equipo.categ, club.id, club.nombre, club.img
	FROM partido, equipo, club 
	WHERE equipo.id='$equipo2' 
	AND equipo.id = partido.visitante 
	AND equipo.id_club = club.id";
	$query_visitant = mysql_query($visitant, $link);
	
		
		if ((@mysql_num_rows($query_local))&&(@mysql_num_rows($query_visitant))){
			
			
			
			while ($puni = mysql_fetch_row($query_local) and $puni2 = mysql_fetch_row($query_visitant) )
			{
					$data = $puni2[0];
					echo "<div id='partit-live' style='float:left; width:960px; margin:0px auto; padding-bottom:60px;'>";
					echo '<div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:520px; float:left;">';
					echo '<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">RESULTADO DE LA BUSQUEDA</p>';
					echo '<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span></div>';
					
					
					echo '<div style="width:520px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:10px; text-align:center;">';
					echo '<div style="float:left; width:250px; margin-top:25px;">';// equipo local 
					echo "<a href='equipo.php?id=".$puni[3]."&club=".$puni[5]."'><img src='".$puni[7]."' alt='".utf8_encode($puni[6])."' title='".utf8_encode($puni[6])."' style='height:55px; border:none;' /></a>";
						echo "<p style='font-size:14px; text-align:center;'><a href='equipo.php?id=".$puni[3]."&club=".$puni[5]."' style='text-decoration:none; color: #4A9DCA;'>".$puni[4]." ".utf8_encode($puni[6])."</a></p>";
					echo '</div>';
					
					echo '<div style="float:left; width:250px; margin-top:25px;">'; //equipo visitante
						echo "<a href='equipo.php?id=".$puni2[2]."&club=".$puni2[4]."'><img src='".$puni2[6]."' alt='".utf8_encode($puni2[5])."' title='".utf8_encode($puni2[5])."' style='height:55px; border:none;' /></a>";
						echo "<p style='font-size:14px; text-align:center;'><a href='equipo.php?id=".$puni2[2]."&club=".$puni2[4]."' style='text-decoration:none; color: #4A9DCA;'>".$puni2[3]." ".utf8_encode($puni2[5])."</a></p>";
					echo '</div>';
				echo '</div>'; //fin rivales partido	
							
	
					
	}
}	
								
		
			$acceso = "SELECT * FROM partido WHERE local='$equipo1' AND visitante ='$equipo2'";
$query_acceso = mysql_query($acceso, $link);
			if (@mysql_num_rows($query_acceso)){
				while ($tra = mysql_fetch_row($query_acceso))
				{?>
				
				<div style="margin:0px; -webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; padding:10px; width:500px; float:left; background: url('icons/reloj.png') no-repeat scroll 95px 50% #4A9DCA; height:19px;">
                
				<?php if($tra[1]){ //si hay fecha, la cambiamos de formato de BBDD a texto
					$p=split(" ",$tra[1]);
					$f=split("-",$p[0]);
					$h=split(":",$p[1]);
											
					//cambio de fecha
					$nummes=(int)$f[1];
					$mes1="0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
					$mes1=split("-",$mes1);
											
					//cambio de hora
					$numhora=(int)$h[0];	
					$desfechahora="$f[2] de $mes1[$nummes] de $f[0] a las $numhora:$h[1] h";
				} //fin formato fecha
								
				echo '<p style="text-align:center; margin:0px; color:#fff; font-size:14px;"><strong>Horario</strong>: '.$desfechahora.'</p></div>';
				?>
				<div style='float:left; margin-left:30px; width:250px; height:auto;'>
                	<a href='partido.php?id=<?php echo $tra[0];?>' style='float:left; font-size:14px; width:200px; display:block; padding:10px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; font-family: "Trebuchet"; background-color:#4a9dca; text-align:center; text-decoration:none; color:#fff; text-transform:uppercase;'>Acceder al partido</a>
                 </div>
				<?php }
			}		
	
?>