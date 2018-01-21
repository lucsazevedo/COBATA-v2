@if(isset($galeria->imagem))
<div class="row">
	<div class="file-field input-field col m6 s12">
		<div class="btn">
			<span>Imagem</span>
			<input type="file" name="imagem">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate">
		</div>
	</div>
	<div class="col m6 s12">
		<img width="120" src="{{asset($galeria->imagem)}}">
	</div>
</div>

<div class="input-field">
	<input type="text" name="ordem" class="validate" value="{{ isset($galeria->ordem)? $galeria->ordem : '' }}">
	<label>Ordem</label>
</div>

@else

<div class="row">
	<div class="file-field input-field col m12 s12">
		<div class="btn">
			<span>Upload de Imagens</span>
			<input type="file" multiple name="imagens[]">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate">
		</div>
	</div>
</div>

@endif