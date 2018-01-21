@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Depoimentos</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb">Lista de Depoimentos</a>
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
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($depoimentos as $depoimento)
					<tr>
						<td>{{ $depoimento->id }}</td>
						<td>{{ $depoimento->nome }}</td>
						<td> 
							<a href="{{ route('admin.depoimentos.editar', $depoimento->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
							<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('admin.depoimentos.deletar' ,$depoimento->id )}}'}" class="btn red darken-4"> <i class="material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn teal darken-3" href="{{ route('admin.depoimentos.adicionar') }}"> Adicionar</a>
			</div>
	</div>
@endsection