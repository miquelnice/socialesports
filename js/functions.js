	var iconBlue = new GIcon(); 
    iconBlue.image = 'icons/basket_ball_azul.png';
    iconBlue.iconSize = new GSize(20, 25);
    iconBlue.shadowSize = new GSize(20, 25);
    iconBlue.iconAnchor = new GPoint(6, 20);
    iconBlue.infoWindowAnchor = new GPoint(5, 1);

    var iconRed = new GIcon(); 
    iconRed.image = 'icons/rugby_ball.png';
    iconRed.iconSize = new GSize(20, 25);
    iconRed.shadowSize = new GSize(20, 25);
    iconRed.iconAnchor = new GPoint(6, 20);
    iconRed.infoWindowAnchor = new GPoint(5, 1);

    var customIcons = [];
    customIcons["Baloncesto"] = iconBlue;
    customIcons["Rugby"] = iconRed;

    function load(lat, lng, zoom) {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
        map.addControl(new GSmallMapControl());
        //map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(lat, lng), zoom);

        GDownloadUrl("cargamarkers.php", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
            var id = markers[i].getAttribute("id");
			var nombre = markers[i].getAttribute("nombre");
	        var calle = markers[i].getAttribute("calle");
	        var ciudad = markers[i].getAttribute("ciudad");
            var sport = markers[i].getAttribute("sport");
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")), parseFloat(markers[i].getAttribute("lng")));
            var marker = createMarker(point, nombre, calle, ciudad, id, sport);
            map.addOverlay(marker);
          }
        });
      }
    }

    function createMarker(point, nombre, calle, ciudad, id, sport) {
      var marker = new GMarker(point, customIcons[sport]);
      var html = "<p style='line-height:25px;'><a target='_blank' style='text-decoration:none;' href='http://maps.google.com/maps?q="+ calle +", "+ ciudad +"'><strong style='color:#226c94;'>" + nombre + "</strong></a> <br/>" + calle + " - " + ciudad + "</p><p style='float:left; width:auto; margin:0px;'><a href='cargapartidos_interior.php?id="+id+"' style='text-decoration:none; color:#226c94;'>Acceder al partido</a></p>";
      GEvent.addListener(marker, 'click', function() {
        marker.openInfoWindowHtml(html);
      });
      return marker;
    }

	  
	  /* funcion para saber la ciudad seleccionada, y mostrar markers en mapa */
	  function enviociudad(valor){ //marcar ciudades en el mapa (lat, lng, valor)
			//para sacar la ciudad
			var linea = new String(valor);
      		var pos = linea.indexOf(",");
			pos = pos+1;
			var caca = linea.indexOf("/");
			var ciudad = linea.substring(pos,caca);
			//document.write(ciudad);
	  		
			//para sacar el deporte
			var sport = new String(valor);
      		var tra = linea.indexOf("/");
			tra = tra+1;
			var deporte = sport.substr(tra,100);
			//document.write(deporte);
			
			//para sacar la lat		
			var lats = new String(valor);
			var posi = lats.indexOf("-");
			var lat = lats.substr(0,posi);
			//document.write(lat);
			
			//para sacar la lng
			var lngs = new String(valor);
			var posic = linea.indexOf("-");
			posic=posic+1;
			var posicion = linea.indexOf(",");
			var lng = lngs.substring(posic,posicion);
			//document.write(lng);
			
		  	createRequest();
			var url = "cargaresultados.php?ciudad="+ciudad+"&deporte="+deporte; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					document.getElementById("pabellon").innerHTML = request.responseText; //muestra resultados en myContent
				}	
							
			} 
		  
		  
		  if (GBrowserIsCompatible()) {	 //*****posar-ho si vull reubicar el mapa per la ciutat escollida
			   	map = new GMap2(document.getElementById("map_canvas"));
		        map.setCenter(new GLatLng(lat, lng), 13);
		        map.addControl(new GSmallMapControl());
	
		       
		        GDownloadUrl("cargaciudades.php?ciudad="+ciudad+"&deporte="+deporte, function(data) {
		            var xml = GXml.parse(data);
		            var markers = xml.documentElement.getElementsByTagName("marker");
		           	for (var i = 0; i < markers.length; i++) {
					  var id = markers[i].getAttribute("id");
		              var nombre = markers[i].getAttribute("nombre");
		              var calle = markers[i].getAttribute("calle");
		              var ciudad = markers[i].getAttribute("ciudad");
		              var pais = markers[i].getAttribute("pais");
					  var sport = markers[i].getAttribute("sport");
	             	  var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")), parseFloat(markers[i].getAttribute("lng")));
	              	  var marker = createMarker2(point, nombre, calle, ciudad, id, sport);
		              map.addOverlay(marker);
		              
	            	}
		          });
	    
		   	        
		      }  
	  }
	  function createMarker2(point, nombre, calle, ciudad, id, sport) { //mostrar bubble con pabellon y su direccion
	      var marker = new GMarker(point, customIcons[sport]);
	      var html = "<p style='line-height:25px;'><a target='_blank' style='text-decoration:none;' href='http://maps.google.com/maps?q="+ calle +", "+ ciudad +"'><strong style='color:#226c94;'>" + nombre + "</strong></a> <br/>" + calle + " - " + ciudad + "</p><p style='float:left; width:auto;'><a href='cargapartidos_interior.php?id="+id+"' style='text-decoration:none; color:#226c94;'>Acceder al partido</a></p>";
	      GEvent.addListener(marker, 'click', function() {
	        marker.openInfoWindowHtml(html);
	        map.setCenter(point,15); //reubicamos el mapa haciendo zoom hasta 10
	      });
	      return marker;
	    }
	  	  


	  	  
	  function loadMapInfo(lat,lng,infos, sport){ //busqueda final por pais, ciudad y zip
		  	$('#map_canvas').css('visibility','visible');
		  	var latlng = new GLatLng(lat,lng);
		  	var marker = new GMarker(latlng, customIcons[sport]);
	        map.addOverlay(marker);
	        GEvent.addListener(marker,"click", function() {
	           	var myHtml = infos;
	            marker.openInfoWindowHtml(myHtml);
	       });
	               
	  		map.setCenter(new GLatLng(lat,lng),15);
	  		//map.refresh();
 		}
		
		

