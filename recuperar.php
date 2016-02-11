		<div id="recuperacion" style="width: 210px; z-index:100; float:left; margin-top:10px; border:2px solid #226c94; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
             <a href="#" onClick="$('#recuperacion').hide();" style="float:right; width:20px; padding:5px; position:relative;" title="Cerrar"><img src="icons/lightbox-btn-close.png" title="Cerrar" style="width:15px; border:none;" /></a>
            <form action="recuperacion.php" method="POST" enctype="multipart/form-data" id="recuperis" name="recuperis" onSubmit="return recupero()">
             
            <p style="float:left; width:175px; text-align:left; color:#333; font-weight:bold; padding-left:8px; margin:0px; font-size:18px;">RECUPERAR PASSWORD</p>     
           
            
            <p style="float:left; text-align:left; color:#226c94; margin-bottom:8px; font-size:12px; margin-left:8px;">Introduce tu e-mail y recibiras en tu cuenta el password.</p>             
            
            <label style="float:left; margin-bottom:8px; margin-left:8px; font-size:14px; font-weight:bold; color:#226c94;">E-mail:</label>
            <input name="rcorreo" type="email" id="rcorreo" size="30" style='background-color:#CCCCCC; border:0; width:180px; float:left; margin-bottom:8px; margin-left:8px;' />   
			
            <input type="submit" value="RECUPERAR" style="float:left; position:relative; font-size: 11px; font-weight: bold; color:#FFFFFF; border:none; width:100px; margin-top:8px; margin-left:8px; margin-bottom:12px; cursor:pointer; font-family: 'Trebuchet'; background-color:#226c94; -webkit-border-radius: 4px;	-moz-border-radius: 4px; border-radius: 4px;" onClick="recuperar($('#rcorreo').attr('value'));" />
            </form>
        </div>


