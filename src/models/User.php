<?php
namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;
use Basicis\Auth\Auth;
use Basicis\Basicis as App;

/**
 *  Model class
 * @ORM\Entity
 * @ORM\Table(name="UserModel")
 */
class User extends Auth
{
     /**
      * @ORM\Column(type="string")
      * @var string $firstName
      */
    protected $firstName;

    /**
      * @ORM\Column(type="string")
      * @var string $lastName
      */
    protected $lastName;


    public function getFirstName() : string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = ucfirst($firstName);
    }

    public function getLastName() : string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = ucfirst($lastName);
    }
}
