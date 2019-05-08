<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/*
*@ORM\Entity
*/
class Icon {

  /**
  *@ORM\id
  *@ORM\GeneratedValue
  *@ORM\Column(type="integer")
  */
  private $id;

  /**
  *@ORM\Column("string", length=50)
  */
  //Properties
  private $icon;

  function __construct($icon) {
    $this->icon = $icon;
  }

  public function getId() {
    return $this->id;
  }

  public function getIcon() {
    $this->icon = $icon;
  }

  public function setIcon($icon) {
    $this->icon = $icon;
  }
}
