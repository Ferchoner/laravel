var address;

function getStoresByAddress(){
	address = $('#address').val();
	if( address == '' || address.length < 4 ){
		$('div.mensajes').html('Dirección vacía o muy pequeña');
		$('div.mensajes').slideDown(400);
	}
	else{
		//$.post('/');
	}
}

function initialize()
{
	// Center properties 				
	var mapProp = {
  		center:myCenter,
		zoom:14,
  		mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	// Creating the map
	map = new google.maps.Map(document.getElementById("map-canvas"),mapProp);				

  	// Creating listener for map
	google.maps.event.addListener(map,'click',function( event ) {
		// Quitamos todas las marcas anteriores;
		clearMarkers(null);
		//  
		var marker = new google.maps.Marker({
	  		position:new google.maps.LatLng(event.latLng.d,event.latLng.e),
	  		icon:'/img/ico-pushpin-mapa.png',
	  		map:map
	  	});				  	
	  	
	  	markers.push(marker);
		
		google.maps.event.addListener(marker,'click',function() {											
			if(infoWindow) infoWindow.close();
			infoWindow.setOptions({
		  		content:'<a id="showMap" onclick="javascript: getStores('+roundMe(event.latLng.d, 6)+', '+roundMe(event.latLng.e, 6)+')">Bucar los oxxos mas cercanos a este lugar</a>'
		  	});
	  		infoWindow.open(map,marker);
	  	});
  	});
  	
  	return false;
}

function getStores( lat, lng) {				
	$.get('/get-maps', { 'ltd':lat, 'lng':lng}, function( points ){
		if(points.error)
			alert('Ocurrio un error inesperado en la busqueda:'+points.message);
		else{
			$.each( points, function( index, value){
				var marker = new google.maps.Marker({
			  		position:new google.maps.LatLng(value.lat,value.lng),
			  		icon:'/img/img-0'+(index+1)+'.png',
			  		map: map
			  	});
		  		
		  		markers.push(marker);
		  		google.maps.event.addListener(marker,'click',function() {					
					if(infoWindow) infoWindow.close();
					infoWindow.setOptions({
						content:'Nombre: '+value.name+'<br /> Direccion:'+value.address+'<br /><a id="showMap" onclick="javascript: displayRoute('+roundMe(lat, 6)+', '+roundMe(lng, 6)+', '+roundMe(value.lat, 6)+', '+roundMe(value.lng, 6)+' );">Ruta hasta aqui</a>'
					});
			  		infoWindow.open(map,marker);
			  	});
			});
		}
	});
}

function displayRoute( ltdI, lngI, ltdF, lngF ){
    var start = new google.maps.LatLng(ltdI, lngI);
    var end = new google.maps.LatLng(ltdF, lngF);			    
    directionsDisplay.setOptions({'draggable': false});
    var directionsService = new google.maps.DirectionsService();
    var request = {
        origin : start,
        destination : end,
        travelMode : google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setOptions({
            	'directions':response,
            	'suppressMarkers':true,
            	'map':map
            });
        }
    });
}
function roundMe(n, sig) {
	if (n === 0) return 0;
	var mult = Math.pow(10, sig);
	return Math.round(n * mult) / mult;
}

function clearMarkers(){				
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(null);
	}
	markers = [];
	if(directionsDisplay) directionsDisplay.setMap(null);
	
}
