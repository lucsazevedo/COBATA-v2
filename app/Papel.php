<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $fillable = [
    	'nome',
    	'descricao'
    ];

    public function permissoes()
    {
    	return $this->belongsToMany('App\Permissao');
    }

    public function adicionarPermissao($permissao)
    {
    	return $this->permissoes()->save($permissao);
    }

     public function removerPermissao($permissao)
    {
    	return $this->permissoes()->detach($permissao);
    }
    
}
