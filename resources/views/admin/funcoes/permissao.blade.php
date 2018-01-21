@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Permissões para {{$papel->name}}</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb" href="{{ route('admin.funcoes') }}" >Lista de Funções</a>
		        <a class="breadcrumb" href="{{ route('admin.funcoes') }}" >Lista de Permissões</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<form action="{{route('admin.funcoes.permissao.salvar', $papel->id)}}" method="post">
				{{csrf_field()}}
				<div class="input-field">
					<select name="permissao_id">
						@foreach($permissao as $valor)
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
						<th>Permissão</th>
						<th>Descrição</th>
						<th>Açao</th>
					</tr>
				</thead>
				<tbody>
				@foreach($papel->permissoes as $permissao)
					<tr>
						<td>{{ $permissao->nome }}</td>
						<td>{{ $permissao->descricao }}</td>
						<td> 
							<a href="javascript: if(confirm('Remover essa permissao?')){ window.location.href= '{{ route('admin.funcoes.permissao.remover' ,[$papel->id, $permissao->id ])}}'}" class="btn red">Remover</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection