@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row"> 
		<h3>Nossas Marcas</h3>
		<div class="divider"></div>
		<div class="row">
			@foreach($marcas as $marca)
				<div class="col s12 m4">
					<img src="{{asset($marca->imagem)}}" class="responsive-img" width="250">
				</div>
				<div class="col s12 m8">
					<h4>{{$marca->descricao}}</h4>
					<p>{{$marca->sobre}}</p>
					<p>Conheça mais a empresa em: <a href="{{$marca->link}}">{{$marca->link}}</a></p>
				</div>
			@endforeach
		</div>
    </div>
</div>
@endsection
