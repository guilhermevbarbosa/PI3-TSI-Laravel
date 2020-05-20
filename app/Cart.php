<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id'
    ];

    // Cada carrinho pode ter 1 usuário
    // Retorno do Usuário daquele carrinho
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Cada linha do carrinho pertence a um produto
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
