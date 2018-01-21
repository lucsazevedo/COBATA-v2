@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Funções</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb">Lista de Funções</a>
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
						<th>Descrição</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($funcoes as $papel)
					<tr>
						<td>{{ $papel->id }}</td>
						<td>{{ $papel->nome }}</td>
						<td>{{ $papel->descricao }}</td>
						<td>
							<a href="{{ route('admin.funcoes.editar', $papel->id) }}" class="btn  blue darken-4"> <i class="material-icons">person_add</i></a>
							@if($papel->nome <> 'admin' and $papel->nome <> 'cliente') 

								<a href="{{ route('admin.funcoes.editar', $papel->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
								<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('admin.funcoes.deletar' ,$papel->id )}}'}" class="btn red darken-4"> <i class="material-icons">delete</i></a>
							@else
								<a href="{{ route('admin.funcoes.editar', $papel->id) }}" class="btn teal darken-3 disabled"> <i class="material-icons">edit</i></a>
								<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('admin.funcoes.deletar' ,$papel->id )}}'}" class="btn red darken-4 disabled"> <i class="material-icons">delete</i></a>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn teal darken-3" href="{{ route('admin.funcoes.adicionar') }}"> Adicionar</a>
			</div>
	</div>
@endsection