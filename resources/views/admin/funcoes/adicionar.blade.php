@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Adicionar Funções</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.funcoes') }}" class="breadcrumb">Lista de Funções</a>
		        <a class="breadcrumb">Adicionar Funções</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.funcoes.salvar') }}" method="post">
				{{ csrf_field() }}
				@include('admin.funcoes._form')

				<button class="btn blue"> Adicionar</button>
			</form>
		</div>
	</div>
@endsection