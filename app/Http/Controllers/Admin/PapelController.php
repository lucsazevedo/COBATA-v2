<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;
use App\Permissao;

class PapelController extends Controller
{
    public function index()
    {
    	$funcoes = Papel::all();
        return view('admin.funcoes.index', compact('funcoes'));
    }

    public function adicionar()
    {
        
        return view('admin.funcoes.adicionar');
    }

    public function salvar(Request $request)
    {
        
        $dados = $request->all();
        $funcao = new Papel();
        $funcao->nome = $dados['nome'];     
        $funcao->descricao = $dados['descricao'];     
        $funcao->save();
        \Session::flash('mensagem', ['msg'=> 'Cadastro de Papel Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.funcoes');         
    }

    public function editar($id)
    {
        $funcao = Papel::find($id);
        if($funcao->nome == 'admin' or $funcao->nome == 'cliente')
        {
            return redirect()->route('admin.funcoes'); 
        }
        return view('admin.funcoes.editar', compact('funcao'));
    }

    public function atualizar(Request $request, $id)
    {
        $funcao = Papel::find($id);
        if($funcao->nome == 'admin' or $funcao->nome == 'cliente')
        {
            return redirect()->route('admin.funcoes'); 
        }
        $dados = $request->all();
        $funcao->nome = $dados['nome'];     
        $funcao->descricao = $dados['descricao'];     


        $funcao ->update();
       
        \Session::flash('mensagem', ['msg'=> 'Papel Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.funcoes');     
    }

    public function deletar($id)
    {

        $funcao = Papel::find($id);
        if($funcao->nome == 'admin' or $funcao->nome == 'cliente')
        {
            return redirect()->route('admin.funcoes'); 
        }
        $funcao->delete();

         \Session::flash('mensagem', ['msg'=> 'Funçao Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.funcoes'); 
    }

    public function permissao($id)
    {
        $funcao = Papel::find($id);
        $permissao = Permissao::all();
        return view('admin.funcoes.permissao', compact('funcao', 'permissao'));
    }

    public function salvarPermissao(Request $request, $id)
    {
        $funcao = Papel::find($id);
        $permissao = Permissao::find($request['permissao_id']);
        $funcao->adicionarPermissao($permissao);
        return redirect()->back();
    }

    public function RemoverPermissao($id, $id_permissao)
    {
        $funcao = Papel::find($id);
        $permissao = Permissao::find($id_permissao);
        $funcao->removerPermissao($permissao);
        return redirect()->back();
    }
}
