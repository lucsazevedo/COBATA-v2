@extends('layouts.site')

@section('content')
	<div class="container">
		<h4 class="grey-text text-darken-3">Meus Endereços</h4>
		<div class="row">
		  <nav>
		    <div class="nav-wrapper navegacao">
		      <div class="col s12">
		        <a href="{{ route('site.home') }}" class="breadcrumb">Início</a>
		        <a class="breadcrumb">Meus Endereços</a>
		      </div>
		    </div>
		  </nav>
		</div>
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Endereço</th>
						<th>Nº</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($enderecos as $endereco)
					<tr>
						<td>{{ $endereco->id }}</td>
						<td>{{ $endereco->endereco }}</td>
						<td>{{ $endereco->numero }}</td>
						<td>{{ $endereco->bairro }}</td>
						<td>{{ $endereco->cidade }}</td>
						<td>{{ $endereco->sigla_estado }}</td>
						<td> 
							<a href="{{ route('enderecos.editar', $endereco->id) }}" class="btn teal darken-3"> <i class="material-icons">edit</i></a>
							<a href="javascript: if(confirm('Deletar esse registro?')){ window.location.href= '{{ route('enderecos.deletar' ,$endereco->id )}}'}" class="btn red darken-4"> <i class="material-icons">delete</i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
				<a class="btn teal darken-3" href="{{ route('enderecos.adicionar') }}"> Adicionar</a>
			</div>
	</div>
@endsection