/* funcion partido, segun pabellon seleccionado */
function partido(id){ //marcar partidos en el mapa

		  	createRequest();
			var url = "cargapartidos.php?id="+id; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					document.getElementById("partit").innerHTML = request.responseText; //muestra resultados en partit
				}	
							
			} 
}


/* contador de checkins por partido */
function contar(idpartit, idusuario){ 

		  	createRequest();
			var url = "checkin.php?idpartit="+idpartit+"&usuario="+idusuario; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					location.reload();
					//document.getElementById("contador").innerHTML = request.responseText; //muestra resultados en contador
				}	
							
			} 
}

/* contador de descargas de cupones */
function descargados(idcupon, descargas){ 

		  	/*createRequest();
			var url = "descargados.php?idcupon="+idcupon+"&descargas="+descargas; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{*/
					location.reload();
					//document.getElementById("contador").innerHTML = request.responseText; //muestra resultados en contador
				//}	
							
			//} 
}

/* funcion insertar comentario a partido */
$('#insertant').submit(function() {
        $.ajax({
            type: 'POST',
            url: "comentar.php",
            data: "message="+ message+"&id_partido="+id_partido,
            success: function(data) {
                $('ol#updates').html(data);

            }
        })
        
        return false;
    });   


function calendari(calendari){ 

		  	createRequest();
			var url = "calendari.php?equip_id="+calendari; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					document.getElementById("calendari").innerHTML = request.responseText; //muestra resultados en calendari
				}	
							
			} 
}



function buscar(equipo1,equipo2){ //marcar ciudades en el mapa con zip
	createRequest();
	//var pais = $("pais").value;
	//var ciudad = $("ciudad").value;
	var url = "buscar-anteriores.php?equipo1="+equipo1+"&equipo2="+equipo2; //carga resultados desde la consulta
	request.open("GET", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			document.getElementById("myContent").innerHTML = request.responseText; //muestra resultados en myContent
		}	
	}	
}




