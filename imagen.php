<div id="cargar" style="float:left; margin-top:10px; margin-left:20px; width:330px;">
<a href="#" onClick="$('#cargar').hide();" style="float:right;" title="Cerrar"><img src="icons/lightbox-btn-close.png" title="Cerrar" style="width:15px;" /></a>
<form action="upload.php" method="post" enctype="multipart/form-data" style="padding:8px; float:left; text-align:left;">
	<input name="id_partit" type="hidden" id="id_partit" value="<?php echo $_GET['id_partit'] ?>">
    <input name="id_usuario" type="hidden" id="id_usuario" value="<?php echo $_GET['id_usuario'] ?>">
    
    <input name="userfile" type="file" id="userfile" size="60" style="float:left; text-align:left;">
    <input type="submit" value="SUBIR IMAGEN" style="float:left; font-size: 14px; font-weight: bold; border:none; margin-top:40px; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" />

</form>
</div>
