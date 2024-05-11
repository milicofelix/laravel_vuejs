<?php

namespace App\Http\Middleware;
use App\Models\LogAccess;

use Closure;

class LogAccessMiddleware
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
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();
        LogAccess::create(['log' => "IP $ip requisitou a rota $route"]);
        // return $next($request);
        //return Response('Chegamos no Middleware e finalizamos por aqui mesmo!');
        $response = $next($request);

        $response->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados!!!');

        return $response;
    }
}
