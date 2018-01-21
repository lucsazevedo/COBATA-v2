@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Funções para {{$usuario->name}}</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de Usuários</a>
		        <a class="breadcrumb">Lista de Funções</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{route('admin.usuarios.papel.salvar', $usuario->id)}}" method="post">
				{{csrf_field()}}
				<div class="input-field">
					<select name="papel_id">
						@foreach($papel as $valor)
							<option value="{{$valor->id}}">{{$valor->nome}}</option>
						@endforeach
					</select>
				</div>
				<button class="btn teal darken-3">Adicionar</button>
			</form>
			
		</div>

		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Papel</th>
						<th>Descrição</th>
						<th>Açao</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuario->papeis as $papel)
					<tr>
						<td>{{ $papel->nome }}</td>
						<td>{{ $papel->descricao }}</td>
						<td> 
							<a href="javascript: if(confirm('Remover esse papel?')){ window.location.href= '{{ route('admin.usuarios.papel.remover' ,[$usuario->id, $papel->id])}}'}" class="btn red">Remover</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection