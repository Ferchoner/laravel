<div class="large-12 column">
<<<<<<< HEAD
	{{ Form::open(array('method' => 'post', 'files' => true, 'class' => 'custom')) }}
	<fieldset>
		<legend>
			Pagina de Registro
		</legend>
		<div class="row">
			<div class="small-12 column">
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label('nombre', 'Nombre', array('class' => 'small prefix')) }}
					</div>
					<div class="small-4 column">
						{{ Form::text('nombre', '', array('id'=>'nombre', 'placeholder'=>'Nombre...')) }}
					</div>
					<div class="small-2 column">
						{{ Form::label('apellidos', 'Apellidos', array('class' => 'prefix')) }}
					</div>
					<div class="small-4 column">
						{{ Form::text('apellido', '', array('id'=>'apellido', 'placeholder'=>'Apellidos...')) }}
					</div>
				</div>
				<div class="row">
					<div class="small-12 column">
						<div class="small-1 column">
							{{ Form::label('sexo', 'Sexo', array('class' => 'right inline')) }}
						</div>
						<div class="small-11 column">
							<label for="radio">{{ Form::radio('sexo', 'M', FALSE, array( 'style'=>'visibility: hidden;' ) ) }}<span class="custom radio"></span>&#32;Masculino</label>
							<label for="radio">{{ Form::radio('sexo', 'F', FALSE, array( 'style'=>'visibility: hidden;' ) ) }}<span class="custom radio"></span>&#32;Femenino</label>
						</div>
					</div>
				</div>
				<div class="row collapse">
					<div class="small-3 column">
						{{ Form::label(null,'Fecha de Nacimiento', array('class' => 'prefix')) }}
					</div>
					<div class="small-2 column">						
						{{ Form::select('dia', $arrayDays, array('id' => 'customDropdown') ) }}
					</div>
					<div class="small-2 column">
						{{ Form::select('mes', $arrayMonths, array('id' => 'customDropdown') ) }}						
					</div>
					<div class="small-2 column left">
						{{ Form::select('anio', $arrayYears, array('id' => 'customDropdown') ) }}						
					</div>
				</div>
				<div class="row collapse">
					<div class="small-3 column left">
						{{ Form::label(null, 'Correo Electr&oacute;nico', array('class' => 'prefix')) }}
					</div>
					<div class="small-4 column left">
						{{ Form::email('email', '', array('id'=>'email', 'placeholder'=>'example@gmail.com')) }}
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
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label(null, 'Direcci&oacute;n', array('class' => 'prefix')) }}
					</div>
					<div class="small-5 column left">
						{{ Form::text('physical_address', '', array('id'=>'physical_address', 'placeholder'=>'Dirección...')) }}
					</div>
				</div>
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label(null, 'Fotografia', array('class' => 'prefix')) }}
					</div>
					<div class="small-5 column left">
						{{ Form::file('file', array('id'=>'foto', 'class' => 'tiny button secondary canBN', )) }}
					</div>
				</div>
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label(null, 'Estado', array('class' => 'prefix')) }}
					</div>
					<div class="small-5 column left">
						<select id="customDropdown" name="estado">
							<option>Estado</option>
							{{-- @foreach ($estados as $id_estado => $estado)
							<option value="{{$id_estado}}">{{$estado}}</option>
							@endforeach --}}
						</select>
					</div>
				</div>
				<!-- Listado de ciudades vacio hasta que se seleccione un estado-->
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::label(null, 'Ciudad', array('class' => 'prefix')) }}
					</div>
					<div class="small-5 column left">
						<select id="customDropdown" name="ciudad">
							<option>Ciudad</option>
						</select>
					</div>
				</div>
				<div class="row collapse">
					<div class="small-2 column">
						{{ Form::submit('Atras', array('class'=>'small button', 'id'=>'aHome')) }}
					</div>
					<div class="small-2 column">
						{{ Form::submit('Aceptar', array('class'=>'small button right', 'id'=>'aceptarRegistro')) }}
					</div>
				</div>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
