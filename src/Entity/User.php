<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/*
* @ORM\Entity
*/
Class User extends BaseUser{

  /*
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $id;

  public function __construct() {
    parent::__construct();
  }
}