function login(user,password){ //marcar ciudades en el mapa con zip
	createRequest();
	//var pais = $("pais").value;
	//var ciudad = $("ciudad").value;
	var url = "login.php?user="+user+"&password="+password; //carga resultados desde la consulta
	request.open("GET", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			document.getElementById("mensaje").innerHTML = request.responseText; //muestra resultados en mensaje (se debe poner el mismo codigo que en index.php cuando se loguea correctamente
			//$('#profile').hide(); //escondo la imagen del perfil que sale por defecto
			//$('#register').hide();
			//location.reload();
		}	
	}	
}






function eliminar(message, usuario){ //eliminar comentario del usuario
	createRequest();
	var url = "eliminar.php?id="+message+"&user="+usuario; //carga resultados desde la consulta
	request.open("GET", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			location.reload(); //recargar la pagina para regresar a los comentarios
		}	
	}	
}

function eliminar_asistencia(checkin, usuario){ //eliminar comentario del usuario
	createRequest();
	var url = "eliminar_asistencia.php?id="+checkin+"&user="+usuario; //carga resultados desde la consulta
	request.open("GET", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			location.reload(); //recargar la pagina para regresar a los comentarios
		}	
	}	
}



function imagen(id_partit,id_usuario){ //carga pagina de registro de usuario
	createRequest();
	var url = "imagen.php?id_partit="+id_partit+"&id_usuario="+id_usuario; //carga resultados desde la consulta
	request.open("GET", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			document.getElementById("cargar").innerHTML = request.responseText;; //muestra resultados en cargar
		}	
	}	
}


function eliminar_imagen(id_img){ //eliminar comentario del usuario
	createRequest();
	var url = "eliminar_imagen.php?id="+id_img; //carga resultados desde la consulta
	request.open("GET", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			location.reload(); //recargar la pagina para regresar a los comentarios
		}	
	}	
}




function seguir(id_equipo, id_user){ 

		  	createRequest();
			var url = "seguidor.php?id_equipo="+id_equipo+"&id_user="+id_user; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					//location.reload(); //recargar la pagina para regresar a los comentarios
					document.getElementById("supporter").innerHTML = request.responseText;; //muestra resultados en supporter
				}	
							
			} 
}


function fan(id_equipo, id_user){ 

		  	createRequest();
			var url = "fan.php?id_equipo="+id_equipo+"&id_user="+id_user; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					//location.reload(); //recargar la pagina para regresar a los comentarios
					document.getElementById("fan").innerHTML = request.responseText;; //muestra resultados en supporter
				}	
							
			} 
}


function eliminar_seguir(id){ //eliminar comentario del usuario
	createRequest();
	var url = "eliminar_seguir.php?id="+id; //carga resultados desde la consulta
	request.open("GET", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			location.reload(); //recargar la pagina para regresar a los comentarios
		}	
	}	
}


function eliminar_fan(id){ //eliminar comentario del usuario
	createRequest();
	var url = "eliminar_fan.php?id="+id; //carga resultados desde la consulta
	request.open("GET", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			location.reload(); //recargar la pagina para regresar a los comentarios
		}	
	}	
}


function recuperando(){ //valida el correo para recuperar el password
	createRequest();
	var url = "recuperar.php"; //carga resultados desde la consulta
	request.open("POST", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			document.getElementById("recuperacion").innerHTML = request.responseText;; //muestra resultados en recuperacion
		}	
	}	
}

function recuperar(rcorreo){ //recupero el correo del usuario que ha perdido password. Se manda mail
	createRequest();
	var url = "recuperacion.php?rcorreo="+rcorreo; //carga resultados desde la consulta
	request.open("POST", url, true);
	request.onreadystatechange = carregant2;
	request.send(null);
	  
	function carregant2()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			document.getElementById("error").innerHTML = request.responseText; //muestra resultados en recuperacion
		}	
	}	
}



/* votacion de ganador */
function votar1(idpartit, valor1){ //votar1 es la funcion para votar por el equipo local

		  	createRequest();
			var url = "votar.php?idpartit="+idpartit+"&valor1="+valor1; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					location.reload();
					//document.getElementById("contador").innerHTML = request.responseText; //muestra resultados en contador
				}	
							
			} 
}

function votar2(idpartit, valor2){ //votar2 es la funcion para votar por el equipo visitante

		  	createRequest();
			var url = "votar2.php?idpartit="+idpartit+"&valor2="+valor2; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					location.reload();
					//document.getElementById("contador").innerHTML = request.responseText; //muestra resultados en contador
				}	
							
			} 
}









