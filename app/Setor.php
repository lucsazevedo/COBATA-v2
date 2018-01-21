<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
     public function produtos()
    {
    	return $this->hasMany('App\Produto', 'setor_id');
    }
}
