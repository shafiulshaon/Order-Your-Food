<?php

namespace App\Http\Middleware;

use Closure;

class VerifyRestaurant
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
        if($request->session()->get('user')->type != 'Restaurant')
        {
            return redirect()->route('error');
        }

        return $next($request);
    }
}
