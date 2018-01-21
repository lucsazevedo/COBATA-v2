<div class="row section">
	<h3 align="center">Lançamentos</h3>
	<div class="divider"></div>
</div>
<div class="row section">

@foreach($lancamentos as $lancamento)

	<div class="col s12 m3">
		<div class="card">
			<div class="card-image">
				<a href="{{route('site.produto', [$lancamento->produto->id, str_slug($lancamento->produto->titulo, '_')])}}"><img src="{{asset($lancamento->produto->imagem)}}" alt="{{$lancamento->produto->nome}}"></a>
			</div>
			<div class="card-content">
				<p><b class="deep-orange-text darken-1">{{$lancamento->produto->nome}}</b></p>
				<p><b>{{$lancamento->produto->quantidade}} {{$lancamento->produto->medida}}</b></p>
				@if(!Auth::guest())
					<p>R${{ $lancamento->produto->preco}}</p>
				@endif
			</div>
			<div class="card-action">
				<a href="{{route('site.produto', [$lancamento->produto->id, str_slug($lancamento->produto->titulo, '_')])}}">Ver Mais</a>
				<form id="carrinho">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{$lancamento->produto->id}}">
					@if(!Auth::guest())
						<input type="submit" name="Comprar" class="btn blue" value="Comprar">
					@endif
				</form>
			</div>
		</div>
	</div>
@endforeach
</div>
