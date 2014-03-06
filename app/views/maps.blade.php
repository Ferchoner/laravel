<style>
	.mapa{ height: 600px; }
</style>
{{ Form::open(array('method' => 'post', 'id'=>'maps-form', 'class' => 'custom')) }}
	<fieldset>
	  <legend>Busca tu dirección</legend>
			 <div class="row collapse">
				<div class="small-2 column">
					{{ Form::label(null, 'Direcci&oacute;n', array('class' => 'prefix')) }}
				</div>
				<div class="small-5 column left">
					{{ Form::text('address', null, array('id'=>'address', 'placeholder'=>'Dirección...')) }}
				</div>
				<div class="small-2 column">
					{{ Form::submit('Buscar', array('class'=>'secondary button postfix', 'id'=>'searchStores', 'onClick'=>'event.preventDefault(); getStoresByAddress()')) }}
				</div>
				<div class="large-2 column">
					<a id="aHome" class="right small secondary button">Regresar</a>
				</div>
			</div>
	</fieldset>
{{ Form::close() }}
<div id="map-canvas" class="large-12 column mapa"></div>
<script src="/js/maps.js" type="text/javascript" charset="utf-8"></script>