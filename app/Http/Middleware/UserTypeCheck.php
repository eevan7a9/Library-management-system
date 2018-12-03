<?php

namespace App\Http\Middleware;

use Closure;
use auth;

class UserTypeCheck
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
        $users = Auth::user();

       if ($users->user_type < 1) {
            return redirect('accounts')->withErrors('Access Not Authorize...');
       }
       return $next($request);

    }
}
