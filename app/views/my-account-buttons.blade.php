@if(!Auth::check())
	<li>
		<a id="signup" class="small button secondary">Registrate!</a>
	</li>
	<li>
		<a id="login" class="small button secondary">Ingresar</a>
	</li>
@else
	<li>
		<a id="my-account" class="small button secondary">Mi Cuenta</a>
	</li>
	<li>
		<a id="showMap" class="small button secondary" href="/maps">Ver Mapa</a>
	</li>
	<li>
		<a id="logout" class="small button secondary">Salir</a>
	</li>
@endif