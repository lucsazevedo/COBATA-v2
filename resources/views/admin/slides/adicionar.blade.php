@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Adicionar Slides</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.slides')}}" class="breadcrumb">Lista de Slides</a>
		        <a class="breadcrumb">Adicionar Slide</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.slides.salvar') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				@include('admin.slides._form')

				<button class="btn blue"> Adicionar</button>
			</form>
		</div>
	</div>
@endsection