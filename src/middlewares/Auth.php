<?php
namespace App\Middlewares;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\Middleware;
use Basicis\Auth\Auth as AppAuth;
use App\Models\User;

class Auth extends Middleware
{
    public function process(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ): ResponseInterface {
        $user = AppAuth::getUser($request, User::class);

        if ($user instanceof User) {
            return $next(
                $request->withAttribute("authUser", $user),
                $response->withStatus(200)
            );
        }
        return $response->withStatus(401);
    }
}
