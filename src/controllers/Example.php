<?php
namespace App\Controllers;

use Basicis\Basicis as App;
use Basicis\Controller\Controller;

class Example extends Controller
{
    /**
     * Function index
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/", "GET")
     */
    public function index($app, $args)
    {
        return $app->view("welcome", ["test" => "Teste OK!"]);
    }


    /**
     *
     * Function home
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/home", "GET")
     */
    public function home($app, $args)
    {
        return $this->index($app, $args);
    }

    /**
     * Function home2
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/home/{id}:", "GET")
     */
    public function home2($app, $args)
    {
        return $app->view("welcome2", ["test" => $args->id]);
    }


     /**
     * Function test
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/home/{text}:string", "GET")
     */
    public function test($app, $args)
    {
        return $app->view("welcome2", ["test" => $args->text]);
    }


      /**
     * Function testJson
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/json", "GET")
     */
    public function testJson($app, $args)
    {
        return $app->json(["test" => "Test OK!", "test2" => "Test OK2!"]);
    }
}
