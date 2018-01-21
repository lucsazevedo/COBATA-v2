 <div class="input-field">
	<select name="produto_id">
		@foreach($produtos as $produto)
			<option value="{{ $produto->id }}"  {{ (isset($produto->produto_id) && $produto->produto_id == $produto->id ? 'selected' : '' ) }}> {{ $produto->descricao }}</option>
		@endforeach;
	</select>
	<label>Produto</label>
</div>