@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Adicionar CAtegorias</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.categorias') }}" class="breadcrumb">Lista de CAtegorias</a>
		        <a class="breadcrumb">Adicionar Categoria</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.categorias.salvar') }}" method="post">
				{{ csrf_field() }}
				@include('admin.categorias._form')

				<button class="btn blue"> Adicionar</button>
			</form>
		</div>
	</div>
@endsection