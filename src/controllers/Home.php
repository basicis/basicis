<?php
namespace App\Controllers;

use Basicis\Basicis as App;
use Basicis\Controller\Controller;
use App\Models\Example;

class Home extends Controller
{
    /**
     * Function index
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/", "get, put, patch")
     */
    public function index($app, $args)
    {
        return $app->view("welcome");
    }



    /**
     *
     * Function home
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/home", "get, put, patch", "guest")
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
     * @Route("/home/{id}:int", "GET", "guest")
     */
    public function testArgId($app, $args)
    {
        return $app->view("demo", ["testArg" => $args->id, "testText" => "Teste OK!"]);
    }


     /**
     * Function test
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/home/{text}:string", "GET")
     */
    public function testArgText($app, $args)
    {
        return $app->view("demo", ["testArg" => $args->text, "testText" => "Teste OK!"]);
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


    /**
     * Function newExample
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/add", "GET")
     */
    public function newExample($app, $args)
    {
        $example = new Example();
        $example->setName("Jhon Snow");
        $success = $example->save();
        
        return $app->json(["name" =>  $example->getName(), "success" => $success]);
    }
}
