@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row section"> 
		<h3> Sobre</h3>
		<div class="divider"></div>
		<div class="row section">
			<div class="col s12 m6">
			@if(isset($pagina->mapa))
				<div class="video-container">
					{!! $pagina->mapa !!}
				</div>
			@else
				<img class="responsive-img" src="{{asset($pagina->imagem)}}">
			@endif
			</div>
			<div class="col s12 m6">
				<h4>{{$pagina->titulo}}</h4>
				<blockquote>
					{{$pagina->descricao}}
				</blockquote>
				<p>{{$pagina->texto}}</p>

				<p>
					@if(!empty($pagina->facebook))
						<a href="{{$pagina->facebook}}" target="_blank"><span class="fa fa-facebook-official fa-3x" aria-hidden="true"></span></a>
					@endif

					@if(!empty($pagina->instagram))
						<a href="{{$pagina->instagram}}" target="_blank">
							<span class="instagram">
						  		<span class="fa fa-instagram fa-3x"></span>
							</span>
						</a>
					@endif
				</p>
			</div>
		</div><br>
    </div>

    <h4 class="center">Depoimentos</h4>
    <div class="divider"></div>
    <div class="carousel carousel-slider grey lighten-4" data-indicators="true">
		@foreach($depoimentos as $depoimento)
		    <div class="carousel-item grey lighten-4 black-text" href="#one!">
		      <h4 class="center black-text darken-4">{{$depoimento->nome}}</h4>
			      <div class="card-panel grey lighten-4">
		          <div class="row valign-wrapper">
		            <div class="col s2">
		              <img src="{{asset($depoimento->imagem)}}" alt="" class="circle responsive-img"> 
		            </div>
		            <div class="col s10 black-text darken-4">
		              <span>
		                 <i class="material-icons" style="transform: rotatey(180deg);">format_quote</i>
		                 {{$depoimento->depoimento}}
		                 <i class="material-icons">format_quote</i>
		              </span>
		            </div>
		          </div>
		        </div>
		    </div>
		@endforeach
  </div>
  <br>
</div>
@endsection
