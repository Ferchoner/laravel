<div class="large-10 push-1 columns">
	{{ Form::open() }}
		<fieldset>
			<legend>
				Login
			</legend>
			<div class="row">
				<div class="small-12 column">

					<div class="row">
						<div class="small-2 column">
							<label for="right-label" class="right inline">Usuario</label>
						</div>
						<div class="small-10 column">
							<input type="text" id="usuario" name="usuario">
						</div>
					</div>

					<div class="row">
						<div class="small-2 column">
							<label for="right-label" class="right inline">Password</label>
						</div>
						<div class="small-10 column">
							<input type="password" id="password" name="pass">
						</div>
					</div>

					<div class="row">
						<div class="push-2 column">
							<a id="aHome" class="small button secondary">Regresar</a>
							<a id="aceptarLogin" class="small button secondary" >Aceptar</a>
						</div>
					</div>

				</div>
			</div>
		</fieldset>
	{{ Form::close() }}
</div>