<?php  
include "lib/config.php";
$sport = $_GET['sport'];
?>		
<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">GÉNERO</label>
<select name='genero' id='genero' style='width:290px; float:left; border: 0 none; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; box-shadow: 2px 2px 5px rgba(27, 100, 140, 0.4); color: #4A9DCA; font-family: "FSAlbert"; font-size: 16px; height: auto;' onChange="enviogenero(this.value, '<?php echo $sport?>')">
<?php 
echo '<option value="Elige">Elige género</option>';
$result = mysql_query("SELECT equipo.genero FROM equipo, pabellon, partido WHERE pabellon.sport='$sport' AND pabellon.id=partido.id_pabellon AND partido.local=equipo.id GROUP BY equipo.genero", $link);
if (@mysql_num_rows($result)){
	while ($row=mysql_fetch_row($result)){ 
		echo '<option value="'.$row[0].'">'.$row[0].'</option>';
	}
}
?>
</select>