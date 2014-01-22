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
		e.preventDefault();
		$('input').each(function() {
			// Validacion para inputs vacios, si quieres un input opcional solo agregale la clase canBN y se lo saltara
			if ($(this).val() == '' && !$(this).hasClass('canBN')) {
				showError($(this).attr('id'), 'Este campo es obligatorio');
			};
		});
	
		// Validaciones hechas, falta codigo para hacer la llamada AJAX al controlador de login
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
		if (hayErrores) {
			e.preventDefault();
			return false;
		}
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
	
	$('select[name=estado]').change( function( e ){		
		$.post('/get-cities', {'id': $('select[name=estado]').val()}, function( data ){
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