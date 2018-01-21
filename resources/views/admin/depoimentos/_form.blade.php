<div class="input-field">
	<input type="text" name="nome" class="validate" value="{{ isset($depoimento->nome)? $depoimento->nome : '' }}">
	<label>Nome</label>
</div>

<div class="input-field">
	<textarea name="depoimento" class="materialize-textarea">
		{{ isset($depoimento->depoimento)? $depoimento->depoimento : '' }}
	</textarea>
	<label>Depoimento</label>
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
		@if(isset($depoimento->imagem))
			<img width="120" src="{{asset($depoimento->imagem)}}">
		@endif
	</div>
</div>
