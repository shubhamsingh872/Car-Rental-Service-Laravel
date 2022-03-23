<?php

namespace App\Http\Middleware;

use Closure;
// use Session;
use Illuminate\Http\Request;

class AdminAuth
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
        if($request->session()->has('admin')){
            // echo '1'; exit;
            // return redirect('admin/dashboard');
        }else{
            // echo '2'; exit;
           // return redirect('/admin');
        }
        


        return $next($request);
    }
}
