<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Basicis\Basicis as App;
use Basicis\Controller\Controller;
use App\Models\User as Model;

/**
 * User Class
 *
 * @Model Basicis\Auth\User
 * @IgnoreAnnotation("Model")
 */
class User extends Controller
{
    /**
     * Function index
     * Redirect to User::all
     * @param App $app
     * @param  array $args
     * @return void
     * @Route("/user", "get")
     */
    public function index(App $app, object $args = null) : ResponseInterface
    {
        $users = Model::paginate(10, 0, ["pass"]);
        if (count($users) > 0) {
            return $app->json($users, 200);
        }
        return $app->getResponse()->withStatus(404);
    }

    /**
     * Function all
     * Get all items
     * @param App $app
     * @param  array $args
     * @return void
     * @Route("/user/{offset}:int/{limit}:int", "get")
     */
    public function all(App $app, object $args = null) : ResponseInterface
    {
        $users = Model::paginate($args->limit ?? 10, ($args->offset ?? 1) - 1, ["pass"]);
        if (count($users) > 0) {
            return $app->json($users);
        }
        return $app->getResponse()->withStatus(404);
    }

    /**
     * Function itemById
     * Get item by ID
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/user/{id}:int", "get")
     */
    public function find(App $app, object $args = null) : ResponseInterface
    {
        return parent::find($app, $args);
    }

    /**
     * Function create
     * Create item
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/user", "post")
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
     * @Route("/user", "patch")
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
     * @return void
     * @Route("/user", "delete")
     */
    public function delete(App $app, object $args = null) : ResponseInterface
    {
        return parent::delete($app, $args);
    }
}
