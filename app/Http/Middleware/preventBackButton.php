<?php

namespace App\Http\Middleware;

use Closure;

class preventBackButton
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request); 
        return $response->header('Cache-Control','no-cache, no-store, must-revalidate');
    }
}
