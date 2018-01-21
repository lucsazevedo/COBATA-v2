<div class="input-field">
	<input type="text" name="name" class="validate" value="{{ isset($usuario->name)? $usuario->name : '' }}">
	<label>Nome</label>
</div>
<div class="input-field">
	<input type="text" name="email" class="validate" value="{{ isset($usuario->email)? $usuario->email : '' }}">
	<label>E-Mail</label>
</div>

<div class="input-field">
	<input type="text" name="CNPJ" class="validate" value="{{ isset($usuario->CNPJ)? $usuario->CNPJ : '' }}">
	<label>CNPJ</label>
</div>

<div class="input-field">
	<input type="text" name="RazaoSocial" class="validate" value="{{ isset($usuario->RazaoSocial)? $usuario->RazaoSocial : '' }}">
	<label>Razão Social</label>
</div>


<div class="input-field">
	<input type="password" name="password" class="validate">
	<label>Senha</label>
</div>

