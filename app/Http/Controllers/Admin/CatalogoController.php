<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Catalogo;

class CatalogoController extends Controller
{
    public function index()
    {
        $catalogos = Catalogo::all();
        return view('admin.catalogos.index', compact('catalogos'));
    }

    public function adicionar()
    {
        return view('admin.catalogos.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $catalago = new Catalogo();
        $catalago->descricao = $dados['descricao'];     
        $catalago->sobre = $dados['sobre'];     
        $catalago->link = $dados['link'];
        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/catalogos/".$catalago->id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $catalago->imagem = $diretorio.'/'.$nomeArquivo;
        }     
        $catalago->save();
        \Session::flash('mensagem', ['msg'=> 'Cadastro de Catálogo Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.catalogos');     
    }

    public function editar($id)
    {
        $catalago = Catalogo::find($id);
        return view('admin.catalogos.editar', compact('catalago'));
    }

    public function atualizar(Request $request, $id)
    {
        $catalago = Catalogo::find($id);
        $dados = $request->all();
        $catalago->descricao = $dados['descricao'];
        $catalago->sobre = $dados['sobre'];     
        $catalago->link = $dados['link'];
        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/catalogos/".$id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $catalago->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $catalago ->update();

       
        \Session::flash('mensagem', ['msg'=> 'Catálogo Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.catalogos');     
    }

    public function deletar($id)
    {
        $catalago = Catalogo::find($id)->delete();
         \Session::flash('mensagem', ['msg'=> 'Catálogo Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.catalogos'); 
    }
}
