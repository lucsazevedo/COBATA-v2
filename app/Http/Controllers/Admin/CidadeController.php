<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Produto;
use Illuminate\Support\Facades\DB;
class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::all();
        return view('admin.cidades.index', compact('cidades'));
    }

    public function adicionar()
    {
        return view('admin.cidades.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $cidade = new Cidade();
        $cidade->nome = $dados['nome'];
        $cidade->estado = $dados['estado'];
        $cidade->sigla_estado = $dados['sigla_estado'];     
        $cidade->save();
        \Session::flash('mensagem', ['msg'=> 'Cadastro de Cidade Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.cidades');     
    }

    public function editar($id)
    {
        $cidade = Cidade::find($id);
        return view('admin.cidades.editar', compact('cidade'));
    }

    public function atualizar(Request $request, $id)
    {
        $cidade = Cidade::find($id);
        $dados = $request->all();
        $cidade->nome = $dados['nome'];
        $cidade->estado = $dados['estado'];
        $cidade->sigla_estado = $dados['sigla_estado'];
        $cidade ->update();

        \Session::flash('mensagem',['msg'=>'Cidade atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.cidades');
       
        \Session::flash('mensagem', ['msg'=> 'Cidade Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.cidades');     
    }

    public function deletar($id)
    {
        if(DB::table('produto_cidade')->where('cidade_id', $id)->count()){
            $msg = "Não é possível excluir esta cidade. Os produtos com id ( ";
            $produtos = DB::table('produto_cidade')->where('cidade_id', $id)->get();
            foreach($produtos as $produto){
                $msg .= $produto->produto_id." ";
            }
            $msg .= " ) estão relacionados com esta cidade";
            \Session::flash('mensagem', ['msg'=>$msg, 'class'=>'red white-text']);
            return redirect()->route('admin.cidades', $id);
        }
        $cidade = Cidade::find($id)->delete();
         \Session::flash('mensagem', ['msg'=> 'Cidade Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.cidades'); 
    }
}
