<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;
use Mail;
use App\Depoimento;

class PaginaController extends Controller
{
    public function sobre()
    {
    	$pagina = Pagina::where('tipo', '=', 'sobre')->first();
        $depoimentos = Depoimento::all();
    	return view('site.sobre', compact('pagina', 'depoimentos'));
    }

    public function contato()
    {
    	$pagina = Pagina::where('tipo', '=', 'contato')->first();

    	return view('site.contato', compact('pagina'));
    }

    public function enviarContato(Request $request)
    {
        $pagina = Pagina::where('tipo', '=', 'contato')->first();
        $email = $pagina->email;
        \Mail::send('emails.contato', ['request'=>$request], function($m) use ($request, $email){
            $m->from($request['email'], $request['nome']);
            $m->replyTo($request['email'], $request['nome']);
            $m->to($email, 'Contato do Site COBATA');
            $m->subject("Contato Site Cobata");

        });
        \Session::flash('mensagem', ['msg'=> 'Contato enviado com Sucesso!', 'class'=> 'green white-text']);
        return redirect()->route('site.contato');
    }
}
