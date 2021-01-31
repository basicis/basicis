<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Basicis\Basicis as App;
use Basicis\Controller\Controller;

class Home extends Controller
{
    /**
     * Function index
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/", "get")
     */
    public function index(App $app, object $args = null) : ResponseInterface
    {
        //Return template a view, on this example which is called 'welcome'
        return $app->view("welcome");
    }


    /**
     *
     * Function home
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/home", "get", ["guest"])
     */
    public function home(App $app, object $args = null)
    {
        //return $app->redirect("/")->withStatus(30x);
        return $app->redirect("/"); //with status 307 by default
    }


    /**
     * Function home2
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/home2", "get")
     */
    public function home2(App $app, object $args = null) : ResponseInterface
    {
        //Name delimited by ':' ',' or '|'
        //Ex: "welcome:included", "welcome|included" or ...
        return $app->view("welcome, included")->withStatus(202);
    }



    /**
     * Function home2
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/home/{id}:int", "GET", "guest")
     */
    public function argId(App $app, object $args = null)
    {
        //Passing template name and data array as argument
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
    public function argText(App $app, object $args = null)
    {
        //Passing template name and data array as argument
        return $app->view("demo", ["testArg" => $args->text, "testText" => "Teste OK!"]);
    }


    /**
     * Function json
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/json", "GET", ["auth"])
     */
    public function json(App $app, object $args = null)
    {
        //Return a view as json
        return $app->json(["test" => "Test OK!", "test2" => "Test OK2!"]);
    }

    /**
     * Function getRouterMap
     * Get All $app router and return a array
     * @param \Basicis\Basicis $app
     *
     * @return array
     */
    private function getRouterMap(App $app) : array
    {
        //Return router map
        $routes = [];
        foreach ($app->getRouter()->getRoutes() as $route) {
            $item["url"] = $route->getName();
            $item["method"] = $route->getMethod();
            $item["middlewares"] = $route->getMiddlewares();

            if (is_array($item["middlewares"])) {
                $item["middlewares"] = implode(", ", $item["middlewares"]);
            }
            $routes[] = $item;
        }
        return $routes;
    }


    /**
     * Function map
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/map", "GET", "development")
     */
    public function map(App $app, object $args = null)
    {
        return $app->view("map", ["routes" => $this->getRouterMap($app)]);
    }

    /**
     * Function mapJson
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/map/json", "GET", "development")
     */
    public function mapJson(App $app, object $args = null)
    {
        return $app->json(["routes" => $this->getRouterMap($app)]);
    }
}
