<?php

namespace App\Http\Middleware;

use Closure;

class verifyIsAdmin
{
    public function handle($request, Closure $next)
    {
        if(!auth()->user()->isAdmin()){
            return redirect(route('home'));
        }
        
        return $next($request);
    }
}
