@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Adicionar Usuário</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de Usuários</a>
		        <a class="breadcrumb">Adicionar Usuário</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.usuarios.salvar') }}" method="post">
				{{ csrf_field() }}
				@include('admin.usuarios._form')

				<button class="btn blue"> Adicionar</button>
			</form>
		</div>
	</div>
@endsection