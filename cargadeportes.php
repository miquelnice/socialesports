<?php  
include "lib/config.php";
$deporte = $_GET['deporte'];
//echo $deporte;?>		

<select name='city' id='city' onChange="enviociudad(this.value);">
<?php 
echo '<option value="Selecciona poblacion">Selecciona población</option>';
$result = mysql_query("SELECT * FROM pabellon WHERE sport='$deporte' GROUP BY ciudad", $link);
									
if (@mysql_num_rows($result)){
	while ($row=mysql_fetch_row($result)){ 
		echo '<option value="'.$row[6].'-'.$row[7].','.$row[3].'/'.$row[9].'">'.$row[3].'</option>';
		//onClick="enviociudad('.$row[6].','.$row[7].',this.value);"
	}
}?>
</select>
