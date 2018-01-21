@if(isset($slide->imagem))
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
		<img width="120" src="{{asset($slide->imagem)}}">
	</div>
</div>

<div class="input-field">
	<input type="text" name="titulo" class="validate" value="{{ isset($slide->titulo)? $slide->titulo : '' }}">
	<label>Título</label>
</div>

<div class="input-field">
	<input type="text" name="descricao" class="validate" value="{{ isset($slide->descricao)? $slide->descricao : '' }}">
	<label>Descrição</label>
</div>

<div class="input-field">
	<input type="text" name="link" class="validate" value="{{ isset($slide->link)? $slide->link : '' }}">
	<label>Link</label>
</div>

<div class="input-field">
	<select name="publicado" id="">
		<option value="nao" {{(isset($slide->publicado) && $slide->publicado == 'nao' ? 'selected' : '')}}>Não</option>
		<option value="sim" {{(isset($slide->publicado) && $slide->publicado == 'sim' ? 'selected' : '')}}>Sim</option>
	</select>
	<label>Publicado</label>
</div>

<div class="input-field">
	<select name="posicao_x" id="">
		<option value="center" {{(isset($slide->posicao_x) && $slide->posicao_x == 'center' ? 'selected' : '')}}>Meio</option>
		<option value="right" {{(isset($slide->posicao_x) && $slide->posicao_x == 'right' ? 'selected' : '')}}>Direita</option>
		<option value="left" {{(isset($slide->posicao_x) && $slide->posicao_x == 'left' ? 'selected' : '')}}>Esquerda</option>
	</select>
	<label>Posição</label>
</div>

<div class="input-field">
	<input type="text" name="ordem" class="validate" value="{{ isset($slide->ordem)? $slide->ordem : '' }}">
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