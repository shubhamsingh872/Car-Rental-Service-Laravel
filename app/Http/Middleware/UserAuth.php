<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class UserAuth
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
        // $path=$request->path();
     
        // if(( $path == "login") && Session::get('uid')){
        //     return redirect('/user/my-profile');
        // }
        // else if( $path != 'login' && !Session::get('uid')){
        //     return redirect('/login');
        // }
        return $next($request);
    }
}
