<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;

class ProdutoController extends Controller
{
    public function index($id)
    {
    	$produto = Produto::find($id);
    	$galeria = $produto->galeria()->orderBy('ordem')->get();
    	$seo = [
    		'titulo'=>$produto->nome,
    		'descricao'=>$produto->descricao,
    		'imagem'=>asset($produto->imagem),
    		'url'=> route('site.produto', [$produto->id, str_slug($produto->nome, '_')]),
    	];
        $rand = rand(1,2);
        if($rand == 1)
        {
            $relacionados = Produto::where('marca_id','=', $produto->marca_id)->where('id','<>', $produto->id)->take(4)->get();
        }else{
            $relacionados = Produto::where('setor_id','=', $produto->setor_id)->where('id','<>', $produto->id)->take(4)->get();
        }
    	return view('site.produto', compact('produto', 'galeria', 'seo', 'relacionados'));	
    }
}
