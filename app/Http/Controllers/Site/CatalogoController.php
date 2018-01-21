<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Catalogo;

class CatalogoController extends Controller
{
    public function index()
    {
    	$catalogos = Catalogo::all();
    	$seo = [
    		'titulo'=>'Catálogos',
    		'descricao'=>'Catálogos Cobata'
    	];
    	return view('site.catalogo', compact('catalogos','seo'));	
    }
}
