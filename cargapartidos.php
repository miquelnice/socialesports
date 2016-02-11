<?php
session_start();
include "lib/config.php";

$id = $_GET['id']; //id pabellon!
//$pabellon = stripslashes($_GET['pabellon']);

					//sacamos la hora actual y le restamos 90 min
					$hora=date("Y-m-d H:i:00");
					$newtime = strtotime($hora . ' - 90 minutes'); //mostrar durante 90 min el partido anterior
					$newtime = date('Y-m-d H:i:s', $newtime);	
					//echo $newtime;


//echo "<p class='mini-title' style='float:left; margin-top:0px; margin-bottom:8px; font-weight: bold; padding-top:10px; text-align:left;'>EN ".$pabellon."</p>";
echo '<h2 class="resultado_busca">Resultados de la búsqueda</h2>';

echo "<div id='partit' style='height:100%; float:left; width:960px;'>";
$local = "SELECT partido.local, partido.id_pabellon, pabellon.id, equipo.id, equipo.categ, club.id, club.nombre, club.img, equipo.grupo, equipo.genero
FROM partido, pabellon, equipo, club
WHERE pabellon.id = '$id'
AND partido.id_pabellon = pabellon.id
AND equipo.id = partido.local
AND equipo.id_club = club.id
GROUP BY pabellon.id";

$query_local = mysql_query($local, $link);

$visitant="SELECT partido.horario, partido.visitante, equipo.id, equipo.categ, club.id, club.nombre, club.img, partido.id 
	FROM partido, equipo, club, pabellon 
	WHERE pabellon.id='$id' 
	AND partido.id_pabellon = pabellon.id 
	AND equipo.id = partido.visitante 
	AND equipo.id_club = club.id
	AND partido.horario > '$newtime'
	ORDER BY partido.horario ASC";
