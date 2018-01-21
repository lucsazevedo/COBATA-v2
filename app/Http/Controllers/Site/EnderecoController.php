<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Enderecos;
class EnderecoController extends Controller
{
	function __construct()
   {
   		$this->middleware('auth');
   }
    public function index()
    {
        $enderecos = Enderecos::where('user_id','=', Auth::id())->get();
        return view('enderecos.index', compact('enderecos'));
    }

    public function adicionar()
    {
        return view('enderecos.adicionar');
    }

     public function salvar(Request $request)
    {
        $dados = $request->all();
        $endereco = new Enderecos();
        $endereco->cep = $dados['cep'];
        $endereco->endereco = $dados['endereco'];
        $endereco->numero = $dados['numero'];
        $endereco->complemento = $dados['complemento'];
        $endereco->bairro = $dados['bairro'];
        $endereco->cidade = $dados['cidade'];
       	$endereco->estado = $dados['estado'];
       	$endereco->user_id = Auth::id();
        $endereco->save();
        \Session::flash('mensagem', ['msg'=> 'Cadastro de Endereço Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('enderecos.index');     
    }

    
    public function editar($id)
    {
        $endereco = Enderecos::find($id);
        return view('enderecos.editar', compact('endereco'));
    }

    public function atualizar(Request $request, $id)
    {
        $endereco = Enderecos::find($id);
        $dados = $request->all();
        $endereco->cep = $dados['cep'];
        $endereco->endereco = $dados['endereco'];
        $endereco->numero = $dados['numero'];
        $endereco->complemento = $dados['complemento'];
        $endereco->bairro = $dados['bairro'];
        $endereco->cidade = $dados['cidade'];
       	$endereco->estado = $dados['estado'];
        $endereco ->update();

        \Session::flash('mensagem',['msg'=>'Endereço atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('enderecos.index');
        
    }

    public function deletar($id)
    {
        $endereco = Enderecos::find($id)->delete();
         \Session::flash('mensagem', ['msg'=> 'Endereço Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('enderecos.index'); 
    }
}
