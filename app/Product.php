<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillable = ['name', 'description', 'image', 'price', 'discount', 'stock', 'category_id'];
    protected $fillable = ['name', 'description', 'image', 'price', 'discount', 'stock'];
}
