<div class="input-field">
	<input type="text" name="nome" class="validate" value="{{ isset($produto->nome)? $produto->nome : '' }}">
	<label>Nome</label>
</div>

<div class="input-field">
	<input type="text" name="descricao" class="validate" value="{{ isset($produto->descricao)? $produto->descricao : '' }}">
	<label>Descrição</label>
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
		@if(isset($produto->imagem))
			<img width="120" src="{{asset($produto->imagem)}}">
		@endif
	</div>
</div>
 
 <div class="input-field">
	<select name="marca_id">
		@foreach($marcas as $marca)
			<option value="{{ $marca->id }}"  {{ (isset($produto->marca_id) && $produto->marca_id == $marca->id ? 'selected' : '' ) }}> {{ $marca->descricao }}</option>
		@endforeach;
	</select>
	<label>Marca</label>
</div>

 <div class="input-field">
	<select name="setor_id">
		@foreach($setores as $setor)
			<option value="{{ $setor->id }}"  {{ (isset($produto->setor_id) && $produto->setor_id == $setor->id ? 'selected' : '' ) }}> {{ $setor->descricao }}</option>
		@endforeach;
	</select>
	<label>Setor</label>
</div>

<div class="input-field">
	<input type="text" name="medida" class="validate" value="{{ isset($produto->medida)? $produto->medida : '' }}">
	<label>Unidade</label>
</div>

<div class="input-field">
	<input type="text" name="quantidade" class="validate" value="{{ isset($produto->quantidade)? $produto->quantidade : '' }}">
	<label>Quantidade</label>
</div>

<div class="input-field">
	<input type="text" name="preco" class="validate" value="{{ isset($produto->preco)? $produto->preco : '' }}">
	<label>Preço</label>
</div>

<div class="input-field">
	<select name="publicar" id="">
		<option value="nao" {{(isset($produto->publicar) && $produto->publicar == 'nao' ? 'selected' : '')}}>Não</option>
		<option value="sim" {{(isset($produto->publicar) && $produto->publicar == 'sim' ? 'selected' : '')}}>Sim</option>
	</select>
	<label>Publicado</label>
</div>


<div class="input-field">
	<input disabled value="" id="disabled" type="text" class="validate">
    <label for="disabled">Cidades Disponíveis</label>
</div>
	@foreach($cidades as $cidade)
			<p>
				<input type="checkbox" name="ckCidades[]" class="filled-in" id="{{$cidade->id}}"  value="{{$cidade->id}}" {{isset($cidadesMarcadas) && (in_array($cidade->id, $cidadesMarcadas)) ? 'checked' : ''}}  />
	  			<label for="{{$cidade->id}}">{{$cidade->nome}} \ {{$cidade->sigla_estado}}</label>
	  		</p>
	@endforeach
<br>	<br><br>