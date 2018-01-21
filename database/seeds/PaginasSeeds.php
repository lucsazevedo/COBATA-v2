<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$existe = Pagina::where('tipo', '=', 'sobre')->count();
    	if($existe)
    	{
    		$paginaSobre = Pagina::where('tipo', '=', 'sobre')->first();
    	}else{
    		$paginaSobre = new Pagina();
    	}

    	$paginaSobre->titulo = "A Empresa";
    	$paginaSobre->descricao = "Descrição Breve sobre a empresa";
    	$paginaSobre->texto = "Texto sobra a Empresa";
    	$paginaSobre->imagem = "img/breja.jpg";
    	$paginaSobre->tipo = "sobre";
        $paginaSobre->mapa= '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2223.8043533308355!2d-40.31196712568509!3d-20.38378795539104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb817b2995d6bf1%3A0xf69aa51e4ff904b1!2sVila+Velha+-+Ibes%2C+Vila+Velha+-+ES!5e0!3m2!1spt-BR!2sbr!4v1514398157769" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
    	$paginaSobre->save();
        echo "Pagina de Sobre Criada com Sucesso";

        $existe = Pagina::where('tipo', '=', 'contato')->count();
        if($existe)
        {
            $paginaContato = Pagina::where('tipo', '=', 'contato')->first();
        }else{
            $paginaContato = new Pagina();
        }

        $paginaContato->titulo = "Entre em Contato";
        $paginaContato->descricao = "Preencha o Formulário";
        $paginaContato->texto = "Contato";
        $paginaContato->imagem = "img/breja.jpg";
        $paginaContato->email = "lucsazevedo@gmail.com";
        $paginaContato->tipo = "contato";
        $paginaContato->save();
        
    	echo "Pagina de Contato Criada com Sucesso";
    }
}
