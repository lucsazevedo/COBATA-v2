<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    public function produtos()
    {
    	return $this->hasMany('App\Pedido', 'enderecos_id');
    }
}
