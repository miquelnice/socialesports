<div class="acceso"> <!-- Login y Registro -->
    <?php 
    error_reporting(0);
	if($_SESSION["autentificado"] != "SI")  {?>
    	<a href="acceso_empresa.php" class="empresas" title="Acceso empresas">ACCESO EMPRESAS</a>
    <?php }else{
    	echo '<a href="salir.php" class="empresas" title="Cerrar sesión empresas">SALIR EMPRESAS</a>';
		//echo '<a href="loginempresa.php?id='.$id.'" class="empresas" title="Página empresas">EMPRESAS</a>';
     }?>
    
    
    <a class="boton_login" href="javascript:void(0);" onclick="$('#alert').toggle(); $('#alta').hide(); $('#accesoempresa').hide(); $('#user').focus()" id="entrar" title="Entrar"><span>Acceso usuarios</span></a>
    <p class="login">
    	<a href="alta.php" id="register" title="Registrarse"><span>Registrarse</span></a>                       
   	</p>
                       
                    
                    <div id="alert" style="display:none; width: 212px; float:left; padding:8px; position:absolute; z-index:100; right:12px; background-color:#fff; -webkit-border-radius: 9px; -moz-border-radius: 9px; border-radius: 9px;">
						<span class="caret-inner" style="position:absolute; top: -6px; left: 107px; display: inline-block; border-left: 6px solid transparent; border-left-width: 6px; border-left-style: solid; border-left-color: transparent; border-right: 6px solid transparent; border-right-width: 6px; border-right-style: solid; border-right-color: transparent; border-bottom: 6px solid #fff; border-bottom-width: 6px;
border-bottom-style: solid; border-bottom-color: #fff;"></span>
					                 
                    <?php if($_SESSION["access"]==true){ //si se ha iniciado session no mostrar cuadro de registro
						echo "<div id='mensaje' style='float:left; width:210px; height:auto; border:2px solid #226c94; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>";
							$user = $_SESSION["usuario"];
							$usuari = mysql_query("SELECT * FROM usuario WHERE nombre='$user'", $link); //sacamos el id del usuario 
							if (@mysql_num_rows($usuari)){
								while ($cha = mysql_fetch_row($usuari)){	
									echo '<div style="float:left; width:32px; padding:4px; margin-right:8px;">';
										echo '<a href="modificar_perfil.php?id_usuario='.$cha[0].'" style="text-decoration:none;" title="Modificar perfil">';	//hago reload de la pagina primero, pq sino no aplica los cambios de Modificar perfil							
										if(($cha[4])!=""){
											echo '<img src="perfiles/'.$cha[4].'" style="float:left; border:1px solid #fff; width:32px; height:32px;" /></a></div>';			
										}else{
											echo '<img src="perfiles/default.png" style="float:left; border:1px solid #fff" /></a></div>';
										}
			
									echo '<div style="float:left; width:100px; margin-top:5px;">';
										echo "<p style='font-size:14px; float:left; text-align:left; width:100%; margin:0px; color:#226c94;'>".$cha[1]."</p>";
										echo '<p style="float:left; font-size: 14px; text-align:left; margin:0px;"><a href="perfil.php?id='.$cha[0].'" style="text-decoration:none; color:#226c94;" title="Mis acciones">Mis acciones</a></p></div></div>';						   
								}
							}?>

						<div id="mensajesdirectos" style="float:left; height:auto; border:2px solid #226c94; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; margin-top:8px; width:210px;">
                    		<div style="float:left; width:16px; padding:4px;">
                        		<img src="icons/mail.png" width="16" />
                    		</div>
                    		<div style="float:left; width:185px;">
                    			<p style="font-size:14px; padding-left:8px; padding-top:4px; float:left; text-align:left; color:#226c94; margin:0px;">Mensajes directos</p>
								<?php
                                $sql = "SELECT * FROM dm WHERE para='".$_SESSION['usuario']."' and leido IS NULL";
                                $res = mysql_query($sql, $link) or die(mysql_error());
                                $tot = mysql_num_rows($res);
                                ?>
                        		<p style="font-size:12px; float:left; text-align:left; margin-left:8px; width:100%;">Tienes <a href="list_dm.php" title="Listado de mensajes directos" style="font-size:18px; color:#226c94; text-decoration:none;"><?=$tot?></a> mensajes sin leer.</p>
                        		<div>
                        			<p style="font-size:12px; float:left; text-align:left; margin-left:8px; margin-bottom:4px; "><a href="crear_dm.php" style="text-decoration:none; color:#226c94" title="Crear mensaje directo">Crear MD</a></p></div>
               				</div>
             			</div><!-- fin mensajesdirectos -->
                                     
                        <div id="cerrar-sesion" style="float:left; height:auto; margin-top:8px; width:180px;">
                            <a href="salir.php" title="Cerrar sesión" id="logout">CERRAR SESION</a>
                        </div>
                                    
					<?php }else{ //si no se ha iniciado mostrar cuadro de registro ?>
						<form action="#" method="post" id="login">
							<div style="width: 210px; z-index:100; float:left; margin-top:0px; border:2px solid #226c94; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
	                			<p style="width:100%; text-align:left; margin-bottom:5px; color:#333; font-weight:bold; font-size:18px; margin-left:8px; margin-top:8px; float:left;">ACCESO USUARIOS</p>
								<label style="float:left; text-align:left; width:100%; margin-bottom:8px; color:#226c94; margin-left:8px;">Usuario</label>
                    			<input type="text" name="user" id="user" style='margin-left:8px;background-color:#CCCCCC; border:0; width:180px; float:left; margin-bottom:8px;' />
                    			<label style="float:left; text-align:left; width:100%; margin-bottom:8px; color:#226c94; margin-left:8px;">Password</label>
                    			<input type="password" name="password" id="password" style='margin-left:8px;background-color:#CCCCCC; border:0; width:180px; float:left; margin-bottom:8px;' />
                                    <!-- type="submit" funciona al apretar ENTER -->
                    			<input id="submit" type="button" value="INICIAR SESION" onClick="login($('#user').attr('value'), $('#password').attr('value'), $('#login').css('display','none'));" />
                    
                    			<a href="javascript:void(0)" onclick="recuperando(); $('#recuperacion').show();" style="text-decoration:none; float:left; margin-bottom:8px; margin-left:8px;" title="Recuperar password" id="recuperar">Recupera tu password</a>
							</div>
						</form>                    
		           	<?php } //fin usuario session/registro ?>
					
                    <div id="recuperacion"></div>
                    <div id="mensaje"></div>
        			<div id="perfil"></div>
				
                </div><!-- fin alert -->                
			</div><!-- fin acceso: login y registro -->