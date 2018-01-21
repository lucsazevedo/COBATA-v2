<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('admin.marcas.index', compact('marcas'));
    }

    public function adicionar()
    {
        return view('admin.marcas.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $marca = new Marca();
        $marca->descricao = $dados['descricao'];     
        $marca->sobre = $dados['sobre'];     
        $marca->link = $dados['link'];
        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/marcas/".$marca->id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $marca->imagem = $diretorio.'/'.$nomeArquivo;
        }     
        $marca->save();
        \Session::flash('mensagem', ['msg'=> 'Cadastro de Marca Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.marcas');     
    }

    public function editar($id)
    {
        $marca = Marca::find($id);
        return view('admin.marcas.editar', compact('marca'));
    }

    public function atualizar(Request $request, $id)
    {
        $marca = Marca::find($id);
        $dados = $request->all();
        $marca->descricao = $dados['descricao'];
        $marca->sobre = $dados['sobre'];     
        $marca->link = $dados['link'];
        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/marcas/".$id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $marca->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $marca ->update();

       
        \Session::flash('mensagem', ['msg'=> 'Marca Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.marcas');     
    }

    public function deletar($id)
    {
        $marca = Marca::find($id)->delete();
         \Session::flash('mensagem', ['msg'=> 'Marca Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.marcas'); 
    }
}
