<?php  
include "lib/config.php";
$equipo1 = $_GET['equipo1'];
$grupo = $_GET['grupo'];
?>		
<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">EQUIPO VISITANTE</label>
<select name='equipo2' id='equipo2' style='width:290px; float:left; border: 0 none; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; box-shadow: 2px 2px 5px rgba(27, 100, 140, 0.4); color: #4A9DCA; font-family: "FSAlbert"; font-size: 16px; height: auto;' onChange="buscar( '<?php echo $equipo1 ?>',this.value)">
<?php 
echo '<option value="Elige">Elige equipo</option>';
$result = mysql_query("SELECT equipo.id, equipo.grupo, club.nombre FROM equipo, club WHERE equipo.id <> '$equipo1' AND equipo.grupo='$grupo' AND equipo.id_club = club.id", $link);
									
if (@mysql_num_rows($result)){
	while ($row=mysql_fetch_row($result)){ 
		echo '<option value="'.$row[0].'">'.utf8_encode($row[2]).'</option>';
	}
}?>
</select>		
		