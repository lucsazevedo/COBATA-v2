@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Slides</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb">Lista de Slides</a>
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
						<th>Título</th>
						<th>Descrição</th>
						<th>Ordem</th>
						<th>Publicado</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($slides as $slide)
					<tr>
						<td>{{ $slide->id }}</td>
						<td> <img width="200" src="{{ asset($slide->imagem) }}"></td>
						<td>{{ $slide->titulo }}</td>
						<td>{{ $slide->descricao }}</td>
						<td>{{ $slide->ordem }}</td>
						<td>{{ ($slide->publicado == 'nao') ? 'Não' : 'Sim' }}</td>
						<td> 
							<a href="{{ route('admin.slides.editar', $slide->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
							<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('admin.slides.deletar' ,$slide->id )}}'}" class="btn red darken-4"> <i class="material-icons">delete</i></a>
						</td>

					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn teal darken-3" href="{{ route('admin.slides.adicionar')}}"> Adicionar</a>
			</div>
	</div>
@endsection