<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
   protected $fillable = ['nome'];

    public function produtos()
    {
        return $this->belongsToMany('App\Produto', 'produto_cidade');
    }
}
