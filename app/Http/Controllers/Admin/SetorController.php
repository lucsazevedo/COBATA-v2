<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setor;
use App\Produto;

class SetorController extends Controller
{
    public function index()
    {
        $categorias = Setor::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function adicionar()
    {
        return view('admin.categorias.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $categoria = new Setor();
        $categoria->descricao = $dados['descricao'];     
        $categoria->save();
        \Session::flash('mensagem', ['msg'=> 'Cadastro de Categoria Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.categorias');     
    }

    public function editar($id)
    {
        $categoria = Setor::find($id);
        return view('admin.categorias.editar', compact('categoria'));
    }

    public function atualizar(Request $request, $id)
    {
        $categoria = Setor::find($id);
        $dados = $request->all();
        $categoria->descricao = $dados['descricao'];
        $categoria ->update();

       
        \Session::flash('mensagem', ['msg'=> 'Categoria Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.categorias');     
    }

    public function deletar($id)
    {
        if(Produto::where('setor_id', $id)->count()){
            $msg = "Não é possível excluir esta Categoria. Os produtos com id ( ";
            $produtos = Produto::where('setor_id', '=', $id)->get();
            foreach($produtos as $produto){
                $msg .= $produto->id." ";
            }
            $msg .= " ) estão relacionados com esta cidade";
            \Session::flash('mensagem', ['msg'=>$msg, 'class'=>'red white-text']);
            return redirect()->route('admin.cidades', $id);
        }

        $categoria = Setor::find($id)->delete();
         \Session::flash('mensagem', ['msg'=> 'Categoria Deletada com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.categorias'); 
    }
}
