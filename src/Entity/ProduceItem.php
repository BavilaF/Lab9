<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/*
*@ORM\Entity(repositoryClass="App\Repository\ProduceRepository")
*/
class ProduceItem {

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
  private $name;
  private $expiration_date;

  /**
  *One ProduceItem has one Icon.
  *@OneToOne(targetEntity="Icon")
  *@JoinColumn(name="Icon_id", referencedColumnName="id")
  */
  private $icon; //Property
  private $in_shopping_list;
  private $shoppingListItems;
  private $fridgeItems

  function __construct(string $name, $expiration_date, $icon, bool $in_shopping_list, $shoppingListItems, $fridgeItems) {
    $this->name = $name;
    $this->$expiration_date = $expiration_date;
    $this->icon = $icon;
    $this->in_shopping_list = $in_shopping_list;
    $this->shoppingListItems = $shoppingListItems;
    $this->$fridgeItems = $fridgeItems;
  }

  public function getName() : string {
    return $this->name;
  }

  public function setName(string $name) {
    $this->name = $name;
  }

  public function getExpirationDate() : \DateTime {
    return $this->$expiration_date;
  }

  public function setExpirationDate(\DateTime $expiration_date = null) {
    $this->expiration_date = $expiration_date;
  }

  /** @Entity */
  public function getIcon() {
    $this->icon = $icon;
  }

  public function setIcon($icon) {
    $this->icon = $icon;
  }

  public function getInShoppingList() : bool {
    $this->in_shopping_list = $in_shopping_list;
  }

  public function setInShoppingList(bool $in_shopping_list) {
    $this->in_shopping_list = $in_shopping_list;
  }

  public function getShoppingListItems() {
    $this->shoppingListItems = $shoppingListItems;
  }

  public function getFridgeItems() {
    $this->fridgeItems = $fridgeItems
  }
}
