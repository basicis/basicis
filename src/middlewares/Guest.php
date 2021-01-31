<?php
namespace App\Middlewares;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\Middleware;

class Guest extends Middleware
{
    public function process(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ): ResponseInterface {
        //If header authorization count === 0 this not is authenticated by a token
        if (count($request->getHeader('authorization')) === 0) {
            return $next($request, $response->withStatus(200));
        }
        return $response->withStatus(401);
    }
}
