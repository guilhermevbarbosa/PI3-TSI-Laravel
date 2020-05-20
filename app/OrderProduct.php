<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    // PIVOT TABLE - PRODUTOS DO PEDIDO

    private $fillable = [
        'order_id',
        'product_id',
        'price'
    ];

    // Cada item pertence a um pedido
    public function order(){
        return $this->belongsTo(Order::class);
    }

    // Cada item tem um produto
    public function product(){
        return $this->hasOne(Product::class);
    }
}
