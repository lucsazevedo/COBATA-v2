<h2>Compra do Site COBATA</h2>
<p>Nome: {{ Auth::user()->name }}</p>
<p>E-mail: {{ Auth::user()->email }}</p>
@forelse ($request as $pedido)
    <h5 class="col l6 s12 m6"> Pedido: {{ $pedido->id }} </h5>
    <h5 class="col l6 s12 m6"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
    <h5>Endereço de Entrega : {{$pedido->endereco->endereco}} Nº{{$pedido->endereco->numero}} {{$pedido->endereco->complemento}} - {{$pedido->endereco->bairro}} - {{$pedido->endereco->cidade}}/{{$pedido->endereco->estado}}</h5>
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Desconto</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @php
                $total_pedido = 0;

            @endphp
            @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                @php
                    $total_produto = $pedido_produto->valor - $pedido_produto->desconto;
                    $total_pedido += $total_produto;
                @endphp
                <tr>
                    <td>{{ $pedido_produto->produto->nome }}</td>
                    <td>R$ {{ number_format($pedido_produto->valor, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($pedido_produto->desconto, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td><strong>Total do pedido</strong></td>
                    <td>R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
@empty
    <h5 class="center">
        @if ($cancelados->count() > 0)
            Neste momento não há nenhuma compra valida.
        @else
            Você ainda não fez nenhuma compra.
        @endif
    </h5>
@endforelse