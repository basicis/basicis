<?php
namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\RequestHandler;
use App\Models\User;

class Auth extends RequestHandler
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (count($request->getHeader('authorization')) >= 1 && new User instanceof AuthInterface) {
            return User::getUser($request->getHeader('authorization')[0], $this->app->getAppKey());
        }
    }
}
