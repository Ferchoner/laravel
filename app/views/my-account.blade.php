<div class="row collapse error_container" style="display: none">
	<div class="small-4 push-4 column">
		{{ Form::label('', '', array('class' => 'center error')) }}
	</div>	
</div>

<h3>Hola {{ Auth::user()->nombre }} {{ Auth::user()->apellido}}</h3>

{{ $registroForm }}
