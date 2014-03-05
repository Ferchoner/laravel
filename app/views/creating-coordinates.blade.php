<!DOCTYPE html>
<html class=" js no-touch svg inlinesvg svgclippaths no-ie8compat" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<title>Creando Coordenadas</title>		
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOsVNVZT8bOI-qww5JfGfTUIeAsD-yVOE&sensor=true"></script>
		<script src="/js/jquery.min.js"></script>
	</head>
	<body id="coordenadas">
		<div id="resultados"></div>
		<script>
			var coordenadas = [];
			var geocoder;
			@foreach ($coordenadas as $index=>$coordinate)
			coordenadas['{{$index}}'] = {'id_store':{{$coordinate['id_store']}},'address1':'{{$coordinate['address1']}}','address2':'{{$coordinate['address2']}}','postcode':{{$coordinate['postcode']}},'city':'{{$coordinate['city']}}'};
			@endforeach
			$(document).ready(function(){
				$.each(coordenadas, function(index, value){
					setTimeout(function(){
						geocoder = new google.maps.Geocoder();
						geocoder.geocode({'address':value.address1+' '+value.address2+' '+value.postcode+' '+value.city}, function(resultgc, status){
							if( status == google.maps.GeocoderStatus.OK ){
								$.get('http://stagemarti.ia.com.mx/stores.php', {'ajax':'assign','id':value.id_store,'latitude':resultgc[0].geometry.location.lat(),'longitude':resultgc[0].geometry.location.lng()}, function(result){
									$('#resultados').append(result.message+'<br />');
								});	
							}
							else{
								$('#resultados').append('limite de peticiones a google maps alcanzado :(, espera un momento para hacer mas peticiones :D<br />');
							}
						});
					}, (index*5000) );
				});
			});
		</script>
	</body>
</html>
