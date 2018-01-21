@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Adicionar Catálogo</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.catalogos') }}" class="breadcrumb">Lista de Catálogo</a>
		        <a class="breadcrumb">Adicionar Catálogo</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.catalogos.salvar') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				@include('admin.catalogos._form')

				<button class="btn blue"> Adicionar</button>
			</form>
		</div>
	</div>
@endsection