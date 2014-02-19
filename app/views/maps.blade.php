<!DOCTYPE html>
<html>
	<head>
		<title>Asynchronous Loading</title>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<style>
			html, body, #map-canvas {
				height: 100%;
				margin: 0px;
				padding: 0px
			}
			a{
				text-decoration: underline;
				cursor: pointer;
			}
			a:hover{
				text-decoration: none;
			}
		</style>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOsVNVZT8bOI-qww5JfGfTUIeAsD-yVOE&sensor=false"></script>
		<script>
			var myCenter = new google.maps.LatLng(19.7047528,-101.1648662);
			var map;
			var infowindow;
			function initialize()
			{
				var mapProp = {
			  		center:myCenter,
					zoom:16,
			  		mapTypeId:google.maps.MapTypeId.ROADMAP
				};
				
				map = new google.maps.Map(document.getElementById("map-canvas"),mapProp);
				
				var marker = new google.maps.Marker({
			  		position:myCenter,
			  		icon:'/img/cuadro-localizador.png'
			  	});
				
				marker.setMap(map);
				
				infowindow = new google.maps.InfoWindow({
				  		content:'<a id="showMap" onclick="javascript: displayRoute();">Ruta hasta Chelalá</a>'
		  		});
				
				google.maps.event.addListener(marker,'click',function() {					
					infowindow.close();
			  		infowindow.open(map,marker);
			  	});
			  	
				google.maps.event.addListener(map,'click',function( event ) {					
					console.log(roundMe(event.latLng.d, 6));
					console.log(roundMe(event.latLng.e, 6));
			  	});
			  	
			  	return false;
			}
			
			function displayRoute() {

			    var start = myCenter;
			    var end = new google.maps.LatLng(19.7208378,-101.2158834);
				var markers = new google.maps.Marker({
			  		icon:'/img/cuadro-localizador.png'
			  	});
			    var directionsDisplay = new google.maps.DirectionsRenderer();
			    directionsDisplay.setOptions({
			    	'markerOptions' : markers, 
			    	'draggable': false});
			    var directionsService = new google.maps.DirectionsService();			    
			    
			    directionsDisplay.setMap(map);
			
			    var request = {
			        origin : start,
			        destination : end,
			        travelMode : google.maps.TravelMode.DRIVING
			    };
			    directionsService.route(request, function(response, status) {
			        if (status == google.maps.DirectionsStatus.OK) {			        	
			            directionsDisplay.setDirections(response);	
			        }
			    });
			}
			function roundMe(n, sig) {
				if (n === 0) return 0;
				var mult = Math.pow(10, sig);
				return Math.round(n * mult) / mult;
			}
		</script>
	</head>
	<body>
		<a id="showMap" onclick="javascript: initialize();">Mostrar Mapa</a>
		<div id="map-canvas"></div>
		
	</body>
</html>