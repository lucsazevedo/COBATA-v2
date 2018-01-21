<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Lancamento;
class LacamentoController extends Controller
{
    public function index()
    {
        $lancamentos = Lancamento::all();
        return view('admin.lancamentos.index', compact('lancamentos'));
    }

    public function adicionar()
    {
    	$produtos = Produto::all();
        return view('admin.lancamentos.adicionar', compact('produtos'));
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $lancamento = new Lancamento();
        $lancamento->produto_id = $dados['produto_id'];     
        $lancamento->save();
        \Session::flash('mensagem', ['msg'=> 'Cadastro de Lancamento Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.lancamentos');     
    }

    public function editar($id)
    {
        $lancamento = lancamento::find($id);
        $produtos = Produto::all();
        return view('admin.lancamentos.editar', compact('lancamento', 'produtos'));
    }

    public function atualizar(Request $request, $id)
    {
        $lancamento = Lancamento::find($id);
        $dados = $request->all();
        $lancamento->produto_id = $dados['produto_id'];
        $lancamento ->update();

       
        \Session::flash('mensagem', ['msg'=> 'Lancamento Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.lancamentos');     
    }

    public function deletar($id)
    {
        $lancamento = Lancamento::find($id)->delete();
         \Session::flash('mensagem', ['msg'=> 'Lancamento Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.lancamentos'); 
    }
}