=======
  {{ Form::open(array('method' => 'post', 'files' => true, 'class' => 'custom')) }}
    <fieldset>
      <legend>Pagina de Registro</legend>
      <div class="row">
        <div class="small-12 column">
          <div class="row collapse">
            <div class="small-2 column">
              {{ Form::label('nombre', 'Nombre', array('class' => 'small prefix')) }}
            </div>
            <div class="small-4 column">
              <input type="text" id="nombre" name="nombre">
            </div>
            <div class="small-2 column">
              {{ Form::label('apellidos', 'Apellidos', array('class' => 'prefix')) }}
            </div>
            <div class="small-4 column">
              <input type="text" id="apellido" name="apellido">
            </div>
          </div>
          <div class="row">
            <div class="small-12 column">
              <div class="small-1 column">
                {{ Form::label('sexo', 'Sexo', array('class' => 'right inline')) }}
              </div>
              <div class="small-11 column">
                <label for="radio"><input name="sexo" type="radio" value="M" style="visibility: hidden"><span class="custom radio"></span>&#32;Masculino</label>
                <label for="radio"><input name="sexo" type="radio" value="F" style="visibility: hidden"><span class="custom radio"></span>&#32;Femenino</label>
              </div>
            </div>
          </div>
          <div class="row collapse">
            <div class="small-3 column">
              {{ Form::label(null,'Fecha de Nacimiento', array('class' => 'prefix')) }}
            </div>
            <div class="small-2 column">
              <select id="customDropdown" name="dia">
                <option>Dia</option>
                @for ($i=1; $i < 32; $i++)
                    <option value="<?= $i < 10 ? '0' . $i : $i ?>">{{$i}}</option>
                @endfor
              </select>
            </div>
            <div class="small-2 column">
              <select id="customDropdown" name="mes">
                <option>Mes</option>
                @for ($i=1; $i < 13; $i++) 
                    <option value="<?= $i < 10 ? '0' . $i : $i ?>">{{$i}}</option>
                @endfor
              </select>
            </div>
            <div class="small-2 column left">
              <select id="customDropdown" name="anio">
                <option value="anio">A&ntilde;o</option>
                @for ($i=2013; $i >= 1900; $i--)
                    echo '<option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
          </div>
          <div class="row collapse">
            <div class="small-3 column left">
              {{ Form::label(null, 'Correo Electr&oacute;nico', array('class' => 'prefix')) }}
            </div>
            <div class="small-4 column left">
              <input type="email" id="email" name="email">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-3 column left">
              {{ Form::label(null, 'Contrase&ntilde;a', array('class' => 'prefix')) }}
            </div>
            <div class="small-4 column left">
              <input type="password" id="password" name="password">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2 column">
              {{ Form::label(null, 'Direcci&oacute;n', array('class' => 'prefix')) }}
            </div>
            <div class="small-5 column left">
              <input type="text" id="physical_address" name="physical_address">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2 column">
              {{ Form::label(null, 'Fotografia', array('class' => 'prefix')) }}
            </div>
            <div class="small-5 column left">
              <input class="tiny button secondary canBN" type="file" id="foto" name="file" >
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2 column">
              {{ Form::label(null, 'Estado', array('class' => 'prefix')) }}
            </div>
            <div class="small-5 column left">
              <select id="customDropdown" name="estado">
                <option>Estado</option>
                  {{-- @foreach ($estados as $id_estado => $estado)
                    <option value="{{$id_estado}}">{{$estado}}</option>
                  @endforeach --}}
              </select>
            </div>
          </div>
          <!-- Listado de ciudades vacio hasta que se seleccione un estado-->
          <div class="row collapse">
            <div class="small-2 column">
              {{ Form::label(null, 'Ciudad', array('class' => 'prefix')) }}
            </div>
            <div class="small-5 column left">
              <select id="customDropdown" name="ciudad">
                <option>Ciudad</option>
              </select>
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2 column">
              {{ Form::submit('Atras', array('class'=>'small button secondary', 'id'=>'aHome')) }}
            </div>
            <div class="small-2 column">
              {{ Form::submit('Aceptar', array('class'=>'small button secondary right', 'id'=>'aceptarRegistro')) }}
            </div>
          </div>
        </div>
      </div>
    </fieldset>
  {{ Form::close() }}
>>>>>>> 9a69eed93f770f17c28c40763837db9dd18dbe21
</div>