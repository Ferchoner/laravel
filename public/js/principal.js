$(document).ready(function() {
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
	
	// $('#showMap').click(function(e){
		// $('#content').load('/maps', function() {			
			// loadMaps();
			// initialize();
		// });
	// });
	
	$('#signup').click(function(e) {
		$('#content').load('/registro', function() {
			$(document).foundation();
			loadRegistroJS();
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

	$('#aHome').unbind();
	$('#aHome').click(function(e) {
		e.preventDefault();
		$('#content').append('<div id="temp" style="visible:hidden"></div>');
		$('#temp').load('/home #content', function() {
			contenido = $('#temp #content').children();
			$('#content').html(contenido);
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

	$('#aHome').unbind();
	$('#aHome').click(function(e) {
		e.preventDefault();
		$('div.error_container').slideUp(400);
		$('#content').append('<div id="temp" style="visible:hidden"></div>');
		$('#temp').load('/home #content', function() {
			contenido = $('#temp #content').children();
			$('#content').html(contenido);
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
        // Validacion para campos vacios en todos los inputs, si quieres un input opcional solo agregale la clase canBN y se lo saltara
        $('input').each(function () {
            if ($(this).val() == '' && !$(this).hasClass('canBN')) {
                showError($(this).attr('id'), 'Este campo es obligatorio');
                hayErrores = true;
            }
            ;
        });
        //Validacion para selects de sexo
        if ($('input[name=sexo]:checked').length <= 0) {
            showErrorName('input', 'sexo');
            hayErrores = true;
        }
        var selectCiudad = $('select[name="ciudad"]'), selectEstado = $('select[name="estado"]');
        if (selectCiudad.val() == 'Ciudad' || selectCiudad.val() == '' || selectCiudad.val() == undefined) {
            showErrorInput('ciudad', 'Este campo es obligatorio');
            hayErrores = true;
        }
        if (selectEstado.val() == 'Estado' || selectEstado.val() == '' || selectEstado.val() == undefined) {
            showErrorInput('estado', 'Este campo es obligatorio');
            hayErrores = true;
        }
        var selectDia = $('select[name="dia"]'), selectMes = $('select[name="mes"]'), selectAnio = $('select[name="anio"]');
        if (selectDia.val() == 'dia' || selectDia.val() == '' || selectDia.val() == undefined ||
            selectMes.val() == 'mes' || selectMes.val() == '' || selectMes.val() == undefined ||
            selectAnio.val() == 'anio' || selectAnio.val() == '' || selectAnio.val() == undefined) {
            showErrorLabel('FechaNac', 'La fecha es obligatoria');
            hayErrores = true;
        }
        if (hayErrores) {
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

    $('#aHome').unbind().click(function (e) {
        e.preventDefault();
        $('div.error_container').slideUp(400);
        $('#content').append('<div id="temp" style="visible:hidden"></div>');
        $('#temp').load('/home #content', function () {
            contenido = $('#temp #content').children();
            $('#content').html(contenido);
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
            $.each(data, function (index, value) {
                options += '<option value="' + value.id + '">' + value.nombre + '</option>';
                luOptions += '<li>' + value.nombre + '</li>';
            });
            $('select[name=ciudad]').html(options).siblings().children('a.current').html('Ciudad').siblings().children('ul').html(luOptions);
        });
    });
}

function loadMaps(){		
	
}