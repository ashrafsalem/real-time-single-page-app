<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWT
{

    public function handle($request, Closure $next)
    {
        // if the user has token and login it's ok , if not exception will thrown
        JWTAuth::parseToken()->authenticate();
        return $next($request);
    }
}
