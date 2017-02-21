<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if(Auth::check()){
            if ($request->is('admin/*') || $request->is('Admin/*')) {
                If(Auth::user()->admin){
                    return $next($request);
                }
                return redirect('/forbidden');
            }else{
                return $next($request);
            }
        }
        return redirect('/login?redirectUrl=admin');
    }
}
