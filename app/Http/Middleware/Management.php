<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Management
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
      if (auth()->user()->level_user == 2) {
        return $next($request);
      }
      return redirect('/dashboard');
  }
  
}
 