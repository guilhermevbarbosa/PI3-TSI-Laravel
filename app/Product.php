<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'image', 'price', 'discount', 'stock', 'category_id'];
    
    // Retorna A categoria relacionada ao produto
    // Um produto pertence a uma categoria
    public function category(){
        return $this->belongsTo(Category::class);       
    }
    
    // Retorna AS tags relacionadas ao produto
    // Um produto pertence a MUITAS tags
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    // Com o id da tag passado, verifica se a tag é presente no produto consultado
    public function hasTag($tagID){
        return in_array($tagID, $this->tags->pluck('id')->toArray());
    }
}
