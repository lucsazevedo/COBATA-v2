@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row"> 
		<h3>Nossos Catálogos</h3>
		<div class="divider"></div>
		<div class="row">
			@foreach($catalogos as $catalogo)
				<div class="col s12 m4">
					<img src="{{asset($catalogo->imagem)}}" class="responsive-img" width="250">
				</div>
				<div class="col s12 m8">
					<h4>{{$catalogo->descricao}}</h4>
					<p>{{$catalogo->sobre}}</p>
					<p>Download do Catálogo: <a href="{{$catalogo->link}}">{{$catalogo->link}}</a></p>
				</div>
			@endforeach
		</div>
    </div>
</div>
@endsection
