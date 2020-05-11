<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    // Retorna OS produtos daquela tag
    // Uma tag tem MUITOS produtos
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
