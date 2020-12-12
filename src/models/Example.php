<?php
namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;
use Basicis\Model\Model;
use Basicis\Basicis as App;

/**
 *  Model class
 *
 *  @ORM\MappedSuperclass
 */
class Example extends Model
{

     /**
      * @ORM\Column(type="varchar")
      * @ORM\GeneratedValue
      * @var string $name
      */
    protected $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
