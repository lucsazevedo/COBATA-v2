<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Depoimento;

class DepoimentoController extends Controller
{
    public function index()
    {
        $depoimentos = Depoimento::all();
        return view('admin.depoimentos.index', compact('depoimentos'));
    }

    public function adicionar()
    {
        return view('admin.depoimentos.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $depoimento = new Depoimento();
        $depoimento->nome = $dados['nome'];     
        $depoimento->depoimento = $dados['depoimento'];     
        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/depoimentos/".$depoimento->id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $depoimento->imagem = $diretorio.'/'.$nomeArquivo;
        }     
        $depoimento->save();
        \Session::flash('mensagem', ['msg'=> 'Cadastro de Depoimento Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.depoimentos');     
    }

    public function editar($id)
    {
        $depoimento = Depoimento::find($id);
        return view('admin.depoimentos.editar', compact('depoimento'));
    }

    public function atualizar(Request $request, $id)
    {
        $depoimento = Depoimento::find($id);
        $dados = $request->all();
        $depoimento->nome = $dados['nome'];     
        $depoimento->depoimento = $dados['depoimento'];     
        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/depoimentos/".$id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $depoimento->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $depoimento ->update();

       
        \Session::flash('mensagem', ['msg'=> 'Depoimento Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.depoimentos');     
    }

    public function deletar($id)
    {
        $depoimento = Depoimento::find($id)->delete();
         \Session::flash('mensagem', ['msg'=> 'Depoimento Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.depoimentos'); 
    }
}
