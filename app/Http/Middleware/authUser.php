<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class authUser
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
//        Session::forget('User_Login');
        if (Session::get('User_Login') == 'Yes') {

            Session::get('User_ID');
        } else {
            return redirect()->route('showLogin');
        }
        return $next($request);
    }
}
