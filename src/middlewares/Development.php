<?php
namespace App\Middlewares;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\Middleware;

class Development extends Middleware
{
    public function process(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ): ResponseInterface {
         //If app mode is equals `dev` or `development`
        if ($request->getAttribute("appEnv") === "dev" |
            $request->getAttribute("appEnv") === "development") {
            return $next($request, $response);
        }
        return $response->withStatus(401);
    }
}
