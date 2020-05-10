<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class CountCategories
{
    public function handle($request, Closure $next)
    {
        if(Category::all()->count() == 0){
            session()->flash('error', 'Você precisa criar uma categoria antes de um produto');
            return redirect(route('categories.create'));
        }
        
        return $next($request);
    }
}
