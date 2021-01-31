<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Basicis\Controller\Controller;
use Basicis\Basicis as App;
use App\Models\Example as Model;

/**
 *  Example class
 *
 * @Model App\Models\Example
 * @IgnoreAnnotation("Model")
 */
class Example extends Controller
{
    /**
     * Function all
     * Get all items
     * @param App $app
     * @param  array $args
     * @return ResponseInterface
     * @Route("/example/{offset}:int/{limit}:int", "get")
     */
    public function all(App $app, object $args = null) : ResponseInterface
    {
        return $app->json(Model::paginate($args->limit ?? 10, ($args->offset ?? 1) - 1));
    }

    /**
     * Function itemById
     * Get item by ID
     * @param App $app
     * @param object $args
     * @return ResponseInterface
     * @Route("/example/{id}:int", "get")
     */
    public function find(App $app, object $args = null) : ResponseInterface
    {
        return parent::find($app, $args);
    }


    /**
     * Function getItemByName
     * Get item by name
     * @param App $app
     * @param object $args
     * @return ResponseInterface
     * @Route("/example/{name}:string", "get")
     */
    public function getItemByName(App $app, object $args = null) : ResponseInterface
    {
        return parent::find($app, $args);
    }


    /**
     * Function createForm
     * Create item form view
     * @param App $app
     * @param object $args
     * @return ResponseInterface
     * @Route("/example/create", "get")
     */
    public function createForm(App $app, object $args = null) : ResponseInterface
    {
        return $app->view("example-form", ["method" => "post"]);
    }


    /**
     * Function updateForm
     * Update item form view
     * @param App $app
     * @param object $args
     * @return ResponseInterface
     * @Route("/example/update/{id}:int", "get")
     */
    public function updateForm(App $app, object $args = null) : ResponseInterface
    {
        $model = Model::findOneBy(["id" => $args->id]);
        if ($model instanceof Model) {
            return $app->view(
                "example-form",
                [
                    "method" => "patch",
                    "model" => $model->__toArray()
                ]
            );
        }
        return $app->response(404);
    }


    /**
     * Function deleteForm
     * Delete item form view
     * @param App $app
     * @param object $args
     * @return ResponseInterface
     * @Route("/example/delete/{id}:int", "get")
     */
    public function deleteForm(App $app, object $args = null) : ResponseInterface
    {
        $model = Model::findOneBy(["id" => $args->id]);
        if ($model instanceof Model) {
            return $app->view(
                "example-form",
                [
                    "method" => "delete",
                    "model" => $model->__toArray()
                ]
            );
        }
        return $app->getResponse(404);
    }

    /**
     * Function setItem
     * Set item form view
     * @param App $app
     * @param object $args
     * @return ResponseInterface
     * @Route("/example/create", "get")
     */
    public function setItem(App $app, object $args = null) : ResponseInterface
    {
        return $app->view("example-form", ["method" => "post"]);
    }

    /**
     * Function create
     * Create item
     * @param App $app
     * @param object $args
     * @return ResponseInterface
     * @Route("/example", "post")
     */
    public function create(App $app, object $args = null) : ResponseInterface
    {
        return parent::create($app, $args);
    }

    /**
     * Function update
     * Update item
     * @param App $app
     * @param object $args
     * @return ResponseInterface
     * @Route("/example", "patch")
     */
    public function update(App $app, object $args = null) : ResponseInterface
    {
        return parent::update($app, $args);
    }

    /**
     * Function delete
     * Delete item
     * @param App $app
     * @param object $args
     * @return ResponseInterface
     * @Route("/example", "delete")
     */
    public function delete(App $app, object $args = null) : ResponseInterface
    {
        return parent::delete($app, $args);
    }
}
