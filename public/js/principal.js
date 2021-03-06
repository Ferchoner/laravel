
var myCenter, directionsDisplay, map, infoWindow, markers = [], xhr;

$(document).ready(function() {
	myCenter = new google.maps.LatLng(19.702446, -101.192794);
	directionsDisplay = new google.maps.DirectionsRenderer();	
	infoWindow = new google.maps.InfoWindow();	
	myAccountButtonsActions();
});

function myAccountButtonsActions() {
	
	$('#login').click(function(e) {
		$('#content').load('/login', function() {
			loadLoginJS();
		});		
	});
	
	$('#logout').click(function(e) {
		$.post('/logout', function( data ){
			if (data.error){
				alert('Error inesperado: '+error.message);	
			}
			else{
				$('#content').append('<div id="temp" style="visible:hidden"></div>');
				$('#temp').load('/home #content', function() {
					contenido = $('#temp #content').children();
					$('#content').html(contenido);
				});
				$('#my_account_buttons').load('/my-account-actions', function(){
					$('div.error_container').first().children().children().html(data.message);
					$('div.error_container').first().slideDown(400);
					myAccountButtonsActions();
				});							
			}
		});
	});

	$('#my-account').click(function(e){
		$('#content').load('/my-account', function() {
			// Cargar contenidos en la pagina de mi cuenta :D
			loadMyAccountJS();
			$(document).foundation();
		});
	});
	
	$('#showMap').click(function(e){
		$('#content').load('/maps', function() {			
			loadMaps();
			$(document).foundation();
		});
	});
	
	$('#signup').click(function(e) {
		$('#content').load('/registro', function() {			
			loadRegistroJS();
			$(document).foundation();
		});
	});
};

function loadLoginJS() {
	
	$('#login-form').unbind();
	$('#login-form').on('submit', function( e ) {
		e.preventDefault();					
		hayErrores = false;
		$('input').each(function() {
			// Validacion para inputs vacios, si quieres un input opcional solo agregale la clase canBN y se lo saltara
			if ($(this).val() == '' && !$(this).hasClass('canBN')) {
				showError($(this).attr('id'), 'Este campo es obligatorio');
				hayErrores = true;
			};
		});		
		// Validaciones hechas, falta codigo para hacer la llamada AJAX al controlador de login
		if(!hayErrores){
			$.post('/authentication', $('#login-form').serialize(), function( data ){
				if( data.error ){
					$('div.error_container').children().children().html(data.message);
					$('div.error_container').slideDown(400);
				}
				else{
					$('#content').append('<div id="temp" style="visible:hidden"></div>');
					$('#my_account_buttons').load('/my-account-actions', function(){
						myAccountButtonsActions();
					});	
					$('#temp').load('/home #content', function() {
						contenido = $('#temp #content').children();
						$('#content').html(contenido);
						$('div.error_container').children().children().html('Bienvenido!');
						$('div.error_container').slideDown(400);
					});					
				}
			});
		}		
		return false;		
	});

	$('input').unbind();
	$('input').change(function(e) {		
		if ($(this).attr('id'))
			hideError($(this).attr('id'));
	});
	
	$('#aHome, .aHome').each( function(){
		$(this).unbind();
		$(this).click(function(e) {
			e.preventDefault();
			$('div.error_container').slideUp(400);
			$('#content').append('<div id="temp" style="visible:hidden"></div>');
			$('#temp').load('/home #content', function() {
				contenido = $('#temp #content').children();
				$('#content').html(contenido);
			});
		});
	});
};

