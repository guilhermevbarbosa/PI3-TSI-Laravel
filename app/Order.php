<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
    ];

    // Cada pedido pertence a um usuário
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Cada pedido tem produtos
    public function orderProducts(){
        return $this->hasMany(OrderProduct::class);
    }
}
