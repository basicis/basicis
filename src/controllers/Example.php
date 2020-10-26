<?php
namespace App\Controllers;

use Basicis\Controller\Controller;
use Basicis\Basicis as App;

class Example extends Controller
{

    public function index(App &$app, ?object $args)
    {
        return $app->getResponse()->withStatus(401);
    }
}
