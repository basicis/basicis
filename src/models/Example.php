<?php
namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;
use Basicis\Model\Model;
use Basicis\Basicis as App;
use Basicis\Core\Validator;

/**
 *  Model class
 *
 * @ORM\Entity
 * @ORM\Table(name="Examples")
 */
class Example extends Model
{
    /**
      * @ORM\Column(type="string")
      * @ORM\GeneratedValue
      * @var string $name
      */
    protected $name;

    /**
     * $email variable
     * @ORM\Column(name="email", length=300, unique=true)
     * @var string
     */
    protected $email;

    /**
     * Function getName
     * Get example property name
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Function setName
     * Set example property name
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name) : Example
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Function getEmail
     * Get Auth email
     * @return string|null
     */
    public function getEmail() : ?string
    {
        return $this->email;
    }

    /**
     * Function setEmail
     * Set Auth email
     * @param string $email
     * @return Example
     */
    public function setEmail(string $email) : Example
    {
        if (Validator::validate($email, "email")) {
            $this->email = $email;
        }
        return $this;
    }
}
