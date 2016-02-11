<?php
session_start();
include "lib/config.php";

$ciudad = $_GET['ciudad'];
$deporte = $_GET['deporte'];
?>

<select name='pabellon' id='pabellon' onChange="partido(this.value); $('.fondo_resultados').css('display','block'); $('.resultados').css('display','block');">
<?php 
echo '<option value="Selecciona pabellon">Selecciona pabellón</option>';
$result = mysql_query("SELECT * FROM pabellon WHERE ciudad IN ('".$ciudad."') AND sport='$deporte'", $link);
									
if (@mysql_num_rows($result)){
	while ($row=mysql_fetch_row($result)){ 
		echo '<option value="'.$row[0].'">'.$row[1].'</option>';

	}
}?>
</select>		



	