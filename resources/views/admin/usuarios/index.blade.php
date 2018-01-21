@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Usuários</h4>
		<br>
		<div class="row ">
		  <nav>
		    <div class="nav-wrapper">
		      <div class="col s12 navegacao">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb">Lista de Usuários</a>
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
						<th>E-mail</th>
						<th>Açao</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->id }}</td>
						<td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						<td> 
							<a href="{{ route('admin.usuarios.papel', $usuario->id) }}" class="btn blue darken-4"> <i class="material-icons">settings</i></a>
							<a href="{{ route('admin.usuarios.editar', $usuario->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
							<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('admin.usuarios.deletar' ,$usuario->id )}}'}" class="btn red darken-4"> <i class="material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn teal darken-3" href="{{ route('admin.usuarios.adicionar') }}"> Adicionar</a>
			</div>
	</div>
@endsection