<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class sessionmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->headers->replace(['name' => 'mamshadakad']);

        // $key = $request->header('api-key');
        // if($key=='xyz123'){

        // }
        // else{
        //     return response()->json(['Unauthorized'], 401);
        // }
        return $next($request);
    }
}
