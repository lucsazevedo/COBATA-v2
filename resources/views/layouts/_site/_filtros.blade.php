<div class="row">
	<form action="{{route('site.busca')}}">
		<div class="input-field col s6 m4">
			<select name="setor_id">
				<option value="todos">Todos</option>
				@foreach($setores as $setor)
					<option value="{{ $setor->id }}"  {{ (isset($busca['setor_id']) && $busca['setor_id'] == $setor->id ? 'selected' : '' ) }}> {{ $setor->descricao }}</option>
				@endforeach;
			</select>
			<label>Categoria</label>
		</div>

		<div class="input-field col s6 m4">
			<select name="marca_id">
				<option value="todos">Todos</option>
			@foreach($marcas as $marca)
				<option value="{{ $marca->id }}"  {{ (isset($busca['marca_id']) && $busca['marca_id'] == $marca->id ? 'selected' : '' ) }}> {{ $marca->descricao }}</option>
			@endforeach;
		</select>
		<label>Marca</label>	
		</div>
		<div class="input-field col s6 m4">
			<select name="cidade_id">
				<option value="todos">Todos</option>
			@foreach($cidades as $cidade)
				<option value="{{$cidade->id}}"  {{ (isset($busca['cidade_id']) && $busca['cidade_id'] == $cidade->id ? 'selected' : '' ) }}> {{$cidade->nome}} / {{$cidade->sigla_estado}}</option>
			@endforeach;
		</select>
		<label>Onde Encontrar</label>
		</div>
		<div class="input-field col s6 m4">
         	<input type="text" name="nome" class="validate" value="{{ isset($busca['nome'])? $busca['nome'] : '' }}">
			<label>Nome</label>
        </div>

		<button class="btn deep-orange darken-1 right">Filtrar</button>
	</form>
</div>