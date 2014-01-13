<div class="large-12 column">
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
</div>