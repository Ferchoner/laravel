var address, map, markers = [], lists = '';

function getStoresByAddress(){	
	$('.mDropdown').slideUp( 300 );
	address = $('#address').val();
	if( address == '' || address.length < 4 ){
		$('div.mensajes').html('Dirección vacía o muy pequeña');
		$('div.mensajes').slideDown(400);
	}
	else{		
		geocoder = new google.maps.Geocoder();
		geocoder.geocode({'address':address}, function(results, status){			
			if( status === google.maps.GeocoderStatus.OK ){
				clearMarkers(null);
				
				var marker = new google.maps.Marker({
			  		position:new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng()),
			  		icon:'/img/ico-pushpin-mapa.png',
			  		map:map
			  	});
			  	markers.push(marker);
			  	
			  	getStores( results[0].geometry.location.lat(), results[0].geometry.location.lng(), address);
			}
			else{
				$('#errors').children('div.alert').html('No se pudo encontrar tu dirección');
				$('#errors').slideDown(500);
			}
		});		
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
	google.maps.event.addListener(map, 'click', function( event ) {
		// Quitamos todas las marcas anteriores;
		clearMarkers(null);
		
		var marker = new google.maps.Marker({
	  		position:event.latLng,
	  		icon:'/img/ico-pushpin-mapa.png',
	  		map:map
	  	});				  	
	  	
	  	markers.push(marker);
	  	
		google.maps.event.addListener(marker, 'click', function() {
			if(infoWindow) infoWindow.close();
			infoWindow.setOptions({
		  		content:'<a id="showMap" onclick="javascript: getStores('+roundMe(event.latLng.lat(), 6)+', '+roundMe(event.latLng.lng(), 6)+')">Bucar los oxxos mas cercanos a este lugar</a>'
		  	});
	  		infoWindow.open(map,marker);
	  	});
  	});
  	
  	return false;
}

function getStores( lat, lng, address, showList) {
	lists = '';
	if( xhr != null )
		xhr.abort();
	xhr = $.get('/get-maps', {'ltd':lat, 'lng':lng, 'address':address}, function( points ){
		if(points.error)
			alert('Ocurrio un error inesperado en la busqueda:'+points.message);
		else{
			$.each( points, function( index, value){
				if ( showList )
					lists += '<li><a onClick="event.preventDefault(); showStore('+roundMe(value.lat, 6)+', '+roundMe(value.lng, 6)+');">'+value.name+'</a></li>';
				else{
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
				}
			});
			if ( showList && points.length > 1 ) $('.mDropdown').html(lists).slideDown();
		}
	});
}

function showStore( lat, lng){
	// Quitamos todas las marcas anteriores;
	clearMarkers(null);
	//  
	var marker = new google.maps.Marker({
  		position:new google.maps.LatLng(lat, lng),
  		icon:'/img/ico-pushpin-mapa.png',
  		map:map
  	});
  	
  	markers.push(marker);
  	
  	getStores( lat, lng);
  	
	$('.mDropdown').slideUp(300, function(){
		$(this).html('');
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
