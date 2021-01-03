<?php
namespace Test\Controllers;

use PHPUnit\Framework\TestCase;
use App\Controllers\Home;
use Basicis\Basicis as App;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HomeTest
 */

class HomeTest extends TestCase
{

     /**
     * $app variable
     *
     * @var App
     */
    private $app;

    /**
     * $controller variable
     *
     * @var Home
     */
    private $controller;

    /**
     * Function __construct
     */
    public function __construct()
    {
        parent::__construct();

        $this->controller = new Home();
        $this->app = App::createApp();

        $this->app->setViewFilters([
            //here, key is required
            "isTrue" => function ($test = true) {
                return $test ? true : false;
            },
            "isId" => function ($value) {
                return is_numeric($value);
            },
            "isText" => function ($value) {
                return is_string($value) && !is_numeric($value);
            }
            //...
        ]);
    }


    /**
     * Function testIndex
     *
     * @return void
     */
    public function testIndex()
    {
        $this->assertInstanceOf(
            ResponseInterface::class,
            $this->controller->index(
                $this->app,
                (object) [
                    "teste" => "ok!",
                    "teste2" =>"ok2!"
                ]
            )
        );
    }
}
