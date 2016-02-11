<?php 
include "autentificaempresa.php"; 
include "lib/config.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>SocialEsports</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<!--<link rel="stylesheet" href="css/reset.css" />-->

<? include "lib/js.php";?>
<script language="javaScript" type="text/javascript">
<!-- para validar el registro de los usuarios en la pagina de alta.php
	function validar()  
	{
	if(document.getElementById('insertant').nombre.value!=""){ //introduir algun valor
		if(document.getElementById('insertant').correo.value!=""){ //introduir algun valor
			if(document.getElementById('insertant').contrasenya.value!=""){ //introduir algun valor
				if(document.getElementById('insertant').acepto.checked){
					return true;
				}else{
					document.getElementById('alerta').style.border="1px solid #E3001B";	
					document.getElementById('alerta').style.width="88";
					document.getElementById('alerta').style.padding="10px";	
					return false;
				}
			}else{
			document.getElementById('insertant').contrasenya.style.border="1px solid #E3001B";
			return false;
			}
		}else{
		document.getElementById('insertant').correo.style.border="1px solid #E3001B";
		return false;
		}
	}else{
	document.getElementById('insertant').nombre.style.border="1px solid #E3001B";
	return false;
	}	

}

<!-- para validar la recuperacion de e-mails en la pagina de recuperar.php -->
	function recupero()  
	{
	if(document.getElementById('recuperis').rcorreo.value!=""){ //introduir algun valor
		return true;
	}else{
		document.getElementById('recuperis').rcorreo.style.border="1px solid #E3001B";
		return false;
	}	
}

$(document).ready(function(){ //para que se vea en IE7 y IE8
if (jQuery.browser.msie) {
  if(parseInt(jQuery.browser.version) == 8) {
  	$("#caca").css("marginTop","30px"); //espacio superior logos colaboradores
	$("ul.menu_web li a").css("paddingTop","19px");//medialuna hover menu
  }
	if(parseInt(jQuery.browser.version) == 7) {
		$(".menu").css("marginLeft","-340px"); //desplazamiento izquierda menu
		$("#caca").css("marginTop","30px"); //espacio superior logos colaboradores
		$("ul.menu_web li a").css("paddingTop","19px"); //medialuna hover menu
	}
} 
});
//end function
-->
</script>  
</head>
<body>
<div class="header"> <!-- Fondo de repetición -->
	<?php include 'lib/publicidad_top.php'; ?>
            <div class="cabecera"> <!-- Contenedor cabecera -->
                <a href="index.php" class="logo"><span>socialesports</span></a>
                
                
                <form name="language" id="language" action="#"> <!-- Selector de idioma -->
                    <select name="idioma" id="idioma" onchange="CIdioma(this.id);">
                        <option value="es">Español</option>
                        <option value="ca">Català</option>
                        <option value="en">English</option>
                    </select>
                </form>
				<script type="text/javascript">
                    function CIdioma(id){
                       var NuevaPagina = document.getElementById(id);
                       location.href = 'http://127.0.0.1/socialesports/' + NuevaPagina.value;
					   //location.href = 'http://127.0.0.1/socialesports/' + NuevaPagina.value + '.php';
                    }
                </script>
                
                
                
                <?php include "lib/panel.php"; ?>
            
            <?php //include "lib/menu.php"; ?>
            
        </div> <!-- Fin cabecera -->
	</div> <!-- Fin header -->

	<div id="wrap">
    	

<?php 
//$empresa = $_GET['empresa'];
//$passwordempresa = $_GET['passwordempresa'];


//$empresa = $_POST['empresa'];
//$passwordempresa = $_POST['passwordempresa'];
$id = $_GET['id'];
$visitant="SELECT *	FROM empresa WHERE id='$id'"; //si el login existe en la BBDD
$query_visitant = mysql_query($visitant, $link);
if (@mysql_num_rows($query_visitant)){
	while ($puni2 = mysql_fetch_row($query_visitant))
	{	
		
	//session_start();
	//$_SESSION["empresarial"] = $puni2[1];
	
	echo '<h3>Hola '.$puni2[1].'!</h3>';
	echo '<p style="font-size:14px; float:left; text-align:left; margin-left:20px; width:100%; margin-top:0px;">Desde aquí podrás gestionar todas tus promociones.</p>';

	//echo '<p style="float:right; margin-right:20px; margin-top:0px; width:100%;"><a href="salir.php" title="Cerrar sesión empresa" style="text-decoration:none; float:right; font-size: 10px; border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">Cerrar sesión empresa</a></p>';


	echo '<p style="float:left; margin-left:20px; margin-top:20px;margin-bottom:40px; width:100%;"><a href="crear_promocion.php?id='.$puni2[0].'" style="text-decoration:none; float:left; font-size: 14px; font-weight: bold; border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">Crear promoción</a></p>';
	$sql = "SELECT * FROM cupon WHERE id_empresa='".$puni2[0]."'";
$res = mysql_query($sql, $link) or die(mysql_error());
?>
  <table width="940" border="0" align="center" cellpadding="1" cellspacing="1" style="margin-bottom:60px;">
    <tr>
      <!--<td width="53" align="center" valign="top"><strong>ID</strong></td>-->
      <td width="426" align="center" valign="middle"><strong style="color:#4a9dca;">Modificar</strong></td>
      <td width="200" align="center" valign="middle"><strong style="color:#4a9dca;">Fecha validación</strong></td>
	  <td width="120" align="center" valign="middle"><strong style="color:#4a9dca;">Descargas</strong></td>
      <td width="150" align="center" valign="middle"><strong style="color:#4a9dca;">Eliminar</strong></td>
    </tr>
    <?php
	$i = true; 
	while($row = mysql_fetch_assoc($res)){ ?>
    <tr bgcolor="<? if ($i) { echo "#4a9dca"; $i=false; } else { echo "#226c94"; $i=true; }?>" height="30">
      <!--<td align="center" valign="top"><?$row['ID']?></td>-->
      <td align="center" valign="middle"><a href="modificar_promocion.php?id_cupon=<?php echo $row['id']?>&id=<?php echo $id?>" style="text-decoration:none; color:#fff;" title="Modificar <?php echo utf8_encode($row['titulo'])?>"><?php echo utf8_encode($row['titulo'])?></a></td>
      <td align="center" valign="middle" style="color:#fff;"><?php echo utf8_encode($row['fecha_validacion'])?></td>
	  <td align="center" valign="middle" style="color:#fff;"><?php echo $row['descargas']?></td>
      <td align="center" valign="middle" style="color:#fff;"><a href="eliminar_promocion.php?id_cupon=<?php echo $row['id'] ?>&id=<?php echo $id?>" title="Eliminar promoción" style="text-decoration:none; color:#fff;">ELIMINAR</a></td>
    </tr>
<?php $i++; 
} ?>
</table>

											
	
	<?php }?>
	</div>
</div>

<?php include "lib/footer.php"; ?>
</body>
</html>

<?php //}else{//si esta mal el login
	
	
}?>