@extends('layouts.app')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Lista de Lançamentos</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb">Lista de Lançamentos</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Produto</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($lancamentos as $lancamento)
					<tr>
						<td>{{ $lancamento->id }}</td>
						<td>{{ $lancamento->produto->nome }}</td>
						<td> 
							<td> 
							<a href="{{ route('admin.lancamentos.editar', $lancamento->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
							<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('admin.lancamentos.deletar' ,$lancamento->id )}}'}" class="btn red darken-4"> <i class="material-icons">delete</i></a>
						</td>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		@if(count($lancamentos) <4)
			<div class="row">
				<a class="btn teal darken-3" href="{{ route('admin.lancamentos.adicionar') }}"> Adicionar</a>
			</div>
		@endif
	</div>
	</div>
@endsection

