@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Páginas</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb">Lista de Páginas</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Título</th>
						<th>Descrição</th>
						<th>Tipo</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($paginas as $pagina)
					<tr>
						<td>{{ $pagina->id }}</td>
						<td>{{ $pagina->titulo }}</td>
						<td>{{ $pagina->descricao }}</td>
						<td>{{ $pagina->tipo }}</td>
						<td> 
							<td> 
							<a href="{{ route('admin.paginas.editar', $pagina->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
						</td>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection