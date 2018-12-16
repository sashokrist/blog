<?php

namespace App\Http\Middleware;

use Auth;
use Illuminate\Support\Facades\Session;
use Closure;

class Admin
{

    public function handle($request, Closure $next)
    {
        if(!Auth::user()->admin){
            Session::flash('info', 'You do not have permission to perform this action');
            return redirect()->back();
        }
        return $next($request);
    }
}
