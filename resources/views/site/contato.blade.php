@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row section"> 
		<h3> Contato</h3>
		<div class="divider"></div>
		<div class="row section">
			<div class="col s12 m7">
				@if(isset($pagina->mapa))
					<div class="video-container">
						{!! $pagina->mapa !!}
					</div>
				@else
					<img class="responsive-img" src="{{asset($pagina->imagem)}}">
				@endif
			</div>
			<div class="col s12 m5">
				<h4>{{ $pagina->titulo }}</h4>
				<blockquote>{{ $pagina->descricao }}</blockquote>
				<form class="col s12" action="{{route('site.contato.enviar')}}" method="post">
					{{ csrf_field() }}
			      <div class="row">
			        <div class="input-field col s12">
			          <i class="material-icons prefix icon-blue">account_circle</i>
			          <input id="icon_prefix" type="text" class="validate" name=nome>
			          <label for="icon_prefix">Nome</label>
			        </div>
			        <div class="input-field col s12">
			          <i class="material-icons prefix icon-blue">mail</i>
			          <input id="email" type="tel" class="validate" name="email">
			          <label for="email">E-mail</label>
			        </div>
			        <div class="input-field col s12">
			          <i class="material-icons prefix icon-blue">message</i>
			          <textarea id="textarea1" class="materialize-textarea" name="mensagem"></textarea>
			          <label for="textarea1">Mensagem</label>
			        </div>
			        <div class="input-field col s12">
			          <button class="btn blue"><i class="material-icons left">send</i>Enviar</button>
			      	</div>
			    </form>
			</div>
		</div>
    </div>
</div>
@endsection
