<?php
namespace App\Test\Controllers;

use PHPUnit\Framework\TestCase;
use App\Controllers\Example;
use Psr\Http\Message\ResponseInterface;
use Basicis\Basicis;

/**
 * Class ExampleTest
 */

class ExampleTest extends TestCase
{
    /**
     * $app variable
     *
     * @var Example
     */
    private $controller;

    public function __constuct()
    {
        self::__construct();
        $this->controller = new Example();
    }

    public function testIndex()
    {
        $controller = new Example();

        $this->assertInstanceOf(
            ResponseInterface::class,
            $controller->index(
                Basicis::createApp()->setArgs(
                    [
                        'uri' => '/',
                        'method' => 'GET',
                    ]
                ),
                (object) [
                    "teste" => "ok!",
                    "teste2" =>"ok2!"
                ]
            )
        );
    }
}
