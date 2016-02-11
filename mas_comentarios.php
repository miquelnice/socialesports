<?php
include("lib/config.php");
$id_partit = $_POST['id_partit'];
if(isSet($_POST['lastmsg']))
{
	$lastmsg=mysql_real_escape_string($_POST['lastmsg']);
	$result=mysql_query("SELECT messages.*, usuario.* FROM messages, usuario WHERE messages.msg_id < '$lastmsg' AND messages.id_partido='$id_partit' AND messages.id_usuario=usuario.id ORDER BY messages.fecha DESC LIMIT 5");
	$count=mysql_num_rows($result);
	while($row=mysql_fetch_array($result))
	{
		$msg_id=$row['msg_id'];
		$message=stripslashes($row['message']);
		$fecha=$row['fecha'];
		$usuario=$row['nombre'];
		$img = $row['img'];
		$us_id = $row['id_usuario'];
		?>
        <li>
        	<p style="margin:0px; font-size:14px; color:#4A9DCA; padding-bottom:10px;"><?php echo utf8_encode($message); ?></p>
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
			} //fin formato fecha
							
			if (($img)!=""){?>
                				<p style='font-size:11px; text-align:left; width:100%; color:#4A9DCA; line-height:20px; margin:0px;'><a href="usuario.php?id=<?php echo $us_id ?>"><img src="perfiles/<?php echo $img; ?>" alt="<?php echo $usuario; ?>" title="<?php echo $usuario; ?>" style="border:1px solid #ccc; width:32px; height:32px;" /></a> Comentado el <?php echo $desfechahora;?></p>
                			<?php }else{ ?>
                			<p style='font-size:11px; text-align:left; width:100%; color:#4A9DCA; line-height:20px; margin:0px;'><a href="usuario.php?id=<?php echo $us_id ?>"><img src="perfiles/default.png" alt="<?php echo $usuario; ?>" title="<?php echo $usuario; ?>" style="border:1px solid #ccc" /></a> Comentado el <?php echo $desfechahora;?></p>
                		<?php } ?>             
		</li>
	<?php } ?>

<div id="more<?php echo $msg_id; ?>" class="morebox">
	<a href="#" id="<?php echo $msg_id; ?>" class="more">ver más comentarios</a>
</div>
<?php } ?>