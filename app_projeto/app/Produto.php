<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    public function produto_venda()
    {
        //return $this->belongsToMany('App\venda','produtosvenda','produtos_id','venda_id');
        return $this->hasMany('App\produtosvenda', 'produtos_id', 'id');
    }
   
}
