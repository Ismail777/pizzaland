<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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

        if (Auth::user() &&  Auth::user()->admin) {
            return $next($request);
        }
        session()->flash('message', 'Sorry. You do not have permission to access this resource');
        return redirect('/'); //TODO: Add error feedback
    }
}
