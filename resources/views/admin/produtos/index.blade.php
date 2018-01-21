@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Produtos</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb">Lista de Produtos</a>
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
						<th>Setor</th>
						<th>Cidades Disponíveis</th>
						<th>Valor</th>
						<th>Imagem</th>
						<th>Publicado</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($produtos as $produto)
					<tr>
						<td>{{ $produto->id }}</td>
						<td>{{ $produto->nome }}</td>
						<td>{{ $produto->setor->descricao }}</td>
						<td>@foreach($produto->cidades as $cidades) 
									<span class="badge">{{$cidades->nome}}</span>
							@endforeach </td>
						<td>R$ {{ $produto->preco }}</td>
						<td> <img width="100" src="{{ asset($produto->imagem) }}"></td>
						<td>{{ ($produto->publicar == 'nao') ? 'Não' : 'Sim' }}</td>
						<td> 
							<a href="{{ route('admin.galerias', $produto->id) }}" class="btn blue darken-4"> <i class="material-icons">photo_library</i></a>
							<a href="{{ route('admin.produtos.editar', $produto->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
							<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('admin.produtos.deletar' ,$produto->id )}}'}" class="btn red darken-4"> <i class="material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn blue" href="{{ route('admin.produtos.adicionar') }}"> Adicionar</a>
			</div>
	</div>
@endsection