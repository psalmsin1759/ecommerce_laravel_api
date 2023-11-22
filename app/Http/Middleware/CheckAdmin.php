<?php
/**
 * Created by PhpStorm.
 * User: Tivas-Technologies
 * Date: 5/31/2018
 * Time: 7:41 AM
 */

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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

        if ($request->session()->get("access") === null){
            return redirect('/login');
        } 
 
        return $next($request);
    }

}