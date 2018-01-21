@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Editar Galeria</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.produtos') }}" class="breadcrumb">Lista de Produtos</a>
		        <a href="{{ route('admin.galerias', $produto->id) }}" class="breadcrumb">Lista de Galerias</a>
		        <a class="breadcrumb">Editar Galeria</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.galerias.atualizar', $galeria->id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put"> 
				@include('admin.galerias._form')

				<button class="btn blue">Atualizar</button>
			</form>
		</div>
	</div>
@endsection