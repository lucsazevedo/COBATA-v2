<div class="input-field">
	<input type="text" onblur="pesquisacep(this.value);" name="cep" class="validate" value="{{ isset($endereco->cep)? $endereco->cep : '' }}">
	<label>CEP</label>
</div>

<div class="input-field">
	<input type="text" name="endereco" id="rua" class="validate" value="{{ isset($endereco->endereco)? $endereco->endereco : '' }}">
	<label>Endereço</label>
</div>

<div class="input-field">
	<input type="text" name="numero" class="validate" value="{{ isset($endereco->numero)? $endereco->numero : '' }}">
	<label>Nº</label>
</div>

<div class="input-field">
	<input type="text" name="complemento" class="validate" value="{{ isset($endereco->complemento)? $endereco->complemento : '' }}">
	<label>Complemento</label>
</div>

<div class="input-field">
	<input type="text" name="bairro" id="bairro" class="validate" value="{{ isset($endereco->bairro)? $endereco->bairro : '' }}">
	<label>Bairro</label>
</div>

<div class="input-field">
	<input type="text" name="cidade" id="cidade" class="validate" value="{{ isset($endereco->cidade)? $endereco->cidade : '' }}">
	<label>Cidade</label>
</div>

<div class="input-field">
	<input type="text" name="estado" id="estado" class="validate" value="{{ isset($endereco->estado)? $endereco->estado : '' }}">
	<label>Estado</label>
</div>