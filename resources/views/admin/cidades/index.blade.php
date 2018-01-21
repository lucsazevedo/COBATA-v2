@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Cidades</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb">Lista de Cidades</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Estado</th>
						<th>Sigla Estado</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($cidades as $cidade)
					<tr>
						<td>{{ $cidade->id }}</td>
						<td>{{ $cidade->nome }}</td>
						<td>{{ $cidade->estado }}</td>
						<td>{{ $cidade->sigla_estado }}</td>
						<td> 
							<a href="{{ route('admin.cidades.editar', $cidade->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
							<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('admin.cidades.deletar' ,$cidade->id )}}'}" class="btn red darken-4"> <i class="material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn teal darken-3" href="{{ route('admin.cidades.adicionar') }}"> Adicionar</a>
			</div>
	</div>
@endsection