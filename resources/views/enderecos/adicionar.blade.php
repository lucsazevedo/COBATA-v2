@extends('layouts.site')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Adicionar Endereço</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('site.home') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('enderecos.index') }}" class="breadcrumb">Lista de Endereços</a>
		        <a class="breadcrumb">Adicionar Endereço</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('enderecos.salvar') }}" method="post">
				{{ csrf_field() }}
				@include('enderecos._form')

				<button class="btn blue"> Adicionar</button>
			</form>
		</div>
	</div>
@endsection