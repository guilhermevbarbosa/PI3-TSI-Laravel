<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    // Retorna OS produtos daquela categoria
    public function products(){
        return $this->hasMany(Product::class);
    }
}
