$(document).ready(function() {

	$('#login').click(function(e) {
		$('#content').load('/login', function() {
			loadLoginJS();
		});		
	});

	$('#signup').click(function(e) {
		$('#content').load('/registro', function() {
			$(document).foundation();
			loadRegistroJS();
		});
	});

});

var loadLoginJS = function() {
	
	$('#login-form').unbind();
	$('#login-form').on('submit', function(e) {
		e.preventDefaul();
					
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

var loadRegistroJS = function() {
	
	$('#registro-form').unbind();
	$('#registro-form').on('submit', function( event ){
		event.preventDefault();
				
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
					
				}
			});	
		}		
		return false;		
	});

	$('input').unbind();
	$('input').change(function(e) {		
		if ($(this).attr('name') == 'sexo')
			hideErrorInput('input', $(this).attr('name'));			
		else
			hideError($(this).attr('id'));
	});

	$('select').unbind();
	$('select').change(function(e) {		
		hideErrorInput('select', $(this).attr('name'));
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
	
	$('select[name=anio], select[name=mes], select[name=dia]').unbind();
	$('select[name=anio], select[name=mes], select[name=dia]').change( function(){
		hideErrorFor('label', 'FechaNac');
	});
	
	$('select[name=estado]').change( function( e ){		
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