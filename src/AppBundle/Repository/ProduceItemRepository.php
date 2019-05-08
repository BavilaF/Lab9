<?php

namespace App\Repository;

use App\Entity\ProduceItem;
use Doctrine\Bundle\DoctringBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProduceItemRepository extends ServiceEntityRepository{

  public function __construct(RegistryInterface $registry) {
    parent::__construct($registry, ProduceItem::class);
  }

  public function findAllProduceItemsByProduce($produceItem) {
    return $this->getEntityManager()
    ->createQuery('SELECT produceItems FROM App\Entity\ProduceItems produceItems WHERE ProduceItems.name = :name')
    ->setParameter('name', $produceItem)
    ->getResult();
  }
}