function loadRegistroJS() {
	
	$('#registro-form').unbind();
	$('#registro-form').on('submit', function( event ){
		event.preventDefault();
		$('div.error_container').slideUp(400);
		var hayErrores = false;
		// Validacion para campos vacios en todos los inputs, si quieres un input opcional solo agregale la clase canBN y se lo saltara
		$('input').each(function() {
			if ($(this).val() == '' && !$(this).hasClass('canBN')) {
				showError($(this).attr('id'), 'Este campo es obligatorio');
				hayErrores = true;
			};
		});
		//Validacion para selects de sexo
		if ($('input[name=sexo]:checked').length <= 0) {
			showErrorName('input', 'sexo');
			hayErrores = true;
		};
		if( $('select[name="ciudad"]').val() == 'Ciudad' || $('select[name="ciudad"]').val() == '' || $('select[name="ciudad"]').val() == undefined ) {
			showErrorInput('ciudad', 'Este campo es obligatorio');
			hayErrores = true;
		}
		if( $('select[name="estado"]').val() == 'Estado' || $('select[name="estado"]').val() == '' || $('select[name="estado"]').val() == undefined ) {
			showErrorInput('estado', 'Este campo es obligatorio');
			hayErrores = true;
		}
		if( $('select[name="dia"]').val() == 'dia' || $('select[name="dia"]').val() == '' || $('select[name="dia"]').val() == undefined ||
			$('select[name="mes"]').val() == 'mes' || $('select[name="mes"]').val() == '' || $('select[name="mes"]').val() == undefined ||
			$('select[name="anio"]').val() == 'anio' || $('select[name="anio"]').val() == '' || $('select[name="anio"]').val() == undefined ) {
				showErrorLabel('FechaNac', 'La fecha es obligatoria');
				hayErrores = true;
		}
		if(!hayErrores){			
			$.post('/registrar', $('#registro-form').serialize(), function( data ){
				if( data.error ){
					$('div.error_container').children().children().html(data.message);
					$('div.error_container').slideDown(400);
				}
				else {
					$('#content').append('<div id="temp" style="visible:hidden"></div>');
					$('#temp').load('/home #content', function() {
						contenido = $('#temp #content').children();
						$('#content').html(contenido);
						$('div.error_container').children().children().html('Usuario creado con éxito!! :D');
						$('div.error_container').slideDown(400);
					});
				}
			});	
		}		
		return false;		
	});

	$('input').unbind();
	$('input').change(function(e) {
		$('div.error_container').slideUp(400);	
		if ($(this).attr('name') == 'sexo')
			hideErrorInput('input', $(this).attr('name'));			
		else
			hideError($(this).attr('id'));
	});

	$('select').unbind();
	$('select').change(function(e) {
		$('div.error_container').slideUp(400);
		hideErrorInput('select', $(this).attr('name'));
	});
	
	$('#aHome, .aHome').each( function(){
		$(this).unbind();
		$(this).click(function(e) {
			e.preventDefault();
			$('div.error_container').slideUp(400);
			$('#content').append('<div id="temp" style="visible:hidden"></div>');
			$('#temp').load('/home #content', function() {
				contenido = $('#temp #content').children();
				$('#content').html(contenido);
			});
		});
	});
	
	$('select[name=anio], select[name=mes], select[name=dia]').unbind();
	$('select[name=anio], select[name=mes], select[name=dia]').change( function(){
		$('div.error_container').slideUp(400);
		hideErrorFor('label', 'FechaNac');
	});
	
	$('select[name=estado]').change( function( e ){
		$('div.error_container').slideUp(400);		
		$.get('/get-cities', {'id': $('select[name=estado]').val()}, function( data ){
			options = '<option>Ciudad</option>';
			luOptions = '<li class="selected">Ciudad</li>';
			$.each( data, function( index, value){
				options += '<option value="'+value.id+'">'+value.nombre+'</option>';
				luOptions += '<li>'+value.nombre+'</li>';
			});
			$('select[name=ciudad]').html(options);
			$('select[name=ciudad]').siblings().children('a.current').html('Ciudad');
			$('select[name=ciudad]').siblings().children('ul').html(luOptions);
		});
	});
};


function loadMyAccountJS() {

    $('#registro-form').unbind().on('submit', function (event) {
        event.preventDefault();

        $('div.error_container').slideUp(400);
        var hayErrores = false;        
        if (!hayErrores) {
        	$.post('/actualizar', $('#registro-form').serialize(), function( data ){
				if( data.error ){
					$('div.error_container').first().children().children().html(data.message);
					$('div.error_container').first().slideDown(400);
				}
				else {
					$('div.error_container').first().children().children().html('Usuario Actualizado con exito!');
					$('div.error_container').first().slideDown();
					loadMyAccountJS();
        		}
        	});
        }
        return false;
    });

    $('input').unbind().change(function (e) {
        $('div.error_container').slideUp(400);
        if ($(this).attr('name') == 'sexo')
            hideErrorInput('input', $(this).attr('name'));
        else
            hideError($(this).attr('id'));
    });

    $('select').unbind().change(function (e) {
        $('div.error_container').slideUp(400);
        hideErrorInput('select', $(this).attr('name'));
    });

	$('#aHome, .aHome').each( function(){
		$(this).unbind();
		$(this).click(function(e) {
			e.preventDefault();
			$('div.error_container').slideUp(400);
			$('#content').append('<div id="temp" style="visible:hidden"></div>');
			$('#temp').load('/home #content', function() {
				contenido = $('#temp #content').children();
				$('#content').html(contenido);
			});
		});
	});

    $('select[name=anio], select[name=mes], select[name=dia]').unbind().change(function () {
        $('div.error_container').slideUp(400);
        hideErrorFor('label', 'FechaNac');
    });

    $('select[name=estado]').change(function (e) {
        $('div.error_container').slideUp(400);
        $.get('/get-cities', {'id': $('select[name=estado]').val()}, function (data) {
            options = '<option>Ciudad</option>';
            luOptions = '<li class="selected">Ciudad</li>';
            $.each(data, function(index, value) {
                options += '<option value="' + value.id + '">' + value.nombre + '</option>';
                luOptions += '<li>' + value.nombre + '</li>';
            });
            $('select[name=ciudad]').html(options);
			$('select[name=ciudad]').siblings().children('a.current').html('Ciudad');
			$('select[name=ciudad]').siblings().children('ul').html(luOptions);
        });
    });
}

function loadMaps(){		
	initialize();
		
	
	$('#aHome, .aHome').each( function(){
		$(this).unbind();
		$(this).click(function(e) {
			e.preventDefault();
			$('div.error_container').slideUp(400);
			$('#content').append('<div id="temp" style="visible:hidden"></div>');
			$('#temp').load('/home #content', function() {
				contenido = $('#temp #content').children();
				$('#content').html(contenido);
			});
		});
	});
	
	$('input[name=address]').keyup( function( event ){
		$('.resultados').slideUp( 300 );
		address = $('input[name=address]').val();
		if( address.length > 4 ) {
			geocoder = new google.maps.Geocoder();
			geocoder.geocode({'address':address}, function(results, status){
				lat = status === google.maps.GeocoderStatus.OK ? results[0].geometry.location.lat() : 19.702773;
				lng = status === google.maps.GeocoderStatus.OK ? results[0].geometry.location.lng() : -101.192395;										
				getStores( lat, lng, address, true);
			});	
		}
	});
}