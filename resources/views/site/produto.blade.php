@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row section"> 
		<h3>Produto</h3>
		<div class="divider"></div>
		<div class="row section">
			<div class="col s12 m8">
				@if($produto->galeria->count())
				<div class="row">
					<div class="slider">
						<ul class="slides">
							@foreach($galeria as $imagem)
								<li>
									<img src="{{asset($imagem->imagem)}}" >
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				@else
				<img src="{{asset($produto->imagem)}}" class="responsive-img">
				@endif
				@if($produto->galeria->count())
				<div class="row" align="center">
					<button onclick="sliderPrev()" class="btn blue">
						Anterior
					</button>
					<button onclick="sliderNext()" class="btn blue">
						Próxima
					</button>
				</div>
				@endif
			</div>
			<div class="col s12 m4">
				<h4>{{$produto->nome}}</h4>
				
				<p> <b>Código</b> {{$produto->id}}</p> 
				@if(!Auth::guest())
					<p> <b>Preço</b> R$ {{$produto->preco}}</p> 
				@endif
				<p> <b>Unidade</b> {{$produto->medida}}{{$produto->quantidade}} </p> 
				<p> <b>Fabricante</b> {{$produto->marca->descricao}}</p> 
				<p><b>Disponivel Em: </b> 
					@foreach($produto->cidades as $cidades) 
							 <div class="chip"> {{$cidades->nome}} / {{$cidades->sigla_estado}}</div>
					@endforeach 
				</p>
				@if(!Auth::guest())
				<form id="carrinho">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{$produto->id}}">
					<input type="submit" name="Comprar" class="btn deep-orange darken-1" value="Comprar">
				</form>
				@endif
			</div>
		</div>
		<div class="row section">
			<h4>Descrição do Produto</h4>
			<p>
				{{$produto->descricao}}
			</p>
		</div>
    </div>

    <div class="row section">	
		<h5> Produtos Relacionados </h5>
		<div class="divider"></div>
		<div class="row section">
		@foreach($relacionados as $produto)
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
    </div>
</div>
@endsection
