<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Slide;
use App\Setor;
use App\Cidade;
use App\Marca;
use App\Lancamento;
class HomeController extends Controller
{
	private $testeMarca;
    public function index()
    {
    	$setores = Setor::all();
    	$cidades = Cidade::all();
    	$marcas = Marca::all();
    	$lancamentos = Lancamento::all();
    	$slides = Slide::where('publicado','=','sim')->orderBy('ordem')->get();
    	return view('site.home', compact('lancamentos', 'slides','setores', 'cidades', 'marcas'));	
    }

    public function busca(Request $request)
    {
    	$busca = $request->all();
    	$setores = Setor::all();
    	$cidades = Cidade::all();
    	$marcas = Marca::all();
    	if($busca['setor_id'] == 'todos')
    	{
    		$testeSetor = [['setor_id', '<>', null]];
    	}else{
    		$testeSetor = [['setor_id', '=', $busca['setor_id']]];
    	}

    	if($busca['marca_id'] == 'todos')
    	{
    		$testeMarca = [['marca_id', '<>', null]];
    	}else{
    		$testeMarca = [['marca_id', '=', $busca['marca_id']]];
    	}

    	if($busca['cidade_id'] == 'todos')
    	{
    		$this->testeCidade = [['cidade_id', '<>', null]];
    	}else{
    		$this->testeCidade = [['cidade_id', '=', $busca['cidade_id']]];
    	}

    	if(isset($busca['nome']))
    	{
    		$testeNome = [['nome', 'like', '%'.$busca['nome'].'%']];
    	}else{
    		$testeNome = [['nome', '<>', null]];
    	}


    	$produtos = Produto::where('publicar', '=', 'sim')
    						->where($testeSetor)
    						->where($testeMarca)
    						->where($testeNome)
    						->whereHas('cidades', function($q) {
										    $q->where($this->testeCidade);
										})
    						->orderBy('id', 'desc')
    						->paginate(20);

    	/*$produtos = $produtos->cidades()->whereHas($testeCidade);*/
    	return view('site.busca', compact('busca', 'produtos','setores', 'cidades', 'marcas'));
    }
}
