@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Editar Depoimento</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.depoimentos') }}" class="breadcrumb">Lista de Usuários</a>
		        <a class="breadcrumb">Editar Depoimento</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.depoimentos.atualizar', $depoimento->id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put"> 
				@include('admin.depoimentos._form')

				<button class="btn blue">Atualizar</button>
			</form>
		</div>
	</div>
@endsection