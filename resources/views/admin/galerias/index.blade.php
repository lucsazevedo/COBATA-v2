@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Galerias</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.produtos') }}" class="breadcrumb">Lista de Produtos</a>
		        <a class="breadcrumb">Lista de Galerias</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Imagem</th>
						<th>Ordem</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($galerias as $galeria)
					<tr>
						<td>{{ $galeria->id }}</td>
						<td> <img width="200" src="{{ asset($galeria->imagem) }}"></td>
						<td>{{ $galeria->ordem }}</td>
						<td> 
							<a href="{{ route('admin.galerias.editar', $galeria->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
							<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('admin.galerias.deletar' ,$galeria->id )}}'}" class="btn red darken-4"> <i class="material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn teal darken-3" href="{{ route('admin.galerias.adicionar', $produto->id) }}"> Adicionar</a>
			</div>
	</div>
@endsection