<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct()
    {
       //$this->middleware('role');
     }

    public function handle($request, Closure $next, $role)
    {
       
        if($request->user()->role->name !== $role){
            return redirect('/home');
        }
        return $next($request);
    }
}
