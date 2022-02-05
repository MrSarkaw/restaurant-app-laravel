<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;    

class IsServer
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
        $user=Auth::user();
        if($user==null||!$user->IsServer()){
            return redirect('/');
        }
        return $next($request);
    }
}
