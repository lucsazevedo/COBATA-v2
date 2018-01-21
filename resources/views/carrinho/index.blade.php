@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row section"> 
		<h3 align="center">Produtos no Carrinho</h3>
		<div class="divider"></div>
		@forelse($pedidos as $pedido)
			<h5 class="col l6 s12 m6">Pedido {{$pedido->id}}</h5>
			<h5 class="col l6 s12 m6">Criado em: {{$pedido->created_at->format('d/m/Y H:i')}}</h5>
			<table>
				<thead>
					<tr>
						<th></th>
						<th>Qtd</th>
						<th>Produto</th>
						<th>Valor Unit.</th>
						<th>Desconto(s)</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					@php
						$total_pedido = 0;
					@endphp

					@foreach($pedido->pedido_produtos as $pedido_produto)
						<tr>
							<td><img src="{{asset($pedido_produto->produto->imagem)}}" width="100" class="responsive" alt=""></td>
							<td class="center-align">
	                            <div class="center-align">
	                                <a class="col l4 m4 s4" href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )">
	                                    <i class="material-icons small">remove_circle_outline</i>
	                                </a>
	                                <span class="col l4 m4 s4"> {{ $pedido_produto->qtd }} </span>
	                                <a class="col l4 m4 s4" href="#" onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})">
	                                    <i class="material-icons small">add_circle_outline</i>
	                                </a>
	                            </div>
	                            <a href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">Retirar produto</a>
	                        </td>
							<td>{{$pedido_produto->produto->nome}}</td>
							<td>R$ {{$pedido_produto->produto->preco}}</td>
							<td>{{$pedido_produto->descontos}}</td>
							@php
								$total_produto = (float)$pedido_produto->valores - (float)$pedido_produto->descontos;
								$total_pedido += $total_produto;
							@endphp
							<td>R$ {{$total_produto}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="row">
				
				<form method="POST" action="{{ route('carrinho.concluir') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                    <div class="input-field col s12">
                    	<select name="endereco_id">
	                    	@foreach($enderecos as $endereco)
	                    		<option value="{{$endereco->id}}">{{$endereco->endereco}} - Nº {{$endereco->numero}}</option>
	                    	@endforeach
                   	 	</select>
                   	 	<label>Endereço de Entrega</label>
                   	</div>
                    <a href="{{route('site.home')}}" class="btn-large tooltipped col l4 m4 s4 offset-l2 offset-s2 offset-m2" data-position="top" data-delay="50" data-tooltip="Voltar a página inicial para continuar comprando?">Continuar Comprando</a>
                    <button type="submit" class="btn-large blue col offset-l1 offset-s1 offset-m1 l5 s5 m5 tooltipped" data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                        Concluir compra
                    </button>   
                </form>
			</div>

		@empty
			<h5>Não há nenhum pedido no carrinho</h5>
		@endforelse
    </div>
</div>
<form id="form-remover-produto" method="POST" action="{{ route('carrinho.remover') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="hidden" name="pedido_id">
    <input type="hidden" name="produto_id">
    <input type="hidden" name="item">
</form>
<form id="form-adicionar-produto" method="POST" action="{{ route('carrinho.adicionar') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id">
</form>

@endsection

