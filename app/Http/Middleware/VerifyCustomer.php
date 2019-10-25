<?php

namespace App\Http\Middleware;

use Closure;

class VerifyCustomer
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
        if($request->session()->get('user')->type != 'Customer')
        {
            return redirect()->route('error');
        }

        return $next($request);
    }
}
