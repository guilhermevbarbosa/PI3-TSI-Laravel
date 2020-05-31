<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['cep', 'h_address', 'h_number', 'neighborhood', 'city', 'state', 'user_id'];

    public function user(){
        return $this->hasOne(User::class);
    }
}
