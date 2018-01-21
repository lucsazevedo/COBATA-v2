<div class="input-field">
	<input type="text" name="descricao" class="validate" value="{{ isset($marca->descricao)? $marca->descricao : '' }}">
	<label>Descrição</label>
</div>

<div class="input-field">
	<input type="text" name="sobre" class="validate" value="{{ isset($marca->sobre)? $marca->sobre : '' }}">
	<label>Sobre</label>
</div>


<div class="input-field">
	<input type="text" name="link" class="validate" value="{{ isset($marca->link)? $marca->link : '' }}">
	<label>Link</label>
</div>


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
		@if(isset($marca->imagem))
			<img width="120" src="{{asset($marca->imagem)}}">
		@endif
	</div>
</div>
