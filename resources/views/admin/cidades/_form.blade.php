<div class="input-field">
	<input type="text" name="nome" class="validate" value="{{ isset($cidade->nome)? $cidade->nome : '' }}">
	<label>Nome da Cidade</label>
</div>

<div class="input-field">
	<input type="text" name="estado" class="validate" value="{{ isset($cidade->estado)? $cidade->estado : '' }}">
	<label>Estado</label>
</div>

<div class="input-field">
	<input type="text" name="sigla_estado" class="validate" value="{{ isset($cidade->sigla_estado)? $cidade->sigla_estado : '' }}">
	<label>Sigla do Estado</label>
</div>
