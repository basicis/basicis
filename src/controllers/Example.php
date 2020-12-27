<?php
namespace App\Controllers;

use Basicis\Basicis as App;
use Basicis\Controller\Controller;
use App\Models\Example as Model;

class Example extends Controller
{
    /**
     * Function index
     * Get all items
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example", "get")
     */
    public function index($app, $args)
    {
        return $app->json(["examples" => Model::allToArray()]);
    }

    /**
     * Function itemById
     * Get item by ID
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/{id}:int", "get")
     */
    public function getItemById($app, $args)
    {
        return $app->json(["example" => Model::findOneBy(["id" => $args->id])]);
    }

    /**
     * Function getItemByEmail
     * Get item by email
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/{email}:email", "get")
     */
    public function getItemByEmail($app, $args)
    {
        return $app->json(["example" => Model::findOneBy(["email" => $args->email])]);
    }


    /**
     * Function setItem
     * Set item form view
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/add", "get")
     */
    public function setItem($app, $args)
    {
        return $app->view("example-form");
    }

    /**
     * Function create
     * Create item
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example", "post")
     */
    public function create($app, $args)
    {
        try {
            (new Model)->setName($args->name)->setEmail($args->email)->save();
        } catch (\Exception $e) {
            return $app->json(["example" => null, "success" => false], 406);
        }

        $example = Model::findOneBy(["email" => $args->email]);
        return $app->json(["example" => $example, "success" => !is_null($example->__toArray())]);
    }

    /**
     * Function update
     * Update item
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example", "patch")
     */
    public function update($app, $args)
    {
        $example = Model::findOneBy(["id" => $args->id]);
        if ($example instanceof Model) {
            $example->setName($args->name)->setEmail($args->email)->save();
            $example = Model::findOneBy(["id" => $args->id]);
        }
        return $app->json(["example" => $example, "success" => !is_null($example)]);
    }

    /**
     * Function delete
     * Delete item
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example", "delete")
     */
    public function delete($app, $args)
    {
        $example = Model::findOneBy(["id" => $args->id]);
        if ($example instanceof Model) {
            $example->delete();
        }
        return $app->json(["success" => Model::findOneBy(["id" => $args->id]) === null]);
    }
}
