<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marca;

class MarcaController extends Controller
{
   public function index()
    {
    	$marcas = Marca::all();
    	$seo = [
    		'titulo'=>'Marcas',
    		'descricao'=>'Marcas Cobata'
    	];
    	return view('site.marcas', compact('marcas','seo'));	
    }

}
