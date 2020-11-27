<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produtosvenda extends Model
{
  protected $fillable = [
        'venda_id',
        'produtos_id',
        
        'qtd'
    ];
   
    public function produto()
    {
      
        return $this->belongsTo('App\Produto', 'produtos_id', 'id');
    }

}
