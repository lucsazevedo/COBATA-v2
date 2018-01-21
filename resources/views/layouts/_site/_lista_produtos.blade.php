<div class="row section">
	<h3 align="center">Produtos</h3>
	<div class="divider"></div>
	<br>
	@include('layouts._site._filtros')
</div>
<div class="row section">
@foreach($produtos as $produto)

	<div class="col s12 m3">
		<div class="card">
			<div class="card-image">
				<a href="{{route('site.produto', [$produto->id, str_slug($produto->titulo, '_')])}}"><img src="{{asset($produto->imagem)}}" alt="{{$produto->nome}}"></a>
			</div>
			<div class="card-content">
				<p><b class="deep-orange-text darken-1">{{$produto->nome}}</b></p>
				<p><b>{{$produto->quantidade}} {{$produto->medida}}</b></p>
				@if(!Auth::guest())
					<p>R${{ $produto->preco}}</p>
				@endif
			</div>
			<div class="card-action">
				<a href="{{route('site.produto', [$produto->id, str_slug($produto->titulo, '_')])}}">Ver Mais</a>
				<form id="carrinho">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{$produto->id}}">
					@if(!Auth::guest())
						<input type="submit" name="Comprar" class="btn blue" value="Comprar">
					@endif
				</form>
			</div>
		</div>
	</div>
@endforeach


</div>
	<div align="center" class="row">
		{{ $produtos->links() }}
</div>
