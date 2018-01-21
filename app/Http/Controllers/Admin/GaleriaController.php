<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Galeria;
use App\Produto;

class GaleriaController extends Controller
{
    public function index($id)
    {
    	$produto = Produto::find($id);
        $galerias = $produto->galeria()->orderBy('ordem')->get();
        return view('admin.galerias.index', compact('galerias', 'produto'));
    }

    public function adicionar($id)
    {
        $produto = Produto::find($id);
        return view('admin.galerias.adicionar', compact('produto'));
    }

    public function salvar(Request $request, $id)
    {
        $produto = Produto::find($id);
        $dados = $request->all();    

        if($produto->galeria()->count())
        {
            $galeria = $produto->galeria()->count()->orderBy('ordem', 'desc')->first();
            $ordemAtual = $galeria->ordem;
        }else{
            $ordemAtual = 0;
        }
        if($request->hasFile('imagens'))
        {

            $arquivos = $request->file('imagens');
            foreach($arquivos as $arquivo)
            {
                $galeria = new Galeria();
                $galeria->produto_id = $produto->id;
                $galeria->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $rand = rand(11111,99999);
                $diretorio = "img/produtos/".$produto->id."/";
                $ext = $arquivo->guessClientExtension();
                $nomeArquivo = "_img_".$rand.".".$ext;
                $arquivo->move($diretorio, $nomeArquivo);
                $galeria->imagem = $diretorio.'/'.$nomeArquivo;

                $galeria->save();
            }
        }


        \Session::flash('mensagem', ['msg'=> 'Cadastro de Galeria Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.galerias', $produto->id);     
    }

    public function editar($id)
    {
        $galeria = Galeria::find($id);
        $produto = $galeria->produto;
        return view('admin.galerias.editar', compact('galeria', 'produto'));
    }

    public function atualizar(Request $request, $id)
    {
        $galeria = Galeria::find($id);
        $dados = $request->all();
        $galeria->ordem = $dados['ordem'];
        
        $produto = $galeria->produto;
        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/produtos/".$produto->id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $galeria->imagem = $diretorio.'/'.$nomeArquivo;
        }


        $galeria ->update();
       
        \Session::flash('mensagem', ['msg'=> 'Galeria Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.galerias', $produto->id);     
    }

    public function deletar($id)
    {

        $galeria = Galeria::find($id);
        $produto = $galeria->produto;
        $galeria->delete();

         \Session::flash('mensagem', ['msg'=> 'Galeria Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.galerias', $produto->id); 
    }
}
