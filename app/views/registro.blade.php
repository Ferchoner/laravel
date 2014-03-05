<div class="large-12 column">
	{{ Form::open(array('method' => 'post', 'files' => true, 'id'=>'registro-form', 'class' => 'custom')) }}
	<fieldset>
		<legend>
			Pagina de Registro
		</legend>
		<div class="row">
			<div class="small-12 column">
				<div class="row collapse error_container" style="display: none">
					<div class="small-4 push-4 column">
						{{ Form::label('', '', array('class' => 'center error')) }}
					</div>	
				</div>
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label('nombre', 'Nombre', array('class' => 'small prefix')) }}
					</div>
					<div class="small-4 column">
						{{ Form::text('nombre', ( Auth::check() ? Auth::user()->nombre : Input::old('nombre') ), array('id'=>'nombre', 'placeholder'=>'Nombre...')) }}
					</div>
					<div class="small-2 column">
						{{ Form::label('apellidos', 'Apellidos', array('class' => 'prefix')) }}
					</div>
					<div class="small-4 column">
						{{ Form::text('apellido', ( Auth::check() ? Auth::user()->apellido : Input::old('apellido') ), array('id'=>'apellido', 'placeholder'=>'Apellidos...')) }}
					</div>
				</div>
				<div class="row">
					<div class="small-12 column">
						<div class="small-1 column">
							{{ Form::label('sexo', 'Sexo', array('class' => 'right inline')) }}
						</div>
						<div class="small-11 column">
							<label for="radio">{{ Form::radio('sexo', 'M', ( Auth::check() ? Auth::user()->sexo == 'M' : Input::old('sexo') == 'M' ), array( 'style'=>'visibility: hidden;' ) ) }}<span class="custom radio"></span>&#32;Masculino</label>
							<label for="radio">{{ Form::radio('sexo', 'F', ( Auth::check() ? Auth::user()->sexo == 'F' : Input::old('sexo') == 'F' ), array( 'style'=>'visibility: hidden;' ) ) }}<span class="custom radio"></span>&#32;Femenino</label>
						</div>
					</div>
				</div>
				<div class="row collapse">
					<div class="small-3 column">						
						{{ Form::label('FechaNac','Fecha de Nacimiento', array('class' => 'prefix')) }}
					</div>
					<div class="small-2 column">						
						{{ Form::select('dia', $arrayDays, ( Auth::check() ? $diaUser : Input::old('dia') ), array('id' => 'customDropdown') ) }}
					</div>
					<div class="small-2 column">
						{{ Form::select('mes', $arrayMonths, ( Auth::check() ? $mesUser : Input::old('mes') ), array('id' => 'customDropdown') ) }}						
					</div>
					<div class="small-2 column left">
						{{ Form::select('anio', $arrayYears, ( Auth::check() ? $anioUser : Input::old('anio') ), array('id' => 'customDropdown') ) }}						
					</div>
				</div>
				<div class="row collapse">
					<div class="small-3 column left">
						{{ Form::label(null, 'Correo Electr&oacute;nico', array('class' => 'prefix') ) }}
					</div>
					<div class="small-4 column left">
						{{ Form::email('email', Auth::check() ? Auth::user()->email : Input::old('email'), array('id'=>'email', 'placeholder'=>'example@gmail.com')) }}
					</div>
				</div>
				<div class="row collapse">
					<div class="small-3 column left">
						{{ Form::label(null, 'Contrase&ntilde;a', array('class' => 'prefix')) }}
					</div>
					<div class="small-4 column left">
						{{ Form::password('password', array('id'=>'password')) }}
					</div>
				</div>
				@if ( Auth::check() )
					<div class="row collapse">
						<div class="small-3 column left">
							{{ Form::label(null, 'Nueva Contrase&ntilde;a', array('class' => 'prefix')) }}
						</div>
						<div class="small-4 column left">
							{{ Form::password('new_password', array('id'=>'new_password')) }}
						</div>
					</div>
				@endif
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label(null, 'Direcci&oacute;n', array('class' => 'prefix')) }}
					</div>
					<div class="small-5 column left">
						{{ Form::text('physical_address', Auth::check() ? Auth::user()->address : Input::old('physical_address'), array('id'=>'physical_address', 'placeholder'=>'Dirección...')) }}
					</div>
				</div>
				{{-- Comentamos hasta tener una solucion para poder subir archivos a traves de AJAX
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label(null, 'Fotografia', array('class' => 'prefix')) }}
					</div>
					<div class="small-5 column left">
						{{ Form::file('file', array('id'=>'foto', 'class' => 'tiny button secondary canBN', )) }}
					</div>
				</div> 
				--}}
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label(null, 'Estado', array('class' => 'prefix')) }}
					</div>
					<div class="small-5 column left">
						{{ Form::select( 'estado', $estados, ( Auth::check() ? Auth::user()->estado : Input::old('estado') ), array('id' => 'customDropdown') ) }}
					</div>
				</div>
				<!-- Listado de ciudades vacio hasta que se seleccione un estado-->
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label(null, 'Ciudad', array('class' => 'prefix')) }}
					</div>
					<div class="small-5 column left">
						{{ Form::select( 'ciudad', array( 'ciudad'=>'Ciudad'), null, array('id' => 'customDropdown') ) }}
					</div>
				</div>
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label(null, 'Cancelar', array('class'=>'small button', 'id'=>'aHome')) }}
					</div>
					<div class="small-2 column">
						{{ Form::submit('Aceptar', array('class'=>'small button right', 'id'=>'aceptarRegistro')) }}
					</div>					
				</div>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
	<script>	
		@if ( Auth::check() )
			$('select[name=estado]').change();
			setTimeout( function(){
			    $('select[name=ciudad]').val('{{Auth::user()->ciudad}}');
			    $('select[name=ciudad]').change();
			}, 400);
		@endif
	</script>
</div>