$query_visitant = mysql_query($visitant, $link);

		if ((@mysql_num_rows($query_local))&&(@mysql_num_rows($query_visitant))){
			while ($puni = mysql_fetch_row($query_local) and $pq = mysql_fetch_row($query_visitant))
			{
					
			echo "<div style='float:left; width:500px; margin-right:40px;'>";		
				echo '<div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; width:520px; float:left;">';
					echo '<p style="padding:10px; margin:0px; color:#fff; font-size:16px; text-align:center;">'.$puni[8].' ('.$puni[9].')</p>';
					echo '<span style="position:absolute; top: 38px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span></div>';
					
				echo '<div style="width:520px; background-color: #fff; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:10px; text-align:center;">';
					echo '<div style="float:left; width:250px; margin-top:25px;">';// equipo local 
						echo "<a href='equipo.php?id=".$puni[3]."&club=".$puni[5]."'><img src='".$puni[7]."' alt='".$puni[4].' '.utf8_encode($puni[6])."' title='".$puni[4].' '.utf8_encode($puni[6])."' style='height:55px; border:none;' /></a>";
						echo "<p style='font-size:14px; text-align:center;'><a href='equipo.php?id=".$puni[3]."&club=".$puni[5]."' style='text-decoration:none; color: #4A9DCA;'>".$puni[4]." ".utf8_encode($puni[6])."</a></p>";
					echo '</div>';
                	$id_partido = $pq[7];
                
                	echo '<div style="float:left; width:250px; margin-top:25px;">'; //equipo visitante
						echo "<a href='equipo.php?id=".$pq[2]."&club=".$pq[4]."'><img src='".$pq[6]."' alt='".$pq[3].' '.utf8_encode($pq[5])."' title='".$pq[3].' '.utf8_encode($pq[5])."' style='height:55px; border:none;' /></a>";
						echo "<p style='font-size:14px; text-align:center;'><a href='equipo.php?id=".$pq[2]."&club=".$pq[4]."' style='text-decoration:none; color: #4A9DCA;'>".$pq[3]." ".utf8_encode($pq[5])."</a></p>";
					echo '</div>';
				echo '</div>'; //fin rivales partido
			?>
	
			
            <div style="margin:0px; -webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; padding:10px; width:500px; float:left; background: url('icons/reloj.png') no-repeat scroll 95px 50% #4A9DCA; height:19px;">
      		<?php if ($pq[0]){ //si hay fecha, la cambiamos de formato de BBDD a texto
				$p=split(" ",$pq[0]);
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
					
					
			echo '<p style="text-align:center; margin:0px; color:#fff; font-size:14px;"><strong>Horario</strong>: '.$desfechahora.'</p></div>';
			?>
		</div> <!-- fin horario -->	
            
            
            
<!-- inici acceso funciones -->
	<div style="margin-bottom:0px; -webkit-border-top-left-radius:5px; -webkit-border-top-right-radius:5px; -moz-border-radius-topleft:5px; -moz-border-radius-topright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:400px; float:left; background: url('icons/ganador.png') no-repeat scroll 10px 50% #4A9DCA;;">
		<p style="padding:0 0 0 40px; margin:0px; color:#fff; font-size:14px; text-aling:center;"><strong>Quién será el ganador?</strong> Así opinan nuestros usuarios</p>
		<span style="position:absolute; top: 36px; left: 20px; display: inline-block; border-left: 9px solid transparent; border-left-width: 9px; border-left-style: solid; border-left-color: transparent; border-right: 9px solid transparent; border-right-width: 9px; border-right-style: solid; border-right-color: transparent; border-top: 9px solid #fff; border-top-width: 9px; border-top-style: solid; border-top-color: #4A9DCA;"></span>
	</div>
    
    
    <div style="width:420px; background-color: #fff; border-bottom: 2px solid #ccc; color: inherit; margin-top: 0px; float:left; height:auto; padding-bottom:10px;">
		
		<?php $local = "SELECT partido.local, equipo.id, equipo.categ, club.id, club.nombre, club.img, partido.id FROM partido, equipo, club WHERE partido.id = $id_partido AND equipo.id = partido.local AND equipo.id_club = club.id"; //equipo local
			$query_local = mysql_query($local, $link);
			
			$visitant="SELECT partido.visitante, equipo.id, equipo.categ, club.id, club.nombre, club.img, partido.id FROM partido, equipo, club WHERE partido.id = $id_partido AND equipo.id = partido.visitante AND equipo.id_club = club.id"; //equipo visitante
			$query_visitant = mysql_query($visitant, $link);
			
			$consult= "SELECT * FROM partido WHERE id=$id_partido"; //votos por partido
			$dada = mysql_query($consult, $link);
			$total = 0;
			if ((@mysql_num_rows($query_local))&&(@mysql_num_rows($query_visitant)&&(@mysql_num_rows($dada)))){
				while ($row = mysql_fetch_row($query_local) and $row2 = mysql_fetch_row($query_visitant) and $tra = mysql_fetch_array($dada)){			
			
					$total1 += $tra["valor1"]; //suma total1
					$total2 += $tra["valor2"]; //suma total2
					
					$total = $total1 + $total2; //suma total1 y total2 y se guarda en total
					
					if ($total>0){
						$tantpercent1 = ($total1 * 100) / $total; // % de total1 sobre total
						$tantpercent2 = ($total2 * 100) / $total; // % de total2 sobre total
					}?>
        
        		<div style="float:left; width:160px; margin-left:100px; margin-top:10px;"> <!-- equipo local -->
					<div style='float:left; max-width:90px; border:1px solid #000; margin-right:5px;'><img src="<?php echo $row[5]; ?>" alt="<?php echo $row[2]." ".$row[4]; ?>" title="<?php echo $row[2]." ".$row[4]; ?>" style="height:50px; float:left; max-width:90px;"/></div>
					<p style="float:left; text-align:left; font-size:20px; font-weight:bold; margin:0px;"><?php echo $tra["valor1"]; ?></p>
                    <p style="float:left; text-align:left; font-size:14px; font-weight:bold; margin:0px;"><?php if ($total>0){ echo round($tantpercent1,2)." %";}?></p>
				</div>
                
                
                <div style="float:left; width:160px; margin-left:0px; margin-top:10px;"> <!-- equipo visitante -->  
					<div style='float:left; max-width:90px; border:1px solid #000; margin-right:5px;'><img src="<?php echo $row2[5]; ?>" alt="<?php echo $row2[2]." ".$row2[4]; ?>" title="<?php echo $row2[2]." ".$row2[4]; ?>" style="height:50px; max-width:90px;" /></div>
					<p style="float:left; text-align:left; font-size:20px; font-weight:bold;margin:0px;"><?php echo $tra["valor2"]; ?></p>
					<p style="float:left; text-align:left; font-size:14px; font-weight:bold;margin:0px;"><?php if ($total>0){ echo round($tantpercent2,2)." %";}?></p>
				</div>
                
    		<?php }}?>
	</div>
   
    
            
	<div style="width:420px; background-color: #fff; color: inherit; margin-top: 0px; float:left;">
		<ul style="list-style-type: none;  margin: 0; overflow: hidden; padding: 0 0 0 100px; ">
			<li style=" border-right: 2px solid #ccc;  display: inline; float: left; margin-left: -90px; width: 100px; padding: 5px 0 10px 20px; text-align: left; text-transform: uppercase; background: url('icons/group.png') no-repeat scroll 0 50% transparent;">
				<p style="font-size:12px; color:#4A9DCA; margin:0px 0px 0px 20px; float:right;">
                <?php $asistencia = "SELECT COUNT(*) FROM checkin WHERE id_partido='$id_partido'"; //sacamos la asistencia al partido
			$query_asis = mysql_query($asistencia, $link);
				if (@mysql_num_rows($query_asis)){
					while ($pn = mysql_fetch_row($query_asis))
					{
                    echo "<span style='font-size:30px;'>".$pn[0]."</span> asistentes"; 
                    }
                }?>
                  </p>
             </li>
             <li style="line-height: 1.2em;  text-align:center; padding-top:25px; text-transform: uppercase;">
             <strong>	
                <?php $q = "SELECT * FROM pabellon WHERE id='$id'";
					$query_equips = mysql_query($q, $link);
					if (@mysql_num_rows($query_equips)){	
						while ($row = mysql_fetch_row($query_equips))
							{ 
							$aux_elSalon2 = str_replace("'", " ","<p style='line-height:25px;'><a target='_blank' style='text-decoration:none;' href='http://maps.google.com/maps?q=".rawurlencode($row[2].", ".$row[5].", ".$row[3].", ".$row[8])."'><strong style='color:#226c94;'>".$row[1]."</strong></a><br />".$row[2]." - " .$row[3]."</p><p style='float:left; width:auto; margin:0px;'><a href='cargapartidos_interior.php?id=$row[0]' style='text-decoration:none; color:#226c94;'>Acceder al partido</a></p>");
							?>	
                
                	<a href="javascript:void(0)" onclick="loadMapInfo('<?php echo $row[6]?>', '<?php echo $row[7]?>', '<?php echo $aux_elSalon2?>', '<?php echo $row[9]?>');" style="text-decoration:none; color:#4A9DCA; font-weight:normal; font-size:14px;"><span>Ubicar en el mapa</span></a>
                    <?php }
					}?>
                </strong>
			 </li>
		</ul>
	</div>
    
    <div style="margin-top:0px; -webkit-border-bottom-left-radius:5px; -webkit-border-bottom-right-radius:5px; -moz-border-radius-bottomleft:5px; -moz-border-radius-bottomright:5px; position:relative; background-color:#4A9DCA; padding:10px; width:400px; float:left;">
      <p style="text-align:center; margin:0px; text-transform: uppercase;">
        <?php echo '<a href="partido.php?id='.$id_partido.'" style="text-decoration:none; color:#fff;"><strong>Acceder al partido</strong></a>';?>
      </p>
    </div>
    
  <!-- fin acceso funciones -->

	<?php } // fin while?>
	
<?php }else{// si no hay resultados de partido en este pabellon
	echo "<div style='float:left; text-align:left; width:230px; height:20px;'><p style='font-size:14px; color:#226c94;'>No hay partidos en este pabellón.</p></div>";	
	} //fin if

echo "</div>"; //fin partit
?>