<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;
use App\Pagina;
use App\Enderecos;

class CarrinhoController extends Controller
{
   function __construct()
   {
   		$this->middleware('auth');
   }

   public function index()
   {
   		$pedidos = Pedido::where('status','=','RE')->where('user_id','=', Auth::id())->get();
        $enderecos = Enderecos::where('user_id','=', Auth::id())->get();
   		return view('carrinho.index', compact('pedidos','enderecos'));
       }

   public function adicionar()
   {
   		$this->middleware('VerifyCsrfToken');
   		$req = Request();
         $idproduto = $req->input('id');
         $produto = Produto::find($idproduto);
   		
   		if(empty($produto->id))
   		{
   			 \Session::flash('mensagem', ['msg'=> 'Produto não encontrado nessa loja', 'class'=> 'deep-orange white-text']);
   			  return redirect()->route('carrinho.index');
   		}

   		$idusuario = Auth::id();
   		$idpedido = Pedido::consultaId([
   			'user_id' => $idusuario,
   			'status' =>'RE'
   		]);

   		if(empty($idpedido)){
   			$pedido_novo = Pedido::create([
   				'user_id'=> $idusuario,
   				'status' => 'RE'
   			]);

   			$idpedido = $pedido_novo->id;
   		}

         $precoProduto = (float)$produto->preco;
   		PedidoProduto::create([
   			'pedido_id' => $idpedido,
   			'produto_id' => $idproduto,
   			'valor' => $precoProduto,
   			'status' => 'RE'
   		]);

   		/*\Session::flash('mensagem', ['msg'=> 'Produto adicionado no carrinho com sucesso!', 'class'=> 'green white-text']);*/
   		//return redirect()->route('carrinho.index');
         //return redirect()->back();
         return response()->json(['return' => 'some data']);
   }

   public function remover()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido           = $req->input('pedido_id');
        $idproduto          = $req->input('produto_id');
       $remove_apenas_item = (boolean)$req->input('item');
        $idusuario          = Auth::id();

        $idpedido = Pedido::consultaId([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservada
            ]);

        if( empty($idpedido) ) {
            \Session::flash('mensagem', ['msg'=> 'Produto não encontrado!', 'class'=> 'red white-text']);
         return redirect()->route('carrinho.index');
        }

        $where_produto = [
            'pedido_id'  => $idpedido,
            'produto_id' => $idproduto
        ];

        $produto = PedidoProduto::where($where_produto)->orderBy('id', 'desc')->first();
        if( empty($produto->id) ) {
           \Session::flash('mensagem', ['msg'=> 'Produto não encontrado!', 'class'=> 'red white-text']);
          return redirect()->route('carrinho.index');
        }

        if( $remove_apenas_item ) {
            $where_produto['id'] = $produto->id;
        }
        PedidoProduto::where($where_produto)->delete();

        $check_pedido = PedidoProduto::where([
            'pedido_id' => $produto->pedido_id
            ])->exists();

        if( !$check_pedido ) {
            Pedido::where([
                'id' => $produto->pedido_id
                ])->delete();
        }
         \Session::flash('mensagem', ['msg'=> 'Produto removido do carrinho com sucesso!', 'class'=> 'green white-text']);
         
