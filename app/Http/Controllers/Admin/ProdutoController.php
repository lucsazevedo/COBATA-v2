<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Setor;
use App\Cidade;
use App\Marca;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos.index', compact('produtos'));
    }

    public function adicionar()
    {
    	$setores = Setor::all();
    	$cidades = Cidade::all();
    	$marcas = Marca::all();
        return view('admin.produtos.adicionar', compact('setores', 'cidades', 'marcas'));
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $produto = new Produto();
        $produto->setor_id = $dados['setor_id'];
        $produto->marca_id = $dados['marca_id'];
        $produto->nome = $dados['nome'];
        $produto->preco = $dados['preco'];
        $produto->medida = $dados['medida'];
        $produto->quantidade = $dados['quantidade'];
        $produto->descricao = $dados['descricao'];
        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/produtos/".$produto->id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $produto->imagem = $diretorio.'/'.$nomeArquivo;
        }
       	$produto->save();
       	$produto::find($produto->id);
        $produto->cidades()->attach($dados['ckCidades']);

        \Session::flash('mensagem', ['msg'=> 'Cadastro de Produto Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.produtos');     
    }

    public function editar($id)
    {
        $produto = Produto::find($id);
        $setores = Setor::all();
    	$cidades = Cidade::all();
    	$marcas = Marca::all();
    	$cidadesMarcadas = $produto->cidades->pluck('id')->toArray();
        return view('admin.produtos.editar', compact('produto','setores', 'cidades', 'marcas', 'cidadesMarcadas'));
    }

    public function atualizar(Request $request, $id)
    {
        $produto = Produto::find($id);
        $dados = $request->all();
        $produto->setor_id = $dados['setor_id'];
        $produto->marca_id = $dados['marca_id'];
        $produto->nome = $dados['nome'];
        $produto->preco = $dados['preco'];
        $produto->medida = $dados['medida'];
        $produto->quantidade = $dados['quantidade'];
        $produto->descricao = $dados['descricao'];
        $produto->publicar = $dados['publicar'];
        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/produtos/".$id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $produto->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $produto->cidades()->sync($dados['ckCidades']);
        $produto ->update();

       
        \Session::flash('mensagem', ['msg'=> 'produto Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.produtos');     
    }

    public function deletar($id)
    {
        $produto = produto::find($id)->delete();
         \Session::flash('mensagem', ['msg'=> 'produto Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.produtos'); 
    }
}
