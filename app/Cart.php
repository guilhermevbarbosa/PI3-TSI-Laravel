<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id'];

    // Cada carrinho pode ter 1 usuário
    // Retorno do Usuário daquele carrinho
    public function user(){
        return $this->hasOne(User::class);
    }

    // Cada carrinho pode ter muitos produtos
    // Retorno dos produtos daquele carrinho
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
