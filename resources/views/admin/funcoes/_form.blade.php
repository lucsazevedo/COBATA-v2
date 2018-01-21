<div class="input-field">
	<input type="text" name="nome" class="validate" value="{{ isset($funcao->nome)? $funcao->nome : '' }}">
	<label>Nome</label>
</div>


<div class="input-field">
	<input type="text" name="descricao" class="validate" value="{{ isset($funcao->descricao)? $funcao->descricao : '' }}">
	<label>Descrição</label>
</div>
