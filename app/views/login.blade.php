<div class="large-10 push-1 columns">
	{{ Form::open(array('id'=>'login-form')) }}
		<fieldset>
			<legend>
				Login
			</legend>
			<div class="row">
				<div class="small-12 column">
					<div class="row">
						<div class="small-2 column">
							{{ Form::label('right-label', 'Usuario', array('class' => 'right inline')) }}
						</div>
						<div class="small-10 column">
							{{ Form::text('usuario', '', array('id'=>'usuario', 'placeholder'=>'Usuario...')) }}
						</div>
					</div>

					<div class="row">
						<div class="small-2 column">
							{{ Form::label('right-label', 'Password', array('class' => 'right inline')) }}
						</div>
						<div class="small-10 column">
							{{ Form::password('pass', array('id'=>'password')) }}
						</div>
					</div>

					<div class="row">
						<div class="push-2 column">
							{{ Form::label(null, 'Atras', array('class'=>'small button', 'id'=>'aHome')) }}
							{{ Form::submit('Aceptar', array('class'=>'small button', 'id'=>'aceptarLogin')) }}
						</div>
					</div>

				</div>
			</div>
		</fieldset>
	{{ Form::close() }}
</div>