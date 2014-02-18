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
			
			function initialize()
			{
				var mapProp = {
			  		center:myCenter,
					zoom:16,
			  		mapTypeId:google.maps.MapTypeId.ROADMAP
				};
				
				var map = new google.maps.Map(document.getElementById("map-canvas"),mapProp);
				
				var marker = new google.maps.Marker({
			  		position:myCenter,
			  		icon:'/img/cuadro-localizador.png'
			  	});
				
				marker.setMap(map);
				
				var infowindow = new google.maps.InfoWindow({
				  		content:'<a id="showMap" onclick="javascript: displayRoute(); void(0);">Mostrar Mapa</a>'
		  		});
				
				google.maps.event.addListener(marker,'click',function() {					
					infowindow.close();
			  		infowindow.open(map,marker);
			  	});
			  	
			  	return false;
			}
			
			function displayRoute() {

			    var start = new google.maps.LatLng(28.694004, 77.110291);
			    var end = new google.maps.LatLng(28.72082, 77.107241);
			
			    var directionsDisplay = new google.maps.DirectionsRenderer();
			    directionsDisplay.setMap(map); // map should be already initialized.
			
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
		</script>
	</head>
	<body>
		<a id="showMap" onclick="javascript: initialize(); void(0);">Mostrar Mapa</a>
		<div id="map-canvas"></div>
		
	</body>
</html>