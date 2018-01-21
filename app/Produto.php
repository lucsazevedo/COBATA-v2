<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";

    public function setor()
    {
    	return $this->belongsTo('App\Setor', 'setor_id');
    }

    public function marca()
    {
    	return $this->belongsTo('App\Marca', 'marca_id');
    }
     public function cidades()
    {
    	 return $this->belongsToMany('App\Cidade', 'produto_cidade');
    }

    public function galeria()
    {
        return $this->hasMany('App\Galeria', 'produto_id');
    }
}
