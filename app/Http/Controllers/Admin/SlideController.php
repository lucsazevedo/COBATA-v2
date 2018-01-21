<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;

class SlideController extends Controller
{
    public function index()
    {
    	$slides = Slide::orderBy('ordem')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function adicionar()
    {
        
        return view('admin.slides.adicionar');
    }

    public function salvar(Request $request)
    {
        
        if(Slide::count())
        {
            $slides = Slide::orderBy('ordem', 'desc')->first();
            $ordemAtual = $slides->ordem;
        }else{
            $ordemAtual = 0;
        }

        if($request->hasFile('imagens'))
        {

            $arquivos = $request->file('imagens');
            foreach($arquivos as $arquivo)
            {
                $slide = new Slide();
                $slide->ordem = $ordemAtual + 1;
                $ordemAtual++;
                
                $rand = rand(11111,99999);
                $diretorio = "img/slides/";
                $ext = $arquivo->guessClientExtension();
                $nomeArquivo = "_img_".$rand.".".$ext;
                $arquivo->move($diretorio, $nomeArquivo);
                $slide->imagem = $diretorio.'/'.$nomeArquivo;

                $slide->save();
            }
        }


        \Session::flash('mensagem', ['msg'=> 'Cadastro de Slide Realizado com Sucesso!', 'class'=> 'green white-text']);

        return redirect()->route('admin.slides');     
    }

    public function editar($id)
    {
        $slide = Slide::find($id);
        return view('admin.slides.editar', compact('slide'));
    }

    public function atualizar(Request $request, $id)
    {
        $slide = Slide::find($id);
        $dados = $request->all();
        $slide->ordem = $dados['ordem'];
       	$slide->titulo = $dados['titulo'];
       	$slide->descricao = $dados['descricao'];
       	$slide->link = $dados['link'];
       	$slide->publicado = $dados['publicado'];
       	$slide->posicao_x = $dados['posicao_x'];

        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/slides/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $slide->imagem = $diretorio.'/'.$nomeArquivo;
        }


        $slide ->update();
       
        \Session::flash('mensagem', ['msg'=> 'Slide Atualizado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.slides');     
    }

    public function deletar($id)
    {

        $slide = Slide::find($id);
        $slide->delete();

         \Session::flash('mensagem', ['msg'=> 'Slide Deletado com Sucesso!', 'class'=> 'green white-text']);
        
        return redirect()->route('admin.slides'); 
    }
}
