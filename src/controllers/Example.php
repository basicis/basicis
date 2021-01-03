<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use App\Models\Example as ExampleModel;
use Basicis\Model\Model;
use Basicis\Model\Models;
use Basicis\Controller\Controller;
use Basicis\Basicis as App;

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
     * @return void
     * @Route("/example", "get")
     */
    public function all(App $app, Models $examples = null) : ResponseInterface
    {
        return parent::all($app, $examples);
    }

    /**
     * Function itemById
     * Get item by ID
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/{id}:int", "get")
     */
    public function find(App $app, Model $example = null, object $args = null) : ResponseInterface
    {
        return parent::find($app, $example, $args);
    }


    /**
     * Function getItemByName
     * Get item by name
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/{name}:string", "get")
     */
    public function getItemByName(App $app, Model $example = null, object $args = null)
    {
        return parent::find($app, $example, $args);
    }


    /**
     * Function createForm
     * Create item form view
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/create", "get")
     */
    public function createForm($app, $args)
    {
        return $app->view("example-form", ["method" => "post"]);
    }


    /**
     * Function updateForm
     * Update item form view
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/update/{id}:int", "get")
     */
    public function updateForm($app, $args)
    {
        $model = ExampleModel::findOneBy(["id" => $args->id]);

        if ($model instanceof ExampleModel) {
            return $app->view("example-form", ["method" => "patch", "model" => $model->__toArray()]);
        }

        return $app->response(404);
    }


    /**
     * Function deleteForm
     * Delete item form view
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/delete/{id}:int", "get")
     */
    public function deleteForm($app, $args)
    {
        $model = ExampleModel::findOneBy(["id" => $args->id]);

        if ($model instanceof ExampleModel) {
            return $app->view("example-form", ["method" => "delete", "model" => $model->__toArray()]);
        }

        return $app->getResponse(404);
    }

    /**
     * Function setItem
     * Set item form view
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example/create", "get")
     */
    public function setItem($app, $args)
    {
        return $app->view("example-form", ["method" => "post"]);
    }

    /**
     * Function create
     * Create item
     * @param App $app
     * @param object $args
     * @return void
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
     * @return void
     * @Route("/example", "patch")
     */
    public function update(App $app, Model $example = null, object $args = null) : ResponseInterface
    {
        return parent::update($app, $example, $args);
    }

    /**
     * Function delete
     * Delete item
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/example", "delete")
     */
    public function delete(App $app, Model $example = null, object $args = null) : ResponseInterface
    {
        return parent::delete($app, $example, $args);
    }
}
