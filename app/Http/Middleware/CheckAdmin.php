<?php

namespace App\Http\Middleware;

use App\Abilities;
use Closure;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next)
    {
        if(\Gate::denies(Abilities::IS_ADMIN)){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
