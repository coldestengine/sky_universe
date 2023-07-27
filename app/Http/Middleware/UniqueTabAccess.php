<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UniqueTabAccess
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->is_played == 1)
        {
            return redirect()->route('close');
        }

        return $next($request);
    }
}
