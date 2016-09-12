<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setPassword('password');
        $user->setFirstName('Albert');
        $user->setMiddleName('Miniano');
        $user->setEmail('albertwap11@yahoo.com');
        $user->setLastName('Valdez');
        $user->setLastLogin(date('Y-m-d H:i:s'));

        $manager->persist($user);
        $manager->flush();

        $this->addReference('user', $user);
    }

    public function getOrder()
    {
        return 1;
    }
}
