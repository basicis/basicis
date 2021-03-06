<?php
namespace Test\Controllers;

use PHPUnit\Framework\TestCase;
use App\Controllers\Example;
use Basicis\Model\Model;
use Basicis\Model\Models;
use Basicis\Basicis as App;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ExampleTest
 */

class ExampleTest extends TestCase
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
     * @var Example
     */
    private $controller;

    /**
     * Function __construct
     */
    public function __construct()
    {
        parent::__construct();

        $this->controller = new Example();
        $this->app = App::createApp();

        $this->app->setViewFilters([
            //here, key is required
            "isTrue" => function ($test = true) {
                return $test ? true : false;
            },
            "isInt" => function ($value) {
                return $value > 0;
            },
            "isText" => function ($value) {
                return is_string($value) && !is_numeric($value);
            }
            //...
        ]);
    }

    /**
     * Funtion testConstruct
     *
     * @return void
     */
    public function testConstruct()
    {
        $this->assertInstanceof(Example::class, $this->controller);
    }

    /**
     * Function testIndex
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->controller->index($this->app);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEmpty($response->getBody()->getContents());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Function testCreate
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->controller->create($this->app, (object) []);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(400, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody()->getContents());

        $response = $this->controller->create(
            $this->app,
            (object) ["name" => "Jhon S", "email" => "jhon@test.ex"]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(201, $response->getStatusCode());


        $response = $this->controller->create(
            $this->app,
            (object) [
                "name" => "David Miguel", "email" => "jhon@test.ex"
            ]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(406, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody()->getContents());

        $response = $this->controller->create(
            $this->app,
            (object) [
                "name" => "David Miguel", "email" => "david@test.ex"
            ]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody()->getContents());
    }

    /**
     * Function testUpdate
     *
     * @return void
     */
    public function testUpdate()
    {
        $class = $this->controller->getModelByAnnotation();
        $model = $class::findOneBy(["email" => "jhon@test.ex"]);
        
        $response = $this->controller->update(
            $this->app,
            (object) ["name" => "Jhon Snow", "id" => $model->getId()]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(202, $response->getStatusCode());

        $response = $this->controller->update(
            $this->app,
            (object) ["name" => "Jhon Snow", "email" => "jhon@test.exx", "id" => 200]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(404, $response->getStatusCode());

        $model2 = $class::findOneBy(["email" => "david@test.ex"]);
        $response = $this->controller->update(
            $this->app,
            (object) ["name" => "Jhon Snow", "email" => "david@test.ex", "id" => $model2->getId()]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(202, $response->getStatusCode());
    }


    /**
     * Function testDelete
     *
     * @return void
     */
    public function testDelete()
    {
        $response = $this->controller->delete($this->app);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(500, $response->getStatusCode());

        $class = $this->controller->getModelByAnnotation();
        $classObj = $class::findOneBy(["email" => "jhon@test.ex"]);
        $response = $this->controller->delete(
            $this->app,
            (object) ["id" => $classObj->getId()]
        );

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(200, $response->getStatusCode());

        $response = $this->controller->delete(
            $this->app,
            (object) ["id" => $classObj->getId()]
        );

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(404, $response->getStatusCode());
    }

    /**
     * Function testAll
     *
     * @return void
     */
    public function testAll()
    {
        $response =  $this->controller->all($this->app);
        $this->assertInstanceof(ResponseInterface::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue(is_array((json_decode($response->getBody()))->data));
    }

    /**
     * Function testFind
     *
     * @return void
     */
    public function testFindAndFindOneBy()
    {
        $response = $this->controller->find($this->app, (object) ["email" => "david@test.ex"]);
        $response = json_decode($response->getBody());
        $response2 = $this->controller->find($this->app, (object) ["email" => $response->data->email]);

        $this->assertInstanceof(ResponseInterface::class, $response2);
        $response2 = json_decode($response2->getBody());
        $this->assertEquals($response->data, $response2->data);
    }
}
