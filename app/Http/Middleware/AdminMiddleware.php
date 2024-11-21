<?php
namespace App\Http\Middleware ;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == 1){
                return $next($request);
            }
            else{
                Auth::logout();
                return redirect('/')->with('error','You are not authorized to access this page');
            }
        }
        else{
            Auth::logout();
            return redirect('/');
        }
    }
}
