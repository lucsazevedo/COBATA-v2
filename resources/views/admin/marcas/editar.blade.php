@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Editar Marca</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.marcas') }}" class="breadcrumb">Lista de Usuários</a>
		        <a class="breadcrumb">Editar Marca</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.marcas.atualizar', $marca->id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put"> 
				@include('admin.marcas._form')

				<button class="btn blue">Atualizar</button>
			</form>
		</div>
	</div>
@endsection