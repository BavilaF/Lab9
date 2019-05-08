<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixtureBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture {

  public function load(ObjectManager $manager) {

    $user = new User();
    $user->setUsername('joe');
    $user->setEmail('joe@example.com');
    $user->setPlainPassword('test1');
    $user->addRole('ROLE_ADMIN');
    $user->setEnabled(true);

    $manager->persist($user);

    $user = new User();
    $user->setUsername('joel');
    $user->setEmail('joel@example.com');
    $user->setPlainPassword('test2');
    $user->addRole('ROLE_ADMIN');
    $user->setEnabled(true);

    $manager->persist($user);
    $manager->flush();
  }
}
