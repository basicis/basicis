<?php
namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;
use Basicis\Auth\User as Auth;
use Basicis\Model\Model;
use Basicis\Core\Validator;
use Basicis\Basicis as App;

/**
 * User class
 * @ORM\MappedSuperclass
 * @ORM\Entity
 */
class User extends Auth
{
   //
}
