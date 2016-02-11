<?php
include("lib/config.php");
$id_equipo = $_POST['id_equipo'];
if(isSet($_POST['lastmsg']))
{
	$lastmsg=mysql_real_escape_string($_POST['lastmsg']);
	$result=mysql_query("SELECT comentarios.*, usuario.* FROM comentarios, usuario WHERE comentarios.comentario_id < '$lastmsg' AND comentarios.id_equipo='$id_equipo' AND comentarios.id_usuario=usuario.id ORDER BY comentarios.fecha_c DESC LIMIT 5");
	$count=mysql_num_rows($result);
	while($row=mysql_fetch_array($result))
	{
		$comentario_id=$row['comentario_id'];
		$comentario=stripslashes($row['comentario']);
		$fecha=$row['fecha_c'];
		$usuario=$row['nombre'];
		$img = $row['img'];
		$us_id = $row['id_usuario'];
		?>
        <li>
        	<p style="margin:0px; font-size:14px; color:#4A9DCA; padding-bottom:10px;"><?php echo utf8_encode($comentario); ?></p>
            <!-- <p style="color:#666;">Publicado el: <?php //echo $fecha; ?></p>-->
        	<p style="color:#666;">
            <?php
			if ($fecha){ //si hay fecha, la cambiamos de formato de BBDD a texto
				$p=split(" ",$fecha);
					$f=split("-",$p[0]);
					$h=split(":",$p[1]);
														
					//cambio de fecha
					$nummes=(int)$f[1];
					$mes1="0-Enero-Febrero-Marzo-Abril-Mayo-Junio-Julio-Agosto-Septiembre-Octubre-Noviembre-Diciembre";
					$mes1=split("-",$mes1);
														
					//cambio de hora
					$numhora=(int)$h[0];	
					$desfechahora="$f[2] de $mes1[$nummes] de $f[0] a las $numhora:$h[1] h.";
				}
							
			if (($img)!=""){?>
                	<p style='font-size:11px; text-align:left; width:100%; color:#4A9DCA; line-height:20px; margin:0px;'><a href="usuario.php?id=<?php echo $us_id ?>"><img src="perfiles/<?php echo $img; ?>" alt="<?php echo utf8_encode($usuario); ?>" title="<?php echo utf8_encode($usuario); ?>" style="border:1px solid #ccc; width:32px; height:32px;" /></a> Comentado el <?php echo $desfechahora;?></p>
                <?php }else{ ?>
                	<p style='font-size:11px; text-align:left; width:100%; color:#4A9DCA; line-height:20px; margin:0px;'><a href="usuario.php?id=<?php echo $us_id ?>"><img src="perfiles/default.png" alt="<?php echo utf8_encode($usuario); ?>" title="<?php echo utf8_encode($usuario); ?>" style="border:1px solid #ccc" /></a> Comentado el <?php echo $desfechahora;?></p>
                <?php } ?>                     
			</li>
		<?php } ?>

<div id="more<?php echo $comentario_id; ?>" class="morebox">
	<a href="#" id="<?php echo $comentario_id; ?>" class="more">ver más comentarios</a>
</div>
<?php } ?>