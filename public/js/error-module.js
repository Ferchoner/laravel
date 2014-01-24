var showError = function(idElement, errorMessage) {
	if (!$('#' + idElement).parent().hasClass('error')) {
		$('#' + idElement).parent().addClass('error').append('<small class="error" style="margin-top: 0px; display:none">' + errorMessage + '</small>');
		$('#' + idElement + '+ small.error').slideDown('1000');
	} else {
		$('#' + idElement + '+ small.error').slideUp('400', function() {
			$(this).html(errorMessage).slideDown('400');
		});
	}
};

var showErrorInput = function(nameElement, errorMessage) {
	if (!$('select[name=' + nameElement + ']').parent().hasClass('error')) {
		$('select[name=' + nameElement + ']').parent().addClass('error').append('<small class="error" style="margin-top: 0px; display:none">' + errorMessage + '</small>');
		$('select[name=' + nameElement + ']').siblings().last().slideDown('1000');
	} else {
		$('select[name=' + nameElement + ']').siblings().last().slideUp('400', function(){
			$(this).html(errorMessage).slideDown('400');
		});
	}
};

var showErrorName = function(selector, nameElement) {
	if (!$(selector + '[name=' + nameElement + ']').parent().hasClass('error'))
		$(selector + '[name=' + nameElement + ']').parent().addClass('error');
};

var showErrorLabel = function(nameElement, errorMessage) {
	if (!$('label[for=' + nameElement + ']').parent().hasClass('error')) {
		$('label[for=' + nameElement + ']').parent().addClass('error').append('<small class="error" style="margin-top: -2px; display:none">' + errorMessage + '</small>');
		$('label[for=' + nameElement + ']').siblings().last().slideDown('1000');
	} else {
		$('label[for=' + nameElement + ']').siblings().last().slideUp('400', function(){
			$(this).html(errorMessage).slideDown('400');
		});
	}
};

var hideError = function(idElement) {
	if ($('#' + idElement).parent().hasClass('error')) {
		$('#' + idElement + '+ small.error').slideUp('1000', function() {
			$('#' + idElement).parent().removeClass('error').children().last().remove();
		});
	}
};

var hideErrorInput = function(selector, nameElement) {
	if ($(selector + '[name=' + nameElement + ']').parent().hasClass('error')) {
		$(selector + '[name=' + nameElement + ']').siblings().last().slideUp('1000', function() {
			$(selector + '[name=' + nameElement + ']').parent().removeClass('error').children().last().remove();
		});
	}
};

var hideErrorFor = function(selector, nameElement) {
	if ($(selector + '[for=' + nameElement + ']').parent().hasClass('error')) {
		$(selector + '[for=' + nameElement + ']').siblings().last().slideUp('1000', function() {
			$(selector + '[for=' + nameElement + ']').parent().removeClass('error').children().last().remove();
		});
	}
};

var siExiste = function(element) {
	if (element.lenght > 0)
		return true;
	return false;
};