        return redirect()->route('carrinho.index');
    }

    public function concluir(Request $request)
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $dados =  $request->all();
        $idpedido   = $req->input('pedido_id');
        $idendereco = $dados['endereco_id'];
        
        $idusuario  = Auth::id();

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservada
            ])->exists();

        if( !$check_pedido ) {
            \Session::flash('mensagem', ['msg'=> 'Pedido não encontrado!', 'class'=> 'red white-text']);
            return redirect()->route('carrinho.index');
        }

        $check_produtos = PedidoProduto::where([
            'pedido_id' => $idpedido
            ])->exists();
        if(!$check_produtos) {
            \Session::flash('mensagem', ['msg'=> 'Produto dos pedidos não encontrado', 'class'=> 'red white-text']);
            return redirect()->route('carrinho.index');
        }

        PedidoProduto::where([
            'pedido_id' => $idpedido
            ])->update([
                'status' => 'PA'
            ]);
        Pedido::where([
                'id' => $idpedido
            ])->update([
                'status' => 'PA',
                'enderecos_id' => $idendereco
            ]);

        $pagina = Pagina::where('tipo', '=', 'contato')->first();
        $email = $pagina->email;
        $compra = Pedido::where(['id' => $idpedido])->get();
        \Mail::send('emails.compra', ['request'=>$compra], function($m) use ($compra, $email){
            $m->from(Auth::user()->email, Auth::user()->name);
            $m->replyTo(Auth::user()->email, Auth::user()->name);
            $m->to($email, 'Contato do Site COBATA');
            $m->subject("Confirmação de Compra");

        });

       \Session::flash('mensagem', ['msg'=> 'Compra concluída com sucesso', 'class'=> 'green white-text']);
            
        return redirect()->route('carrinho.compras');
    }

    public function compras()
    {

        $compras = Pedido::where([
            'status'  => 'PA',
            'user_id' => Auth::id()
            ])->orderBy('created_at', 'desc')->get();

        $cancelados = Pedido::where([
            'status'  => 'CA',
            'user_id' => Auth::id()
            ])->orderBy('updated_at', 'desc')->get();

        return view('carrinho.compras', compact('compras', 'cancelados'));

    }

    public function cancelar()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido       = $req->input('pedido_id');
        $idspedido_prod = $req->input('id');
        $idusuario      = Auth::id();

        if( empty($idspedido_prod) ) {
            \Session::flash('mensagem', ['msg'=> 'Nenhum item selecionado para cancelamento!', 'class'=> 'red white-text']);
            return redirect()->route('carrinho.compras');
        }

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'PA' // Pago
            ])->exists();

        if( !$check_pedido ) {
            \Session::flash('mensagem', ['msg'=> 'Pedido não encontrado para cancelamento!', 'class'=> 'red white-text']);
             return redirect()->route('carrinho.compras');
        }

        $check_produtos = PedidoProduto::where([
                'pedido_id' => $idpedido,
                'status'    => 'PA'
            ])->whereIn('id', $idspedido_prod)->exists();

        if( !$check_produtos ) {
            \Session::flash('mensagem', ['msg'=> 'Produtos do pedido não encontrados!', 'class'=> 'red white-text']);
            return redirect()->route('carrinho.compras');
        }

        PedidoProduto::where([
                'pedido_id' => $idpedido,
                'status'    => 'PA'
            ])->whereIn('id', $idspedido_prod)->update([
                'status' => 'CA'
            ]);

        $check_pedido_cancel = PedidoProduto::where([
                'pedido_id' => $idpedido,
                'status'    => 'PA'
            ])->exists();

        if( !$check_pedido_cancel ) {
            Pedido::where([
                'id' => $idpedido
            ])->update([
                'status' => 'CA'
            ]);
            \Session::flash('mensagem', ['msg'=> 'Compra cancelada com sucesso!', 'class'=> 'green white-text']);

        } else {
            \Session::flash('mensagem', ['msg'=> 'Item(ns) da compra cancelado(s) com sucesso!', 'class'=> 'green white-text']);
        }

        return redirect()->route('carrinho.compras');
    }

    public function desconto()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idpedido  = $req->input('pedido_id');
        $cupom     = $req->input('cupom');
        $idusuario = Auth::id();

        if( empty($cupom) ) {
            $req->session()->flash('mensagem-falha', 'Cupom inválido!');
            return redirect()->route('carrinho.index');
        }

        $cupom = CupomDesconto::where([
            'localizador' => $cupom,
            'ativo'       => 'S'
            ])->where('dthr_validade', '>', date('Y-m-d H:i:s'))->first();

        if( empty($cupom->id) ) {
            $req->session()->flash('mensagem-falha', 'Cupom de desconto não encontrado!');
            return redirect()->route('carrinho.index');
        }

        $check_pedido = Pedido::where([
            'id'      => $idpedido,
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservado
            ])->exists();

        if( !$check_pedido ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado para validação!');
            return redirect()->route('carrinho.index');
        }

        $pedido_produtos = PedidoProduto::where([
                'pedido_id' => $idpedido,
                'status'    => 'RE'
            ])->get();

        if( empty($pedido_produtos) ) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('carrinho.index');
        }

        $aplicou_desconto = false;
        foreach ($pedido_produtos as $pedido_produto) {

            switch ($cupom->modo_desconto) {
                case 'porc':
                    $valor_desconto = ( $pedido_produto->valor * $cupom->desconto ) / 100;
                    break;

                default:
                    $valor_desconto = $cupom->desconto;
                    break;
            }

            $valor_desconto = ($valor_desconto > $pedido_produto->valor) ? $pedido_produto->valor : number_format($valor_desconto, 2);

            switch ($cupom->modo_limite) {
                case 'qtd':
                    $qtd_pedido = PedidoProduto::whereIn('status', ['PA', 'RE'])->where([
                            'cupom_desconto_id' => $cupom->id
                        ])->count();

                    if( $qtd_pedido >= $cupom->limite ) {
                        continue;
                    }
                    break;

                default:
                    $valor_ckc_descontos = PedidoProduto::whereIn('status', ['PA', 'RE'])->where([
                            'cupom_desconto_id' => $cupom->id
                        ])->sum('desconto');

                    if( ($valor_ckc_descontos+$valor_desconto) > $cupom->limite ) {
                        continue;
                    }
                    break;
            }

            $pedido_produto->cupom_desconto_id = $cupom->id;
            $pedido_produto->desconto          = $valor_desconto;
            $pedido_produto->update();

            $aplicou_desconto = true;

        }

        if( $aplicou_desconto ) {
            $req->session()->flash('mensagem-sucesso', 'Cupom aplicado com sucesso!');
        } else {
            $req->session()->flash('mensagem-falha', 'Cupom esgotado!');
        }
        return redirect()->route('carrinho.index');

    }


    public function duplicar($id)
    {
        $pedido = Pedido::find($id);
        $idpedido = Pedido::consultaId([
            'user_id' => $pedido->user_id,
            'status' =>'RE'
        ]);
        if(empty($idpedido))
        {
            $new = $pedido->replicate();
            $new->save();
            $novoPedido = Pedido::find($new->id);
            $novoPedido->status = 'RE';
            $novoPedido->update();
            $idpedido = $new->id;
        }

        $pedidoProd = PedidoProduto::where(['pedido_id' => $id])->get();
        foreach($pedidoProd as $pedidos)
        {
            PedidoProduto::create([
            'pedido_id' => $idpedido,
            'produto_id' => $pedidos->produto_id,
            'valor' => $pedidos->valor,
            'status' => 'RE'
        ]);
        }

        return redirect()->route('carrinho.index');
    }

}
