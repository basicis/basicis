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
     * @Route("/examples", "get")
     */
    public function index($app, $args)
    {
        $models = null;
        try {
            $models = Model::allToArray();
        } catch (\Exception $e) {
        }
        return $app->json(["examples" => $models], $models !== null ? 200 : 404);
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
        $model = null;
        try {
            $model = Model::findOneBy(["id" => $args->id]);
        } catch (\Exception $e) {
        }
        return $app->json(["example" => $model], $model !== null ? 200 : 404);
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
        if (Model::exists(["email" => $args->email])) {
            return $app->json(null, 406);
        }

        try {
            (new Model)->setName($args->name)->setEmail($args->email)->save();
            if (Model::exists(["email" => $args->email])) {
                return $app->json(Model::findOneBy(["email" => $args->email])->__toArray(), 200);
            }
        } catch (\Exception $e) {
            return $app->json(null, 400);
        }
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
        return $app->json(["example" => $example->__toArray(), "success" => !is_null($example)]);
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
