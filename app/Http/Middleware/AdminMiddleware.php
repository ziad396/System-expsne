<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $user=auth()->user();
        // $role=$user->roles->first()->name;
        // if($role=='admin'){
        //     return redirect('expense');
        // }
        $user = auth()->user();
        if ($user) {
            if ($user->roles->isEmpty()) {

                return redirect('expense');
            }
            if ($user->roles->contains('name', 'user')) {
                return redirect('expense');
            }
        }

        return $next($request);
    }
}
