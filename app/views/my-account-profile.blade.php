@if(!Auth::check())
	<li>
		<a id="signup" class="small button secondary">Registrate!</a>
	</li>
	<li>
		<a id="login" class="small button secondary">Ingresar</a>
	</li>
@else
	<li>
		<a id="logout" class="small button secondary">Salir</a>
	</li>
@endif