function enviodeporte(deporte){ //carga resultados del deporte seleccionado página principal
		createRequest();
			var url = "cargadeportes.php?deporte="+deporte; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					document.getElementById("ciudad").innerHTML = request.responseText; //muestra resultados en deporte
				}	
							
			} 
}




function enviosport(sport){ //carga resultados del deporte seleccionado página de buscar
		createRequest();
			var url = "cargasport.php?sport="+sport; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					document.getElementById("genero").innerHTML = request.responseText; //muestra resultados en deporte
				}	
							
			} 
}



function enviogenero(genero, sport){ //carga resultados del deporte seleccionado
		createRequest();
			var url = "cargagenero.php?genero="+genero+"&sport="+sport; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					document.getElementById("categoria").innerHTML = request.responseText; //muestra resultados en deporte
				}	
							
			} 
}


function enviogrupo(grupo){ //carga resultados del deporte seleccionado
		createRequest();
			var url = "cargagrupo.php?grupo="+grupo; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					document.getElementById("equipo1").innerHTML = request.responseText; //muestra resultados en deporte
				}	
							
			} 
}


function enviocategoria(categoria, genero, sport){ //carga resultados del deporte seleccionado
		createRequest();
			var url = "cargacategoria.php?categoria="+categoria+"&genero="+genero+"&sport="+sport; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					document.getElementById("grupo").innerHTML = request.responseText; //muestra resultados en deporte
				}	
							
			} 
}


function envioequipo1(equipo1, grupo){ //carga resultados del deporte seleccionado
		createRequest();
			var url = "cargaequipo1.php?equipo1="+equipo1+"&grupo="+grupo; //carga resultados desde la consulta
			request.open("GET", url, true);
			request.onreadystatechange = carregant;
			request.send(null);
	  
			function carregant()
			{
				if (request.readyState == 4 && request.status == 200)
				{
					document.getElementById("equipo2").innerHTML = request.responseText; //muestra resultados en deporte
				}	
							
			} 
}







/* mi ubicacion	(ahora no funciona ya que está comentado el codigo) */
function obtener_localizacion() {
	var lloc = new GIcon(G_DEFAULT_ICON);
    lloc.image = "icons/marker_orange.png";
    lloc.iconSize = new GSize(18, 32);
    lloc.shadowSize = new GSize(0, 0);
	
	//Set up our GMarkerOptions object
	markerOptions = { icon:lloc };
  if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(mostrar_mapa,gestiona_errores);
  }else{
alert('Tu navegador no soporta la API de geolocalizacion');  
  }
}
function mostrar_mapa(position) {
  	var lat= position.coords.latitude;
  	var lng= position.coords.longitude;
  	map = new GMap2(document.getElementById("map_canvas"));
	map.setCenter(new GLatLng(lat, lng), 10);
	map.addControl(new GSmallMapControl());
	var point = new GLatLng(lat, lng);
	var marker = createMarker3(point);
	map.addOverlay(marker);
	
}
function createMarker3(point) { //marker de la ubicación del usuario
	var marker = new GMarker(point, customIcons[sport]);
	var html = "<p style='line-height:25px;'><strong style='color:#E3001B;'>Tu ubicación</strong></p>";
    GEvent.addListener(marker, 'click', function() {
	    marker.openInfoWindowHtml(html);
	    map.setCenter(point,10); //reubicamos el mapa haciendo zoom hasta 10
	});
	return marker;
}
function gestiona_errores(err) {
  if (err.code == 0) {
    alert("error desconocido");
  }
  if (err.code == 1) {
    alert("El usuario no ha compartido su posicion");
  }
  if (err.code == 2) {
    alert("no se puede obtener la posicion actual");
  }
  if (err.code == 3) {
    alert("timeout recibiendo la posicion");
  }
} //fin mi ubicacion




// ahora no funciona pq el codigo esta comentado
function centrar_mapa() { //centramos mapa segun la ubicacion del usuario via navegador
	if (navigator.geolocation) {
  		navigator.geolocation.getCurrentPosition(mostrar_mapa,gestiona_errores);
  	}else{
		alert('Tu navegador no soporta la API de geolocalizacion');  
  	}
}
function mostrar_mapa(position) {
	//var map = null;
  	var lat= position.coords.latitude;
  	var lng= position.coords.longitude;	
	map = new GMap2(document.getElementById("map_canvas"));
	map.setCenter(new GLatLng(lat, lng), 10);
	map.addControl(new GSmallMapControl());
	var point = new GLatLng(lat, lng);
}




