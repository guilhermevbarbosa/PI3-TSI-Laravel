<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'image', 'price', 'discount', 'stock'];
    // protected $fillable = ['name', 'description', 'image', 'price', 'discount', 'stock', 'category_id'];
}
