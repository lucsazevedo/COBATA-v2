@extends('layouts.site')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Editar Endereço</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('site.home') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('enderecos.index') }}" class="breadcrumb">Lista de Endereços</a>
		        <a class="breadcrumb">Editar Endereço</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('enderecos.atualizar', $endereco->id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put"> 
				@include('enderecos._form')

				<button class="btn blue">Atualizar</button>
			</form>
		</div>
	</div>
@endsection