<?php session_start();
include 'lib/config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include "lib/metas.php";?>
<title>Socialesports - Cómo anunciar</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<!--<link rel="stylesheet" href="css/reset.css" />-->

<? include "lib/js.php";?>

<script language="javaScript" type="text/javascript">
function validar()  
	{
	if(document.getElementById('insertant').nombre.value!=""){ //introduir algun valor
		if(document.getElementById('insertant').correo.value!=""){ //introduir algun valor
			if(document.getElementById('insertant').contrasenya.value!=""){ //introduir algun valor
				return true;
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
            
            <?php include "lib/menu.php"; ?>
            
        </div> <!-- Fin cabecera -->
	</div> <!-- Fin header -->


<div id="wrap">
	<h3>Cómo anunciar</h3>
    
               
    <div style="width:920px; margin-left:20px; margin-bottom:60px;">
    <p style="margin:0px;">Si eres una empresa del ámbito deportivo y buscas promocionar tus productos o servicios, estás en el lugar adecuado.</p>
    <p style="color:#4a9dca; font-weight:bold; font-size:18px;">Date de alta y lanza tu primera promoción</p>
    
    <p>Lanza y controla tus promociones fácil y rápidamente:</p>	
		<ul>
        	<li style="list-style:circle inside; color:#4a9dca;">No hacemos ventas grupales</li>
            <li style="list-style:circle inside; color:#4a9dca;">Consigue clientes sólo de tu entorno inmediato</li>
            <li style="list-style:circle inside; color:#4a9dca;">Sin comisiones ni intermediarios</li>
            <li style="list-style:circle inside; color:#4a9dca;">Controla tus promociones fácilmente</li>
     	</ul>
                       
        <p style="margin:0px;">¿Porqué Socialesports?</p>
        <ul>
        	<li style="list-style:circle inside; color:#4a9dca;">Los usuarios buscan promociones cercanas antes de decidir su compra</li>
            <li style="list-style:circle inside; color:#4a9dca;">No comisionamos sobre tus ventas</li>
            <li style="list-style:circle inside; color:#4a9dca;">Somos transparentes, eficaces y económicos. Los clientes te llegan escalonadamente y son de tu localidad, evitando los clientes abusivos "de un solo consumo" que vienen desde lejos y nunca vuelven.</li>
            <li style="list-style:circle inside; color:#4a9dca;">Está pensado para pequeños empresarios, y les ayudamos a que tomen el control sobre sus negocios.</li>
     	</ul>
        
        <p style="float:left;width:100%; margin-bottom:40px;"><a href='alta_empresa.php' title='Darse de alta' style='text-decoration:none; float:left; font-size: 24px;  border:none; cursor:pointer; color:#fff; text-decoration:none; text-align:left; width:auto; padding:8px 14px; text-transform: uppercase; background-color: #4a9dca; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>Darse de alta</a></p>
        <p style="color:#4a9dca; font-weight:bold; font-size:18px;">Tarifas de afiliación para hacer tus promociones</p>
        <ul>
            <li style="list-style:circle inside; color:#4a9dca;">15€ al mes</li>
            <li style="list-style:circle inside; color:#4a9dca;">40€ al trimestre</li>
            <li style="list-style:circle inside; color:#4a9dca;">150€ al año</li>
        </ul>
        
        <p style="float:left; color:#4a9dca; width:100%; font-weight:bold; font-size:18px;">Y 0,8€ por cupón descargado!</p>
        <p style="float:left; color:#4a9dca; width:100%; font-size:12px; font-weight:normal; margin-bottom:40px; margin-top:-10px;">(I.V.A no incluído en las tarifas)</p>
        
		<p style="color:#4a9dca; font-weight:bold; font-size:18px;">Pasos a seguir:</p>
        <ol>
            <li style="color:#4a9dca;">Dáte de alta rellenando el <a href="alta_empresa.php" title="Darse de alta" style="text-decoration:none; color:#4a9dca;">formulario</a></li>
            <li style="color:#4a9dca;">Una vez te has registrado correctamente, recibirás un correo para hacer el pago on-line con Paypal, dónde deberás seleccionar el tiempo de afiliación que desees (mensual, trimestral o anual) 
            <li style="color:#4a9dca;">Una vez hecho efectivo el pago, se te activará la cuenta y recibirás por correo tu clave de acceso para poder empezar a operar
            <li style="color:#4a9dca;">Ya podrás lanzar tus promociones!
        </ol>
		<p style="float:left; color:#4a9dca; width:100%; font-size:16px; font-weight:normal; margin-bottom:40px; margin-top:-10px;">IMPORTANTE: Cada mes recibirás la factura para que abones el importe de los cupones descargados mediante Paypal</p>        
        
        
        <p>Para información más detallada sobre el servicio, no dudes en ponerte en contacto con nosotros enviando un correo a <a href="mailto:info@socialesports.com" title="Enviar correo" style="text-decoration:none; color:#4a9dca;">info@socialesports.com</a></p> 
                              
	</div>               
</div>
<?php include "lib/footer.php"; ?>
</body>
</html>