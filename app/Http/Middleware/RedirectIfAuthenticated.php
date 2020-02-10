<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert; //경고창

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }else{

            //경고창1
            Alert::warning('Warning', '접속 권한이 없습니다.');
            return redirect()->action('AdminController@login');               
            //경고창2
            //return redirect()->action('AdminController@login')->width('flash_message_success','접속 권한이 없습니다.');
        }

        return $next($request);
    }
}
