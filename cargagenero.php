<?php  
include "lib/config.php";
$genero = $_GET['genero'];
$sport = $_GET['sport'];
?>		
<label style="float:left; text-align:left; margin-bottom:8px; color:#4A9DCA; width:150px;">CATEGORÍA</label>
<select name='categoria' id='categoria' style='width:290px; float:left; border: 0 none; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; box-shadow: 2px 2px 5px rgba(27, 100, 140, 0.4); color: #4A9DCA; font-family: "FSAlbert"; font-size: 16px; height: auto;' onChange="enviocategoria(this.value, '<?php echo $genero ?>','<?php echo $sport ?>')">
<?php 
echo '<option value="Elige">Elige categoría</option>';
$result = mysql_query("SELECT categ FROM equipo WHERE genero='$genero' GROUP BY categ", $link);
									
if (@mysql_num_rows($result)){
	while ($row=mysql_fetch_row($result)){ 
		echo '<option value="'.$row[0].'">'.$row[0].'</option>';
	}
}?>
</select>		
		