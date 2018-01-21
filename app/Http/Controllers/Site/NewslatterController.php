<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newslatter;

class NewslatterController extends Controller
{
	
    public function salvar(Request $request)
    {
        $dados = $request->all();
        $news = Newslatter::firstOrCreate(['email' =>  $dados['email'] ]);   
        $news->save();
        \Session::flash('mensagem', ['msg'=> 'Obrigado por assinar a nossa Newsslatter', 'class'=> 'green white-text']);

        return redirect()->route('site.home');     
    }

}
