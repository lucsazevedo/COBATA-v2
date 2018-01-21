@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Adicionar Galerias</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.produtos') }}" class="breadcrumb">Lista de Imovel</a>
		        <a href="{{ route('admin.galerias', $produto->id) }}" class="breadcrumb">Lista de Galerias</a>
		        <a class="breadcrumb">Adicionar Galeria</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.galerias.salvar', $produto->id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				@include('admin.galerias._form')

				<button class="btn blue"> Adicionar</button>
			</form>
		</div>
	</div>
@endsection