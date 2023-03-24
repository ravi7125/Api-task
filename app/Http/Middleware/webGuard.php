<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class webGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //global middleware example
        if($request->age <18){
            echo "YOU ARE NOT ALLOW TO ACCESS THE PAGE";
            die;
        }
        return $next($request);
    }
}










//example of route middleware...

// <?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class webGuard
// {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {

    //     global middleware example.......
    //     if($request->age <18){
    //         echo "YOU ARE NOT ALLOW TO ACCESS THE PAGE";
    //         die;
    //     }

    //     route middleware example...........
    //     if(session()->has('user_id'))
    //     return $next($request);
    //     else
    //     return redirect('no-access');
    // }
// }
// }