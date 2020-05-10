<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Retorna OS produtos daquela categoria
    public function products(){
        return $this->hasMany(Product::class);
    }
}
