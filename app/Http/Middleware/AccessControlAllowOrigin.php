<?php

namespace App\Http\Middleware;

use Closure;

class AccessControlAllowOrigin
{
    private static $allow_origin = array(
        'http://127.0.0.1:8080',
        'http://localhost:8080',
        'http://localhost:8080/#/'
    );
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        $response->header('Access-Control-Allow-Credentials', 'true');
        /*if(strtoupper($_SERVER['REQUEST_METHOD'])== 'OPTIONS'){
            exit;
        }*/
        return $response;
    }
}