//function partido_interior(id){ //marcar partidos en el mapa

		  	//createRequest();
			//var url = "cargapartidos_interior.php?id="+id; //carga resultados desde la consulta
			//request.open("GET", url, true);
			//request.onreadystatechange = carregant;
			//request.send(null);
	  
			//function carregant()
			//{
				//if (request.readyState == 4 && request.status == 200)
				//{
					//document.getElementById("aqui").innerHTML = request.responseText; //muestra resultados en partit
				//}	
							
			//} 
//}


//function verclubfans(id_equipo, id_user){ 

		  	//createRequest();
			//var url = "clubfans.php?id_equipo="+id_equipo+"&id_user="+id_user; //carga resultados desde la consulta
			//request.open("GET", url, true);
			//request.onreadystatechange = carregant;
			//request.send(null);
	  
			//function carregant()
			//{
				//if (request.readyState == 4 && request.status == 200)
				//{
					//location.reload(); //recargar la pagina para regresar a los comentarios
					//document.getElementById("clubfans").innerHTML = request.responseText;; //muestra resultados en clubfans
				//}	
							
			//} 
//}


//function modificar_perfil(id_usuario){ //carga pagina de registro de usuario
	//createRequest();
	//var url = "modificar_perfil.php?id_usuario="+id_usuario;; //carga resultados desde la consulta
	//request.open("GET", url, true);
	//request.onreadystatechange = carregant2;
	//request.send(null);
	  
	//function carregant2()
	//{
		//if (request.readyState == 4 && request.status == 200)
		//{
			//document.getElementById("cargar").innerHTML = request.responseText;; //muestra resultados en cargar
		//}	
	//}	
//}


//function imagen_perfil(id_usuario){ //carga pagina de registro de usuario
	//createRequest();
	//var url = "imagen_perfil.php?id_usuario="+id_usuario;; //carga resultados desde la consulta
	//request.open("GET", url, true);
	//request.onreadystatechange = carregant2;
	//request.send(null);
	  
	//function carregant2()
	//{
		//if (request.readyState == 4 && request.status == 200)
		//{
			//document.getElementById("cargar2").innerHTML = request.responseText;; //muestra resultados en cargar
		//}	
	//}	
//}








//function alta(){ //carga pagina de registro de usuario
	//createRequest();
	//var url = "alta.php"; //carga resultados desde la consulta
	//request.open("GET", url, true);
	//request.onreadystatechange = carregant2;
	//request.send(null);
	  
	//function carregant2()
	//{
		//if (request.readyState == 4 && request.status == 200)
		//{
			//document.getElementById("alta").innerHTML = request.responseText; //muestra resultados en alta
		//}	
	//}	
//}


//function registrar(nombre, correo, contrasenya){ //registro de usuario con nombre, mail y password
	//createRequest();
	//var url = "registro.php?nombre="+nombre+"&correo="+correo+"&contrasenya="+contrasenya; //carga resultados desde la consulta
	//request.open("GET", url, true);
	//request.onreadystatechange = carregant2;
	//request.send(null);
	  
	//function carregant2()
	//{
		//if (request.readyState == 4 && request.status == 200)
		//{
			//document.getElementById("registrado").innerHTML = request.responseText; //muestra resultados en registrado
		//}	
	//}	
//}

//function modificar(id_usuario, correo, contrasenya, ciudad, edad, sexo){ //modificar datos perfil usuario con mail y password
	//createRequest();
	//var url = "modificar.php?id_usuario="+id_usuario+"&correo="+correo+"&contrasenya="+contrasenya+"&ciudad="+ciudad+"&edad="+edad+"&sexo="+sexo; //carga resultados desde la consulta
	//request.open("GET", url, true);
	//request.onreadystatechange = carregant2;
	//request.send(null);
	  
	//function carregant2()
	//{
		//if (request.readyState == 4 && request.status == 200)
		//{
			//document.getElementById("modificado").innerHTML = request.responseText; //muestra resultados en registrado
		//}	
	//}	
//}